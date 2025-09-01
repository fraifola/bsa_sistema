<?php
header('Content-Type: application/json; charset=utf-8');

try {
    // Conectar ao banco
    $pdo = new PDO("mysql:host=localhost;dbname=bsa;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buscar as lavagens
    $stmt = $pdo->query("SELECT id, fantasia, reservatorio, data_cadastro FROM lavagem_tanque ORDER BY id DESC");
    $lavagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "success" => true,
        "data" => $lavagens
    ]);

} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "message" => "Erro: " . $e->getMessage()
    ]);
}
