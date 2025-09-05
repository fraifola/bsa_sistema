<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

ini_set('display_errors', 0);
error_reporting(E_ALL);

// Config DB
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "bsa";

$praga_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($praga_id <= 0) {
  http_response_code(400);
  exit('ID inválido');
}

$conn = new mysqli($host, $usuario, $senha, $banco);
if ($conn->connect_error) {
  http_response_code(500);
  exit("Erro de conexão");
}
$conn->set_charset('utf8mb4');

// Busca os dados
$sql = "SELECT * FROM controle_praga WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $praga_id);
$stmt->execute();
$result = $stmt->get_result();
$praga = $result->fetch_assoc();

if (!$praga) {
  http_response_code(404);
  exit("Controle de pragas não encontrado");
}

// Monta $dados (ajuste os campos conforme a tabela controle_praga)
$dados = [
  "os_numero"        => $praga["id"] ?? '',
  "emissao"          => $praga["data_emissao"] ?? '',
  "data_execucao"    => $praga["data_execucao"] ?? '',
  "fantasia"         => $praga["fantasia"] ?? '',
  "atividade_imovel" => $praga["atividade_imovel"] ?? '',
  "endereco"         => $praga["endereco"] ?? '',
  "telefone"         => $praga["telefone"] ?? '',
  "contato"          => $praga["contato"] ?? '',
  "produto"          => $praga["produto"] ?? '',
  "principio_ativo"  => $praga["principio_ativo"] ?? '',
  "quantidade"       => $praga["quantidade_utilizada"] ?? '',
  "unidade_medida"   => $praga["unidade_medida"] ?? '',
  "reg_min_saude"    => $praga["reg_min_saude"] ?? '',
  "concentracao"     => $praga["concentracao"] ?? '',
  "area_tratada"     => $praga["area_tratada"] ?? '',
  "pragas_alvo"      => $praga["pragas_alvo"] ?? '',
  "executores"       => $praga["executores"] ?? '',
  "responsavel"      => $praga["responsavel"] ?? '',
  "obs_superior"     => $praga["obs_superior"] ?? '',
  "obs_cliente"      => $praga["obs_cliente"] ?? '',
  "info_gerais"      => $praga["info_gerais"] ?? ''
];

// Template de pragas
require __DIR__ . "/template_pragas.php";

if (!isset($html) || trim($html) === '') {
  $html = '<html><body><p>Nenhum conteúdo gerado.</p></body></html>';
}

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->setChroot(__DIR__);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

if (ob_get_length()) { ob_end_clean(); }

$dompdf->stream("controle_praga_$praga_id.pdf", ["Attachment" => false]);
exit;
