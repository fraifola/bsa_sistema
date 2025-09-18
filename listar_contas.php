<?php
// Credenciais do banco (substitua pelas suas)
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "bsa";

try {
    // Conexão com o banco
    $conn = new mysqli($host, $usuario, $senha, $banco);
    
    if ($conn->connect_error) {
        throw new Exception("Erro de conexão: " . $conn->connect_error);
    }

    // Consulta SQL
    $sql = "SELECT
                data_emissao,
                fornecedor,
                funcionario,
                documento_nf,
                data_vencimento,
                subtotal,
                subcategoria,
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
            ORDER BY data_vencimento DESC";

    $result = $conn->query($sql);
    
    if (!$result) {
        throw new Exception("Erro na consulta: " . $conn->error);
    }

    // Processar resultados
    $contas = [];
    while ($row = $result->fetch_assoc()) {
        $contas[] = $row;
    }

    // Retornar JSON
    echo json_encode([
        'success' => true,
        'data' => $contas,
        'count' => count($contas)
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>