<?php
// Ativar exibição de erros para depuração (REMOVA EM PRODUÇÃO!)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configurações do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "bsa"; // Certifique-se de que este é o banco correto

// Conexão com o banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão e envia erro JSON se falhar
if ($conn->connect_error) {
    http_response_code(500); // Define o status HTTP para erro interno do servidor
    header('Content-Type: application/json'); // Informa que a resposta é JSON
    echo json_encode(["error" => "Falha na conexão com o banco de dados: " . $conn->connect_error]);
    exit(); // Encerra o script para evitar mais processamento e saída indesejada
}

// Prepara a consulta SQL para selecionar todas as contas
$sql = "SELECT
            data_emissao,
            fornecedor,
            documento_nf,
            data_vencimento,
            subtotal,
            situacao,
            tipo,
            conta_corrente,
            plano_contas,
            descricao,
            repeticao,
            juros_multa,
            desconto,
            forma_pagamento,
            data_liquidacao,
            total_pago
        FROM contas_pagar
        ORDER BY id DESC";

$result = $conn->query($sql);

$contas = array();
if ($result->num_rows > 0) {
    // Itera sobre os resultados e adiciona cada linha ao array de contas
    while($row = $result->fetch_assoc()) {
        // O JavaScript vai formatar os valores monetários e de data,
        // então enviamos os dados brutos aqui.
        $contas[] = $row;
    }
}

// Define o cabeçalho para indicar que a resposta é JSON
header('Content-Type: application/json');

// Codifica o array de contas para JSON e o imprime
echo json_encode($contas);

// Fecha a conexão com o banco de dados
$conn->close();
?>