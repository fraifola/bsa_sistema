<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSA - Propostas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php include("menu.php"); ?>

    <form method="post">
        <h3 class="bg-success text-white p-2 rounded text-center">
  Controle de pragas
</h3>

      <!-- Dados do Cliente -->
      <h5 class="bg-success text-white p-2 rounded text-center">Dados do Cliente</h5>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Código</label>
          <input type="text" class="form-control" name="codigo">
        </div>
        <div class="col-md-3">
          <label class="form-label">Ticket Nº</label>
          <input type="text" class="form-control" name="ticket">
        </div>
        <div class="col-md-6">
          <label class="form-label">Cliente</label>
          <input type="text" class="form-control" name="cliente">
        </div>
        <div class="col-md-6">
          <label class="form-label">Endereço</label>
          <input type="text" class="form-control" name="endereco">
        </div>
        <div class="col-md-6">
          <label class="form-label">Telefone</label>
          <input type="text" class="form-control" name="telefone">
        </div>
      </div>

      <!-- Serviços Executados -->
      <h5 class="bg-success text-white p-2 rounded text-center">Serviços Executados</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Serviço</label>
          <input type="text" class="form-control" name="servico">
        </div>
        <div class="col-md-6">
          <label class="form-label">Contrato</label>
          <input type="text" class="form-control" name="contrato">
        </div>
      </div>

      <!-- Pragas Combatidas -->
      <h5 class="bg-success text-white p-2 rounded text-center">Pragas Combatidas</h5>
      <input type="text" class="form-control" name="pragas">

      <!-- Detalhamento dos Serviços -->
      <h5 class="bg-success text-white p-2 rounded text-center">Detalhamento dos Serviços</h5>
      <textarea class="form-control" rows="4" name="detalhes"></textarea>

      <!-- Produtos Utilizados -->
      <h5 class="bg-success text-white p-2 rounded text-center">Produtos Utilizados</h5>
      <table class="table table-bordered">
        <thead class="table-secondary">
          <tr>
            <th>Produto</th>
            <th>Princípio Ativo</th>
            <th>Concentração</th>
            <th>Volume Recomendado</th>
            <th>Praga</th>
            <th>Equipamento</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="form-control" name="produto[]"></td>
            <td><input type="text" class="form-control" name="principio[]"></td>
            <td><input type="text" class="form-control" name="concentracao[]"></td>
            <td><input type="text" class="form-control" name="volume[]"></td>
            <td><input type="text" class="form-control" name="praga[]"></td>
            <td><input type="text" class="form-control" name="equipamento[]"></td>
          </tr>
        </tbody>
      </table>

      <!-- Executores -->
      <h5 class="bg-success text-white p-2 rounded text-center">Executores</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Técnico</label>
          <input type="text" class="form-control" name="tecnico">
        </div>
        <div class="col-md-6">
          <label class="form-label">Auxiliares</label>
          <input type="text" class="form-control" name="auxiliares">
        </div>
      </div>

      <!-- Botão -->
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary px-5">Salvar Ordem de Serviço</button>
      </div>
    </form>
  </div>
</body>
</html>