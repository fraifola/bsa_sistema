<?php
require __DIR__ . '/vendor/autoload.php'; // Autoload do Composer

use Dompdf\Dompdf;
use Dompdf\Options;

// Configuração
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "bsa";

// Pega o ID da lavagem (via GET)
$lavagem_id = $_GET['id'] ?? 0;

$conn = new mysqli($host, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Busca os dados no banco
$sql = "SELECT * FROM lavagem_tanque WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $lavagem_id);
$stmt->execute();
$result = $stmt->get_result();
$lavagem = $result->fetch_assoc();

if (!$lavagem) {
    die("Lavagem não encontrada!");
}

// 👉 Monta array com os dados
$dados = [
  "os_numero" => $lavagem["id"],
  "emissao" => $lavagem["data_emissao"],
  "data_execucao" => $lavagem["data_execucao"],
  "fantasia" => $lavagem["fantasia"],
  "atividade_imovel" => $lavagem["atividade_imovel"],
  "endereco" => $lavagem["endereco"],
  "telefone" => $lavagem["telefone"],
  "contato" => $lavagem["contato"],
  "produto" => $lavagem["produto"],
  "principio_ativo" => $lavagem["principio_ativo"],
  "quantidade" => $lavagem["quantidade_utilizada"],
  "unidade_medida" => $lavagem["unidade_medida"],
  "reg_min_saude" => $lavagem["reg_min_saude"],
  "concentracao" => $lavagem["concentracao"],
  "volume" => $lavagem["volume"],
  "executores" => $lavagem["executores"],
  "responsavel" => $lavagem["responsavel"],
  "obs_superior" => $lavagem["obs_superior"],
  "obs_cliente" => $lavagem["obs_cliente"],
  "info_gerais" => $lavagem["info_gerais"],
  "tabela_reservatorios" => "<tr><td>-</td><td>{$lavagem["reservatorio"]}</td><td>{$lavagem["volume"]}</td><td>{$lavagem["material"]}</td><td>{$lavagem["cobertura"]}</td><td>-</td><td>-</td><td>-</td></tr>"
];

// 👉 Puxa o template
ob_start();
include "template_os.php";
$html = ob_get_clean();

// Configurações do Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Força o download
$dompdf->stream("lavagem_tanque_$lavagem_id.pdf", ["Attachment" => true]);
