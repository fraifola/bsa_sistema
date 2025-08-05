<?php
header('Content-Type: application/json');

// Configurações do banco
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "bsa";

try {
    $conn = new mysqli($host, $usuario, $senha, $banco);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Recebe os dados do POST
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Prepara a query SQL
    $stmt = $conn->prepare("INSERT INTO lavagem_tanque 
        (cliente_id, fantasia, endereco, telefone, ponto_referencia, contato, atividade_imovel, cep, vendedor, setor,
         reservatorio, volume, profundidade, diametro, material, cobertura, detritos, vetores, rachaduras,
         vetores_reservatorio, obs_superior, obs_cliente, info_gerais, executores, produto, principio_ativo,
         quantidade, unidade_medida, reg_min_saude, concentracao, data_registro)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    
    // Bind parameters
    $stmt->bind_param("isssssssssssddssssssssssssdssd", 
        $data['cliente_id'],
        $data['fantasia'],
        $data['endereco'],
        $data['telefone'],
        $data['ponto_referencia'],
        $data['contato'],
        $data['atividade_imovel'],
        $data['cep'],
        $data['vendedor'],
        $data['setor'],
        $data['reservatorio'],
        $data['volume'],
        $data['profundidade'],
        $data['diametro'],
        $data['material'],
        $data['cobertura'],
        $data['detritos'],
        $data['vetores'],
        $data['rachaduras'],
        $data['vetores_reservatorio'],
        $data['obs_superior'],
        $data['obs_cliente'],
        $data['info_gerais'],
        $data['executores'],
        $data['produto'],
        $data['principio_ativo'],
        $data['quantidade'],
        $data['unidade_medida'],
        $data['reg_min_saude'],
        $data['concentracao']
    );
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Registro salvo com sucesso']);
    } else {
        throw new Exception("Erro ao salvar: " . $stmt->error);
    }
    
    $stmt->close();
    $conn->close();
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}