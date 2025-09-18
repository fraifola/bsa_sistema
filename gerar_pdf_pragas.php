<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Config DB
$host   = "localhost";
$usuario = "root";
$senha   = "";
$banco   = "bsa";

// Valida ID
$praga_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($praga_id <= 0) {
    http_response_code(400);
    exit('ID inválido');
}

try {
    // Conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Busca dados
    // 1. Busca os dados da OS
$stmt = $pdo->prepare("SELECT * FROM controle_pragas WHERE id = ?");
$stmt->execute([$praga_id]);
$praga = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$praga) {
    http_response_code(404);
    exit("Controle de pragas não encontrado");
}

// 2. Busca os produtos usados nessa OS
$stmt = $pdo->prepare("
    SELECT 
        cpp.id,
        cpp.id_produto,
        cpp.quantidade_utilizada,
        cpp.praga,
        cpp.equipamento
    FROM controle_pragas_produtos cpp
    WHERE cpp.id_os = ?
");
$stmt->execute([$praga_id]);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    http_response_code(500);
    exit("Erro de conexão: " . $e->getMessage());
}

// Monta array de dados
$dados = [
  "os_numero"        => $praga["id"],
  "emissao"          => $praga["data_emissao"],
  "data_execucao"    => $praga["data_execucao"],
  "fantasia"         => $praga["fantasia"],
  "atividade_imovel" => $praga["atividade_imovel"],
  "endereco"         => $praga["endereco"],
  "telefone"         => $praga["telefone"],
  "contato"          => $praga["contato"],
  "executores"       => $praga["executores"],
  "observacoes"      => $praga["observacoes"],
  "produtos"         => $produtos // << lista de produtos usada no template
];


// Template de pragas (espera variável $dados e gera $html)
require __DIR__ . "/template_pragas.php";

if (!isset($html) || trim($html) === '') {
    $html = '<html><body><p>Nenhum conteúdo gerado.</p></body></html>';
}

// Configurações do Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->setChroot(__DIR__);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

if (ob_get_length()) {
    ob_end_clean();
}

$dompdf->stream("controle_pragas_$praga_id.pdf", ["Attachment" => false]);
exit;
