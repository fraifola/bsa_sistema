<?php
$conn = new mysqli("localhost", "root", "", "bsa_clientes");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM clientes");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['razao_social']) . "</td>
                <td>" . htmlspecialchars($row['tipo_cliente']) . "</td>
                <td>" . htmlspecialchars($row['cpf_cnpj']) . "</td>
                <td>" . htmlspecialchars($row['telefone']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['cidade']) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nenhum cliente encontrado.</td></tr>";
}

$conn->close();
?>
