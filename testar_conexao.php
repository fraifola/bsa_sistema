<?php
require 'conexao2.php';

echo "<h1>Conexão com o banco de dados bem-sucedida!</h1>";
echo "<p>Isso significa que o arquivo 'conexao.php' está correto e o MySQL está funcionando.</p>";
echo "<hr>";

$sql = "SELECT id, razao_social, email, created_at FROM clientes LIMIT 5";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "<h2>Dados da tabela 'clientes':</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Razão Social</th><th>Email</th><th>Data de Criação</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["razao_social"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>A tabela 'clientes' está vazia.</p>";
    }
} else {
    echo "<h2>Erro ao buscar dados na tabela 'clientes':</h2>";
    echo "<p>Erro: " . htmlspecialchars($conn->error) . "</p>";
    echo "<p>Isso pode indicar que a tabela 'clientes' não foi criada corretamente ou que há algum problema de permissão.</p>";
}

$conn->close();

?>
