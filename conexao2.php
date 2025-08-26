<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bsa_clientes";

ob_start();

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        throw new Exception("Falha na conexão: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
} catch (Exception $e) {
 
    ob_end_clean();

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode([
            "success" => false,
            "message" => $e->getMessage()
        ]);
    } else {
        echo "Erro de conexão com o banco de dados";
    }
    exit();
}
ob_end_clean();
?>