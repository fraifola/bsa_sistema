<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $executor = $_POST['executor'];
    $produto_id = $_POST['produto_id'];
    $quantidade_usada = (float) $_POST['quantidade_usada'];

    // Verificar estoque atual
    $sqlCheck = "SELECT quantidade FROM produtos WHERE id = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("i", $produto_id);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();
    $produto = $result->fetch_assoc();

    if ($produto && $produto['quantidade'] >= $quantidade_usada) {
        // 1. Registrar execução
        $sqlExec = "INSERT INTO execucao_servico (executor, produto_id, quantidade_usada)
                    VALUES (?, ?, ?)";
        $stmtExec = $conn->prepare($sqlExec);
        $stmtExec->bind_param("sid", $executor, $produto_id, $quantidade_usada);
        $stmtExec->execute();

        // 2. Atualizar estoque
        $sqlUpdate = "UPDATE produtos SET quantidade = quantidade - ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("di", $quantidade_usada, $produto_id);
        $stmtUpdate->execute();

        echo "Execução salva e estoque atualizado!";
    } else {
        echo "Erro: quantidade usada maior do que disponível em estoque!";
    }
}
?>
