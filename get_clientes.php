<?php
header('Content-Type: application/json; charset=utf-8');
$conn = new mysqli("localhost", "root", "", "bsa_clientes");
if ($conn->connect_error) { http_response_code(500); exit; }

$dados = [];
$res = $conn->query("SELECT id, razao_social FROM clientes ORDER BY razao_social");
while ($row = $res->fetch_assoc()) {
    $dados[] = ["id" => $row['id'], "nome" => $row['razao_social']];
}
echo json_encode($dados);
?>
