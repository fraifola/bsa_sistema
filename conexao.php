<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bsa_clientes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    // Retorna erro em formato JSON
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode([
        "success" => false,
        "message" => "Falha na conexão com o banco de dados: " . $conn->connect_error
    ]);
    exit();
}

$conn->set_charset("utf8");
?>
