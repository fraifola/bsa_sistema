<?php
// Ativar exibição de erros para depuração (REMOVA EM PRODUÇÃO!)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configurações do banco de dados
$host = "localhost";
$user = "root"; // substitua se não for "root"
$password = ""; // coloque a senha do seu MySQL, se houver
$dbname = "bsa_clientes"; // nome correto do banco

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo "Erro de conexão: " . $conn->connect_error;
    exit();
}

$dadosJson = file_get_contents("php://input");
$dados = json_decode($dadosJson, true);

// Verifica se os dados foram decodificados corretamente
if (json_last_error() !== JSON_ERROR_NONE || empty($dados)) {
    http_response_code(400); // Bad Request
    echo "Erro: Dados JSON inválidos ou vazios.";
    exit();
}

$data_emissao = $dados['data_emissao'] ?? null;
$tipo = $dados['tipo'] ?? null;
$conta_corrente = $dados['conta_corrente'] ?? null;
$documento_nf = $dados['documento_nf'] ?? null;
$fornecedor = $dados['fornecedor'] ?? null;
$funcionario = $dados['funcionario'] ?? null;
$data_vencimento = $dados['data_vencimento'] ?? null;
$Valor_previsto = floatval($dados['Valor_previsto'] ?? 0); // Corrigido para 'Valor_previsto' e floatval
$plano_contas = $dados['plano_contas'] ?? null;
$subcategoria = $dados['subcategoria'] ?? null;

$forma_pagamento = $dados['forma_pagamento'] ?? null; // CHAVE DO JS
$situacao = $dados['situacao'] ?? null; // CHAVE DO JS
$repeticao = $dados['repeticao'] ?? null; // CHAVE DO JS
$descricao = $dados['descricao'] ?? null; // CHAVE DO JS


$juros_multa = floatval($dados['juros_multa'] ?? 0);
$desconto = floatval($dados['desconto'] ?? 0);
$data_liquidacao = $dados['data_liquidacao'] ?? null;
$total_pago = floatval($dados['total_pago'] ?? 0);

$stmt = $conn->prepare("INSERT INTO contas_pagar (
    data_emissao, tipo, conta_corrente, documento_nf, fornecedor, funcionario,
    data_vencimento, Valor_previsto, plano_contas, subcategoria, forma_pagamento,
    situacao, repeticao, descricao,
    juros_multa, desconto, data_liquidacao, total_pago
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Verifica se a preparação da query falhou
if ($stmt === false) {
    http_response_code(500);
    echo "Erro na preparação da query: " . $conn->error;
    exit();
}

$stmt->bind_param(
    "ssssssssssssssssss", // Certifique-se de que o número de 's' corresponde ao número de parâmetros
    $data_emissao,
    $tipo,
    $conta_corrente,
    $documento_nf,
    $fornecedor,
    $funcionario,
    $data_vencimento,
    $Valor_previsto, 
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
} else {
    http_response_code(500); // Erro do servidor
    echo "Erro ao salvar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>