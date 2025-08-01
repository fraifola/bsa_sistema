<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$user = "root";
$password = "";
$dbname = "bsa";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro de conexão: " . $conn->connect_error]);
    exit();
}

$data_emissao    = $_POST['data_emissao'] ?? null;
$tipo            = $_POST['tipo'] ?? null;
$conta_corrente  = $_POST['conta_corrente'] ?? null;
$documento_nf    = $_POST['documento_nf'] ?? null;
$fornecedor      = $_POST['fornecedor'] ?? null;
$funcionario     = $_POST['funcionario'] ?? null;
$data_vencimento = $_POST['data_vencimento'] ?? null;
$subtotal        = floatval($_POST['subtotal'] ?? $_POST['subtotal$l'] ?? 0); 
$plano_contas    = $_POST['plano_contas'] ?? null;
$subcategoria    = $_POST['subcategoria'] ?? null;
$forma_pagamento = $_POST['forma_pagamento'] ?? null;
$situacao        = $_POST['situacao'] ?? null;
$repeticao       = $_POST['repeticao'] ?? $_POST['repeteicao'] ?? null; 
$descricao       = $_POST['descricao'] ?? null;
$juros_multa     = floatval($_POST['juros_multa'] ?? 0);
$desconto        = floatval($_POST['desconto'] ?? 0);
$data_liquidacao = $_POST['data_liquidacao'] ?? null;
$total_pago      = floatval($_POST['total_pago'] ?? 0);

if (empty($data_emissao) || empty($tipo) || empty($data_vencimento) || empty($subtotal)) {
    http_response_code(400);
    echo json_encode(["erro" => "Campos obrigatórios faltando"]);
    exit();
}

$stmt = $conn->prepare("INSERT INTO contas_pagar (
    data_emissao, tipo, conta_corrente, documento_nf, fornecedor, funcionario,
    data_vencimento, subtotal, plano_contas, subcategoria, forma_pagamento,
    situacao, repeticao, descricao,
    juros_multa, desconto, data_liquidacao, total_pago
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro na preparação da query: " . $conn->error]);
    exit();
}

$stmt->bind_param(
    "ssssssssdsssssddsd",
    $data_emissao,
    $tipo,
    $conta_corrente,
    $documento_nf,
    $fornecedor,
    $funcionario,
    $data_vencimento,
    $subtotal,
    $plano_contas,
    $subcategoria,
    $forma_pagamento,
    $situacao,
    $repeticao,
    $descricao,
    $juros_multa,
    $desconto,
    $data_liquidacao,
    $total_pago
);

if ($stmt->execute()) {
    echo json_encode(["status" => "sucesso"]);
} else {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao salvar: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
