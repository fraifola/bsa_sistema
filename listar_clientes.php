<?php
$conn = new mysqli("localhost", "root", "", "bsa_clientes");
if ($conn->connect_error) {
    die("<tr><td colspan='6'>Erro de conexão: ".$conn->connect_error."</td></tr>");
}

$sql = "SELECT razao_social, tipo_cliente, cpf_cnpj, telefone, email, cidade
        FROM clientes ORDER BY razao_social";

if ($result = $conn->query($sql)) {
    if ($result->num_rows) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".htmlspecialchars($row['razao_social'])."</td>
                    <td>".htmlspecialchars($row['tipo_cliente'])."</td>
                    <td>".htmlspecialchars($row['cpf_cnpj'])."</td>
                    <td>".htmlspecialchars($row['telefone'])."</td>
                    <td>".htmlspecialchars($row['email'])."</td>
                    <td>".htmlspecialchars($row['cidade'])."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Nenhum cliente encontrado.</td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>Falha na consulta: ".$conn->error."</td></tr>";
}
$conn->close();
?>
