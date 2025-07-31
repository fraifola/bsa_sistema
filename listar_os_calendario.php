<?php
// Arquivo: listar_os_calendario.php
header('Content-Type: application/json');

require_once 'conexao.php'; // Inclua seu arquivo de conexão

$events = array();

// Query para buscar as ordens de serviço e o nome do cliente
$sql = "SELECT
            os.id,
            c.razao_social AS cliente_nome, -- Pegar o nome do cliente da tabela de clientes
            c.id AS cliente_id,           -- O ID do cliente
            os.servico,
            os.data_inicio,
            os.data_fim,
            os.observacoes
        FROM
            ordens_servico os
        LEFT JOIN -- Use LEFT JOIN caso uma OS possa não ter cliente (se cliente_id for NULL)
            clientes c ON os.cliente_id = c.id";

$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $start_datetime = new DateTime($row['data_inicio']);
        $end_datetime = $row['data_fim'] ? new DateTime($row['data_fim']) : null;

        $title_display = "OS - " . htmlspecialchars($row['servico']);
        if (!empty($row['cliente_nome'])) {
            $title_display .= " (" . htmlspecialchars($row['cliente_nome']) . ")";
        }

        $event = [
            'id' => $row['id'],
            'title' => $title_display,
            'start' => $start_datetime->format(DateTime::ATOM), // Formato ISO 8601 para FullCalendar
            'end' => $end_datetime ? $end_datetime->format(DateTime::ATOM) : null,
            'allDay' => $end_datetime === null, // Considera allDay se não houver hora de fim
            'color' => '#7fc241', // Cor padrão
            'extendedProps' => [ // Armazenar dados adicionais aqui
                'cliente_id' => $row['cliente_id'], // O ID do cliente (usado para salvar/atualizar)
                'cliente_nome' => $row['cliente_nome'], // O nome do cliente (para exibição)
                'servico' => $row['servico'],
                'description' => $row['observacoes']
            ]
        ];
        $events[] = $event;
    }
} else {
    // Retorna erro se a query falhar
    echo json_encode(["error" => "Erro ao buscar ordens de serviço: " . $conn->error]);
    exit();
}

$conn->close();
echo json_encode($events);
?>