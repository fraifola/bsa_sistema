<?php
header("Content-Type: application/json");
require "conexao.php"; // sua conexão com o banco

try {
    $dados = json_decode(file_get_contents("php://input"), true);

    if (!$dados) {
        throw new Exception("Nenhum dado recebido");
    }

    // ========== SALVAR OS PRINCIPAL ==========
    $stmt = $conn->prepare("
        INSERT INTO controle_pragas
        (cliente_id, fantasia, endereco, telefone, contato, atividade_imovel, data_emissao, data_execucao, executores, observacoes)
        VALUES (:cliente_id, :fantasia, :endereco, :telefone, :contato, :atividade_imovel, NOW(), NOW(), :executores, :observacoes)
    ");

    $stmt->execute([
        ":cliente_id"       => $dados["cliente_id"],
        ":fantasia"         => $dados["fantasia"],
        ":endereco"         => $dados["endereco"],
        ":telefone"         => $dados["telefone"],
        ":contato"          => $dados["contato"],
        ":atividade_imovel" => $dados["atividade_imovel"],
        ":executores"       => $dados["executores"],
        ":observacoes"      => $dados["observacoes"],
    ]);

    $id_os = $conn->lastInsertId();

    // ========== SALVAR PRODUTOS ==========
    if (!empty($dados["produtos"])) {
        $stmtProd = $conn->prepare("
            INSERT INTO controle_pragas_produtos (id_os, id_produto, quantidade_utilizada)
            VALUES (:id_os, :id_produto, :quantidade)
        ");

        foreach ($dados["produtos"] as $p) {
            $stmtProd->execute([
                ":id_os"      => $id_os,
                ":id_produto" => $p["produto_id"],
                ":quantidade" => $p["quantidade"],
            ]);
        }
    }

    echo json_encode(["success" => true, "id" => $id_os]);

} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
