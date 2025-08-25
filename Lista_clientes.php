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
<div class="container mt-4" id="clientes">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Clientes</h4>
            <a id="btnNovoCliente" class="btn btn-primary" href="clientes.php">Novo Registro</a>
        </div>
        <table class="table table-striped">
                <thead>
                    <tr>
                    <th>Razão Social</th>
                    <th>Tipo</th>
                    <th>CPF/CNPJ</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Cidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            // Temporarily add error reporting for debugging
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            // This will execute the code from listar_clientes.php right here
            include 'listar_clientes.php';
            ?>
                </tbody>
                </table>
    </body>
</html>