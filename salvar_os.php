<?php
header('Content-Type: application/json');
session_start();

require_once 'conexao2.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Coleta e sanitiza os dados do POST
        $tipo_cliente = isset($_POST['tipo_cliente']) ? (int)$_POST['tipo_cliente'] : null;
        $servico = isset($_POST['servico']) ? $conn->real_escape_string($_POST['servico']) : null;
        $dataInicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : null;
        $horaInicio = isset($_POST['hora_inicio']) ? $_POST['hora_inicio'] : null;
        $horaFim = isset($_POST['hora_fim']) && !empty($_POST['hora_fim']) ? $_POST['hora_fim'] : null;
        $observacoes = isset($_POST['observacoes']) && !empty($_POST['observacoes']) ? $conn->real_escape_string($_POST['observacoes']) : null;

        // Validação de campos obrigatórios
        if (!$tipo_cliente || !$servico || !$dataInicio || !$horaInicio) {
            $response['message'] = 'Dados obrigatórios (cliente, serviço, data/hora de início) estão faltando.';
            echo json_encode($response);
            exit();
        }

        // Cria datetime no formato correto para MySQL
        $dataHoraInicio = $dataInicio . ' ' . $horaInicio . ':00';
        $dataHoraFim = $horaFim ? $dataInicio . ' ' . $horaFim . ':00' : null;

        // Prepara a query
        $stmt = $conn->prepare("INSERT INTO ordens_servico 
            (tipo_cliente, servico, data_inicio, hora_inicio, hora_fim, observacoes, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, NOW())");

        if ($stmt === false) {
            throw new Exception('Erro ao preparar a query: ' . $conn->error);
        }

        // Faz o bind dos parâmetros
        $stmt->bind_param(
            "isssss",
            $tipo_cliente,
            $servico,
            $dataHoraInicio,
            $horaInicio,
            $dataHoraFim,
            $observacoes
        );

        // Executa e trata a resposta
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Ordem de Serviço salva com sucesso!';
            $response['id'] = $stmt->insert_id;
        } else {
            $response['message'] = 'Erro ao salvar Ordem de Serviço: ' . $stmt->error;
        }

        $stmt->close();
    } catch (Exception $e) {
        $response['message'] = 'Exceção: ' . $e->getMessage();
    }
} else {
    $response['message'] = 'Método de requisição inválido.';
}

$conn->close();

echo json_encode($response);
exit();