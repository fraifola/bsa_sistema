<?php
header('Content-Type: application/json; charset=utf-8');

// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "bsa");
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Erro de conexão: ' . $conn->connect_error]));
}

try {
    // Verifica se a tabela clientes existe
    $tableCheck = $conn->query("SHOW TABLES LIKE 'clientes'");
    if ($tableCheck->num_rows == 0) {
        throw new Exception("Tabela 'clientes' não encontrada");
    }

    // Consulta segura - verifica colunas existentes
    $columns = $conn->query("SHOW COLUMNS FROM clientes")->fetch_all(MYSQLI_ASSOC);
    $availableColumns = array_column($columns, 'Field');
    
    // Seleciona apenas colunas existentes
    $selectColumns = ['id', 'razao_social'];
    $optionalColumns = ['fantasia', 'endereco', 'numero', 'complemento', 'telefone', 'contato_responsavel', 'cep', 'operacional'];
    
    foreach ($optionalColumns as $col) {
        if (in_array($col, $availableColumns)) {
            $selectColumns[] = $col;
        }
    }

    $query = "SELECT " . implode(', ', $selectColumns) . " FROM clientes";
    
    // FILTRO OPERACIONAL - Corrigido
    if (isset($_GET['operacional']) && $_GET['operacional'] == '1' && in_array('operacional', $availableColumns)) {
        $query .= " WHERE operacional = 1";
    }
    
    $query .= " ORDER BY razao_social";
    
    $res = $conn->query($query);
    if (!$res) {
        throw new Exception("Erro na consulta: " . $conn->error);
    }
    
    $dados = [];
    while ($row = $res->fetch_assoc()) {
        $cliente = [
            'id' => $row['id'],
            'razao_social' => $row['razao_social']
        ];
        
        // Adiciona campos opcionais se existirem
        foreach ($optionalColumns as $col) {
            if (isset($row[$col])) {
                $cliente[$col] = $row[$col];
            }
        }
        
        // Cria endereço completo se campos existirem
        if (isset($row['endereco']) && isset($row['numero'])) {
            $cliente['endereco_completo'] = trim($row['endereco'] . ' ' . $row['numero'] . ' ' . ($row['complemento'] ?? ''));
        }
        
        $dados[] = $cliente;
    }
    
    echo json_encode(['success' => true, 'data' => $dados]);
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
} finally {
    if (isset($conn)) $conn->close();
}
?>