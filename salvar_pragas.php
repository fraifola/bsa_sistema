<?php
header("Content-Type: application/json");
require "conexao.php"; // sua conexão com mysqli

// Mostrar erros (somente para debug em desenvolvimento)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $dados = json_decode(file_get_contents("php://input"), true);

    if (!$dados) {
        throw new Exception("Nenhum dado recebido");
    }

    // ---------- INSERIR ORDEM DE SERVIÇO PRINCIPAL ----------
    $stmt = $conn->prepare("
        INSERT INTO controle_pragas
        (cliente_id, fantasia, endereco, telefone, contato, atividade_imovel, data_emissao, data_execucao, executores, observacoes)
        VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW(), ?, ?)
    ");

    if (!$stmt) {
        throw new Exception("Erro ao preparar statement: " . $conn->error);
    }

    // Tratar campos nulos
    $cliente_id       = !empty($dados["cliente_id"]) ? (int)$dados["cliente_id"] : null;
    $fantasia         = !empty($dados["fantasia"]) ? $dados["fantasia"] : null;
    $endereco         = !empty($dados["endereco"]) ? $dados["endereco"] : null;
    $telefone         = !empty($dados["telefone"]) ? $dados["telefone"] : null;
    $contato          = !empty($dados["contato"]) ? $dados["contato"] : null;
    $atividade_imovel = !empty($dados["atividade_imovel"]) ? $dados["atividade_imovel"] : null;
    $executores       = !empty($dados["executores"]) ? $dados["executores"] : null;
    $observacoes      = !empty($dados["observacoes"]) ? $dados["observacoes"] : null;

    // 8 variáveis -> 1 inteiro + 7 strings
    $stmt->bind_param(
        "isssssss",
        $cliente_id,
        $fantasia,
        $endereco,
        $telefone,
        $contato,
        $atividade_imovel,
        $executores,
        $observacoes
    );

    if (!$stmt->execute()) {
        throw new Exception("Erro ao inserir ordem de serviço: " . $stmt->error);
    }

    $id_os = $stmt->insert_id;
    $stmt->close();

    // ---------- INSERIR PRODUTOS ----------
    if (!empty($dados["produtos"]) && is_array($dados["produtos"])) {
        $stmtProd = $conn->prepare("
            INSERT INTO controle_pragas_produtos (id_os, id_produto, quantidade_utilizada)
            VALUES (?, ?, ?)
        ");

        if (!$stmtProd) {
            throw new Exception("Erro ao preparar insert de produtos: " . $conn->error);
        }

        foreach ($dados["produtos"] as $p) {
            $id_produto = (int)$p["produto_id"];
            $quantidade = (float)$p["quantidade"];

            $stmtProd->bind_param("iid", $id_os, $id_produto, $quantidade);

            if (!$stmtProd->execute()) {
                throw new Exception("Erro ao inserir produto: " . $stmtProd->error);
            }
        }

        $stmtProd->close();
    }

    echo json_encode(["success" => true, "id" => $id_os]);

} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
