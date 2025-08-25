<?php
// Conexão com banco
$conn = new mysqli("localhost", "root", "", "bsa");


// Se enviou formulário, salva no banco
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['produto_utilizado'];
    $principio = $_POST['principio_ativo'];
    $quantidade = $_POST['quantidade'];
    $unidade = $_POST['unidade_medida'];
    $registro = $_POST['registro_ms'];
    $concentracao = $_POST['concentracao'];

    $sql = "INSERT INTO estoque 
            (produto_utilizado, principio_ativo, quantidade, unidade_medida, registro_ms, concentracao) 
            VALUES ('$produto', '$principio', '$quantidade', '$unidade', '$registro', '$concentracao')";
    $conn->query($sql);
}

// Pega lista de produtos
$result = $conn->query("SELECT * FROM estoque");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Controle de Estoque</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php include("menu.php"); ?>

  <div id="estoque">
    <h3 class="bg-success text-white p-2 rounded text-center">
  Cadastro de Produtos no Estoque
</h3>

    <form method="POST" class="row g-3">
  <div class="col-md-4">
    <label class="form-label">Produto Utilizado</label>
    <input type="text" class="form-control" name="produto_utilizado" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Princípio Ativo</label>
    <input type="text" class="form-control" name="principio_ativo" required>
  </div>

  <div class="col-md-2">
    <label class="form-label">Quantidade</label>
    <input type="number" class="form-control" name="quantidade" required>
  </div>

  <div class="col-md-2">
    <label class="form-label">Unidade de Medida</label>
    <select name="unidade_medida" class="form-select" required>
      <option value="ml">ml</option>
      <option value="L">L</option>
      <option value="mg">mg</option>
      <option value="g">g</option>
      <option value="Kg">Kg</option>
    </select>
  </div>

  <div class="col-md-4">
    <label class="form-label">Registro Min. Saúde</label>
    <input type="text" class="form-control" name="registro_ms" required>
  </div>

  <div class="col-md-2">
    <label class="form-label">Concentração (%)</label>
    <input type="number" step="0.01" class="form-control" name="concentracao" required>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-success">Cadastrar Produto</button>
  </div>
</form>

  <h3 class="bg-success text-white p-2 rounded text-center">
    Estoque Atual
  </h3>
    <table class="table table-striped">
    <tr>
      <th>ID</th>
      <th>Produto</th>
      <th>Princípio Ativo</th>
      <th>Quantidade</th>
      <th>Unidade</th>
      <th>Reg. Min. Saúde</th>
      <th>Concentração (%)</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['produto_utilizado'] ?></td>
      <td><?= $row['principio_ativo'] ?></td>
      <td><?= $row['quantidade'] ?></td>
      <td><?= $row['unidade_medida'] ?></td>
      <td><?= $row['registro_ms'] ?></td>
      <td><?= $row['concentracao'] ?>%</td>
    </tr>
    <?php endwhile; ?>
  </table>

</body>
</html>
