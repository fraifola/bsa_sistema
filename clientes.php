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
    </div>

    <div class="container mt-5" id="cadastro-cliente">
        <h4>Cadastro de Cliente</h4>
        <form method="POST" action="salvar_cliente.php">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">Tipo Cliente</label>
                    <select name="tipo_cliente" class="form-control">
                        <option value="fisico">Físico</option>
                        <option value="juridico">Jurídico</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">CPF/CNPJ</label>
                    <input type="text" name="cpf_cnpj" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Razão Social</label>
                    <input type="text" name="razao_social" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Contato Responsável</label>
                    <input type="text" name="contato_responsavel" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">Data de Aniversário</label>
                    <input type="date" name="data_aniversario" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">CEP</label>
                    <input type="text" name="cep" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Número</label>
                    <input type="text" name="numero" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">Complemento</label>
                    <input type="text" name="complemento" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Bairro</label>
                    <input type="text" name="bairro" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Cidade</label>
                    <input type="text" name="cidade" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">UF</label>
                    <input type="text" name="uf" class="form-control">
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Exibir CPF/CNPJ na C.E.S Simples</label>
                <select name="exibir_ces" class="form-control">
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" id="btnCancelar">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>