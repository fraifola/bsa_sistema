<?php
// Arquivo: salvar_os.php
header('Content-Type: application/json'); // Garante que a resposta será JSON

require_once 'conexao.php'; // Inclui o arquivo de conexão

$response = array(); // Array para a resposta JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // MODIFICAÇÃO: Pega cliente_id em vez de cliente
    $cliente_id = isset($_POST['cliente_id']) ? (int)$_POST['cliente_id'] : 0;
    $servico = isset($_POST['servico']) ? $conn->real_escape_string($_POST['servico']) : '';
    $dataInicio = isset($_POST['data_inicio']) ? $conn->real_escape_string($_POST['data_inicio']) : '';
    $horaInicio = isset($_POST['hora_inicio']) ? $conn->real_escape_string($_POST['hora_inicio']) : '';
    $horaFim = isset($_POST['hora_fim']) ? $conn->real_escape_string($_POST['hora_fim']) : '';
    $observacoes = isset($_POST['observacoes']) ? $conn->real_escape_string($_POST['observacoes']) : '';

    // Validação
    if ($cliente_id === 0 || empty($servico) || empty($dataInicio) || empty($horaInicio)) {
        $response['success'] = false;
        $response['message'] = "Dados obrigatórios (cliente, serviço, data/hora de início) estão faltando.";
        echo json_encode($response);
        exit();
    }

    // Concatena data e hora para o formato DATETIME
    $data_hora_inicio = $dataInicio . ' ' . $horaInicio . ':00';
    $data_hora_fim = !empty($horaFim) ? $dataInicio . ' ' . $horaFim . ':00' : NULL;

    // Prepara a query SQL para INSERT
    // MODIFICAÇÃO: Insere cliente_id
    $sql = "INSERT INTO ordens_servico (cliente_id, servico, data_inicio, data_fim, observacoes) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // 'issss' indica que o primeiro parâmetro é integer (cliente_id) e os outros 4 são strings
        $stmt->bind_param("issss", $cliente_id, $servico, $data_hora_inicio, $data_hora_fim, $observacoes);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Ordem de Serviço salva com sucesso!";
            $response['id'] = $conn->insert_id; // Opcional: retorna o ID da nova OS
        } else {
            $response['success'] = false;
            $response['message'] = "Erro ao salvar Ordem de Serviço: " . $stmt->error;
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
