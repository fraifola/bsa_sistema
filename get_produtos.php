<?php
// get_produtos.php
header('Content-Type: application/json; charset=utf-8');

// IMPORTANTE: Nada de output antes deste ponto!

require_once 'conexao.php';

$response = ["success" => false, "data" => [], "error" => ""];

// Verifica se a conexão foi estabelecida
if ($conn->connect_error) {
    $response["error"] = "Erro de conexão com o banco de dados";
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();
}

try {
    $sql = "SELECT id, produto_utilizado, principio_ativo, quantidade, unidade_medida, registro_ms, concentracao 
            FROM estoque 
            ORDER BY produto_utilizado ASC";
    
    $result = $conn->query($sql);
    
    if ($result) {
        $produtos = [];
        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }
        $response["success"] = true;
        $response["data"] = $produtos;
    } else {
        $response["error"] = "Erro na consulta: " . $conn->error;
    }

} catch (Exception $e) {
    $response["error"] = $e->getMessage();
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit();
?>