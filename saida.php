<?php
$conn = new mysqli("localhost", "root", "", "bsa");

// Se enviou o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto_id = $_POST['produto_id'];
    $quantidade_usada = $_POST['quantidade_usada'];

    // Pega a quantidade atual
    $sql = "SELECT quantidade FROM estoque WHERE id = $produto_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $quantidade_atual = $row['quantidade'];

    // Calcula nova quantidade
    $nova_quantidade = $quantidade_atual - $quantidade_usada;

    if ($nova_quantidade < 0) {
        echo "<p style='color:red'>❌ Não há estoque suficiente!</p>";
    } else {
        // Atualiza no banco
        $sql_update = "UPDATE estoque SET quantidade = $nova_quantidade WHERE id = $produto_id";
        $conn->query($sql_update);

        echo "<p style='color:green'>✅ Saída registrada! Estoque atualizado.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Saída de Estoque</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h3>Registrar Saída de Estoque</h3>
<form method="POST">
  <label>Produto:</label>
  <select name="produto_id" class="form-select" required>
    <?php
    $result = $conn->query("SELECT id, produto_utilizado, quantidade, unidade_medida FROM estoque");
    while($row = $result->fetch_assoc()) {
        echo "<option value='{$row['id']}'>
                {$row['produto_utilizado']} - {$row['quantidade']} {$row['unidade_medida']}
              </option>";
    }
    ?>
  </select>

  <label class="mt-3">Quantidade utilizada:</label>
  <input type="number" name="quantidade_usada" class="form-control" required>

  <button type="submit" class="btn btn-danger mt-3">Registrar Saída</button>
</form>

</body>
</html>
