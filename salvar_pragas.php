<?php
header("Content-Type: application/json; charset=UTF-8");
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
    (cliente_id, fantasia, endereco, telefone, contato, atividade_imovel, area_tratada, pragas_alvo, data_emissao, data_execucao, executores, observacoes, obs_supervisor, obs_cliente, obs_gerais, obs_executores)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), ?, ?, ?, ?, ?, ?)
");

if (!$stmt) {
    throw new Exception("Erro ao preparar statement: " . $conn->error);
}

$cliente_id       = $dados["cliente_id"] ?? null;
$fantasia         = $dados["fantasia"] ?? null;
$endereco         = $dados["endereco"] ?? null;
$telefone         = $dados["telefone"] ?? null;
$contato          = $dados["contato"] ?? null;
$atividade_imovel = $dados["atividade_imovel"] ?? null;
$area_tratada     = $dados["area_tratada"] ?? null;
$pragas_alvo      = $dados["pragas_alvo"] ?? null;
$executores       = $dados["executores"] ?? null;
$observacoes      = $dados["observacoes"] ?? null;
$obs_supervisor   = $dados["obs_supervisor"] ?? null;
$obs_cliente      = $dados["obs_cliente"] ?? null;
$obs_gerais       = $dados["obs_gerais"] ?? null;
$obs_executores   = $dados["obs_executores"] ?? null;

// 1 int + 13 strings => 14 variáveis
$stmt->bind_param(
    "isssssssssssss",
    $cliente_id,
    $fantasia,
    $endereco,
    $telefone,
    $contato,
    $atividade_imovel,
    $area_tratada,
    $pragas_alvo,
    $executores,
    $observacoes,
    $obs_supervisor,
    $obs_cliente,
    $obs_gerais,
    $obs_executores
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

}catch (Exception $e) {
    http_response_code(500); // status erro
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage(),
        "trace" => $e->getTraceAsString()
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

