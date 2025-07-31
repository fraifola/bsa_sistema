<?php
echo "DEBUG: Running salvar_conta.php version 20250731_1440<br>"; // Add this line
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ... rest of your code

$host = "localhost";
$user = "root";
$password = "";
$dbname = "bsa"; // Change to the correct database name

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo "Erro de conexão: " . $conn->connect_error;
    exit();
}

// --- MUDANÇA CRUCIAL AQUI ---
// Coletando dados diretamente de $_POST
$data_emissao    = $_POST['data_emissao'] ?? null;
$tipo            = $_POST['tipo'] ?? null;
$conta_corrente  = $_POST['conta_corrente'] ?? null;
$documento_nf    = $_POST['documento_nf'] ?? null;
$fornecedor      = $_POST['fornecedor'] ?? null;
$funcionario     = $_POST['funcionario'] ?? null;
$data_vencimento = $_POST['data_vencimento'] ?? null;
// Use 'subtotall' (minúsculo v) se esse for o name no seu HTML
$subtotal  = floatval($_POST['subtotal'] ?? $_POST['subtotal$l'] ?? 0); 
$plano_contas    = $_POST['plano_contas'] ?? null;
$subcategoria    = $_POST['subcategoria'] ?? null;
$forma_pagamento = $_POST['forma_pagamento'] ?? null;
$situacao        = $_POST['situacao'] ?? null;
// Verifique o name no HTML para 'repeticao' vs 'repeteicao'
$repeticao       = $_POST['repeticao'] ?? $_POST['repeteicao'] ?? null; 
$descricao       = $_POST['descricao'] ?? null;
$juros_multa     = floatval($_POST['juros_multa'] ?? 0);
$desconto        = floatval($_POST['desconto'] ?? 0);
$data_liquidacao = $_POST['data_liquidacao'] ?? null;
$total_pago      = floatval($_POST['total_pago'] ?? 0);
// --- FIM DA MUDANÇA CRUCIAL ---

// Validar se dados essenciais existem antes de prosseguir
if (empty($data_emissao) || empty($tipo) || empty($data_vencimento) || empty($subtotal)) {
    http_response_code(400);
    echo "Erro: Campos essenciais (Data Emissão, Tipo, Data Vencimento, Valor Previsto) não podem estar vazios.";
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
    echo "Erro na preparação da query: " . $conn->error;
    exit();
}

// Verifique cuidadosamente a string de tipos (18 parâmetros, verifique os tipos de suas colunas no DB!)
// Exemplo: 'ssssssssdsssssddsd' se as datas são strings, subtotal$subtotal double, juros/desconto/total double
$stmt->bind_param(
    "ssssssssdsssssddsd", // Ajuste conforme os tipos de suas colunas no DB!
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
    echo "Conta salva com sucesso!";
    // Redireciona para a página principal após salvar
    header("Location: Sistema_bsa.php");
    exit();
} else {
    http_response_code(500);
    echo "Erro ao salvar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>