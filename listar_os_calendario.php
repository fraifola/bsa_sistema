<?php
header('Content-Type: application/json');
require_once 'conexao.php';

$sql = "SELECT id, tipo_cliente, servico, data_inicio, hora_inicio, hora_fim, observacoes FROM ordens_servico ORDER BY data_inicio DESC";
$result = $conn->query($sql);

$eventos = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Concatena data e hora
        $start = date('Y-m-d\TH:i:s', strtotime($row['data_inicio']));

        $end = null;
        if (!empty($row['hora_fim'])) {
            $end = date('Y-m-d', strtotime($row['data_inicio'])) . 'T' . $row['hora_fim'];
        }

        $eventos[] = [
            'id' => $row['id'],
            'title' => $row['servico'],
            'start' => $start,
            'end' => $end,
            'extendedProps' => [
                'tipo_cliente' => $row['tipo_cliente'],
                'servico' => $row['servico'],
                'observacoes' => $row['observacoes']
            ]
        ];
    }
}

echo json_encode($eventos);
$conn->close();
