<?php
header('Content-Type: application/json; charset=utf-8');

try {
    // Conectar ao banco
    $pdo = new PDO("mysql:host=localhost;dbname=bsa;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buscar registros da tabela controle_praga
    $stmt = $pdo->query("
        SELECT 
            id, 
            fantasia, 
            endereco, 
            telefone, 
            contato, 
            atividade_imovel, 
            data_emissao, 
            data_execucao, 
            executores, 
            observacoes
        FROM controle_praga
        ORDER BY id DESC
    ");
    $pragas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "success" => true,
        "data" => $pragas
    ]);

} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "message" => "Erro: " . $e->getMessage()
    ]);
}
