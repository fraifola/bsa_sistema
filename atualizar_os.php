<?php
// Arquivo: atualizar_os.php
header('Content-Type: application/json');

require_once 'conexao.php'; // Inclui o arquivo de conexão

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_os = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    // MODIFICAÇÃO: Pega tipo_cliente em vez de cliente
    $tipo_cliente = isset($_POST['tipo_cliente']) ? (int)$_POST['tipo_cliente'] : 0;
    $servico = isset($_POST['servico']) ? $conn->real_escape_string($_POST['servico']) : '';
    $dataInicio = isset($_POST['data_inicio']) ? $conn->real_escape_string($_POST['data_inicio']) : '';
    $horaInicio = isset($_POST['hora_inicio']) ? $conn->real_escape_string($_POST['hora_inicio']) : '';
    $horaFim = isset($_POST['hora_fim']) ? $conn->real_escape_string($_POST['hora_fim']) : '';
    $observacoes = isset($_POST['observacoes']) ? $conn->real_escape_string($_POST['observacoes']) : '';

    if ($id_os === 0 || $tipo_cliente === 0 || empty($dataInicio) || empty($horaInicio) || empty($servico)) {
        $response['success'] = false;
        $response['message'] = "Dados inválidos para atualização. ID da OS, ID do cliente, data, hora de início ou serviço estão faltando.";
        echo json_encode($response);
        exit();
    }

    $data_hora_inicio = $dataInicio . ' ' . $horaInicio . ':00';
    $data_hora_fim = !empty($horaFim) ? $dataInicio . ' ' . $horaFim . ':00' : NULL;

    // Prepara a query SQL para UPDATE
    // MODIFICAÇÃO: Atualiza tipo_cliente
    $sql = "UPDATE ordens_servico SET
                tipo_cliente = ?,
                servico = ?,
                data_inicio = ?,
                data_fim = ?,
                observacoes = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // 'issssi' -> 1 integer (tipo_cliente), 4 strings, 1 integer (id)
        $stmt->bind_param("issssi", $tipo_cliente, $servico, $data_hora_inicio, $data_hora_fim, $observacoes, $id_os);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Ordem de Serviço atualizada com sucesso!";
        } else {
            $response['success'] = false;
            $response['message'] = "Erro ao atualizar Ordem de Serviço: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $response['success'] = false;
        $response['message'] = "Erro na preparação da declaração: " . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "Método de requisição inválido.";
}

$conn->close();
echo json_encode($response);
?>