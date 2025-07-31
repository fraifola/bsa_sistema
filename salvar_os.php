<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$cliente = $input['cliente'] ?? '';
$servico = $input['servico'] ?? '';
$data_inicio = $input['data_inicio'] ?? '';
$hora_inicio = $input['hora_inicio'] ?? '';
$hora_fim = $input['hora_fim'] ?? '';
$observacoes = $input['observacoes'] ?? '';

// Validação básica
if (empty($cliente) || empty($servico) || empty($data_inicio) || empty($hora_inicio)) {
    echo json_encode(['success' => false, 'message' => 'Dados incompletos.']);
    exit;
}

// Incluir seu arquivo de conexão com o banco de dados
// include 'conexao.php'; // Certifique-se de ter este arquivo

// Exemplo de inserção (adaptar para seu DB e credenciais)
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//     echo json_encode(['success' => false, 'message' => 'Erro de conexão com o banco de dados: ' . $conn->connect_error]);
//     exit;
// }

// Prepare e execute a query SQL para salvar a OS
// $stmt = $conn->prepare("INSERT INTO ordens_servico (cliente, servico, data_inicio, hora_inicio, hora_fim, observacoes) VALUES (?, ?, ?, ?, ?, ?)");
// $stmt->bind_param("ssssss", $cliente, $servico, $data_inicio, $hora_inicio, $hora_fim, $observacoes);

// if ($stmt->execute()) {
//     echo json_encode(['success' => true, 'message' => 'OS salva com sucesso!', 'id' => $conn->insert_id]);
// } else {
//     echo json_encode(['success' => false, 'message' => 'Erro ao salvar OS: ' . $stmt->error]);
// }

// $stmt->close();
// $conn->close();

// Para teste sem banco de dados:
echo json_encode(['success' => true, 'message' => 'OS salva com sucesso (simulado)!', 'id' => uniqid()]);
?>