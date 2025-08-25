<?php
header('Content-Type: application/json; charset=utf-8');

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
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("JSON inválido: " . json_last_error_msg());
    }

    // CORREÇÃO: 31 parâmetros na query
    $stmt = $conn->prepare("INSERT INTO lavagem_tanque 
    (cliente_id, fantasia, telefone, endereco, contato, cep, vendedor, setor, reservatorio,
     principio_ativo, reg_min_saude, atividade_imovel, ponto_referencia, volume, profundidade, diametro,
     material, cobertura, detritos, vetores, rachaduras, vetores_reservatorio,
     obs_superior, obs_cliente, info_gerais, executores, produto_id, produto,
     quantidade_utilizada, unidade_medida, concentracao)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


$stmt->bind_param("issssssssssssddssssssssssissdsd",
    $data['cliente_id'],
    $data['fantasia'],
    $data['telefone'],
    $data['endereco'],
    $data['contato'],
    $data['cep'],
    $data['vendedor'],
    $data['setor'],
    $data['reservatorio'],
    $data['principio_ativo'],
    $data['reg_min_saude'],
    $data['atividade_imovel'],
    $data['ponto_referencia'],
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
    $data['produto_id'],
    $data['produto'],
    $data['quantidade_utilizada'],
    $data['unidade_medida'],
    $data['concentracao']
);

    
    if ($stmt->execute()) {
        $lavagem_id = $conn->insert_id;
        
        // Atualiza o estoque
        if (isset($data['produto_id']) && isset($data['quantidade'])) {
            $sqlEstoque = "UPDATE estoque SET quantidade = quantidade - ? WHERE id = ?";
            $stmtEstoque = $conn->prepare($sqlEstoque);
            $stmtEstoque->bind_param("di", $data['quantidade'], $data['produto_id']);
            $stmtEstoque->execute();
            $stmtEstoque->close();
        }
        
        echo json_encode([
            'success' => true, 
            'message' => 'Registro salvo com sucesso',
            'lavagem_id' => $lavagem_id
        ]);
    } else {
        throw new Exception("Erro ao salvar: " . $stmt->error);
    }
    
    $stmt->close();
    $conn->close();
    
} catch (Exception $e) {
    http_response_code(500);
    error_log("Erro em salvar_lavagem.php: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'Erro: ' . $e->getMessage()
    ]);
}

?>