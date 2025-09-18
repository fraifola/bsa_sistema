<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// (opcional) não imprimir notices no output do PDF
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Config DB
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "bsa";

$lavagem_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($lavagem_id <= 0) {
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
$sql = "SELECT * FROM lavagem_tanque WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $lavagem_id);
$stmt->execute();
$result = $stmt->get_result();
$lavagem = $result->fetch_assoc();

if (!$lavagem) {
  http_response_code(404);
  exit("Lavagem não encontrada");
}

// Monta $dados (garante strings)
$dados = [
  "os_numero"        => $lavagem["id"] ?? '',
  "emissao"          => $lavagem["data_emissao"] ?? '',
  "data_execucao"    => $lavagem["data_execucao"] ?? '',
  "fantasia"         => $lavagem["fantasia"] ?? '',
  "atividade_imovel" => $lavagem["atividade_imovel"] ?? '',
  "endereco"         => $lavagem["endereco"] ?? '',
  "telefone"         => $lavagem["telefone"] ?? '',
  "contato"          => $lavagem["contato"] ?? '',
  "produto"          => $lavagem["produto"] ?? '',
  "principio_ativo"  => $lavagem["principio_ativo"] ?? '',
  "quantidade"       => $lavagem["quantidade_utilizada"] ?? '',
  "unidade_medida"   => $lavagem["unidade_medida"] ?? '',
  "reg_min_saude"    => $lavagem["reg_min_saude"] ?? '',
  "concentracao"     => $lavagem["concentracao"] ?? '',
  "volume"           => $lavagem["volume"] ?? '',
  "executores"       => $lavagem["executores"] ?? '',
  "responsavel"      => $lavagem["responsavel"] ?? '',
  "obs_superior"     => $lavagem["obs_superior"] ?? '',
  "obs_cliente"      => $lavagem["obs_cliente"] ?? '',
  "info_gerais"      => $lavagem["info_gerais"] ?? '',
  "tabela_reservatorios" =>
      "<tr><td>-</td><td>".($lavagem["reservatorio"] ?? '')."</td><td>".($lavagem["volume"] ?? '')."</td><td>".($lavagem["material"] ?? '')."</td><td>".($lavagem["cobertura"] ?? '')."</td><td>-</td><td>-</td><td>-</td></tr>"
];

// >>> Aqui: apenas “require” o template que DEFINE $html.
require __DIR__ . "/template.php";  // este arquivo cria $html

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

// Garante que nada além do PDF seja impresso
if (ob_get_length()) { ob_end_clean(); }

$dompdf->stream("lavagem_tanque_$lavagem_id.pdf", ["Attachment" => false]);
exit;
