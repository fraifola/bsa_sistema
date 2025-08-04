<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSA - Propostas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css' rel='stylesheet' />

    <style>
        .navbar {
            background-color: #7fc241;
        }
        .navbar-brand, .nav-link, .navbar-text {
            color: white !important;
        }
        .table thead th {
            background-color: #e9ecef;
        }
        .btn-primary {
            background-color: #7fc241;
            border: none;
        }
        .form-label {
            font-weight: bold;
        }
        /* 🌈 Cores personalizadas para o Financeiro */
        .financeiro-header {
            background-color: #7fc241; /* verde-claro */
            color: white;
        }
        .financeiro-select, .financeiro-select-verde {
            background-color: #ffffff !important;
            color: rgb(0, 0, 0) !important;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .financeiro-input {
            background-color: #ffffff;
            color: #000000;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        /* Estilos para a tabela de Contas Registradas */
        #listar-pagamentos-secao .table thead th {
            background-color: #e9ecef;
            text-align: left;
        }
        #listar-pagamentos-secao .table tbody td {
            text-align: left;
            padding: 8px 12px;
            max-width: 190px;
        }
        #listar-pagamentos-secao .table th:nth-child(4),
        #listar-pagamentos-secao .table td:nth-child(4),
        #listar-pagamentos-secao .table th:nth-child(10),
        #listar-pagamentos-secao .table td:nth-child(10),
        #listar-pagamentos-secao .table th:nth-child(11),
        #listar-pagamentos-secao .table td:nth-child(11),
        #listar-pagamentos-secao .table th:nth-child(13),
        #listar-pagamentos-secao .table td:nth-child(13) {
            text-align: right;
        }
        #listar-pagamentos-secao .table th:nth-child(3),
        #listar-pagamentos-secao .table td:nth-child(3),
        #listar-pagamentos-secao .table th:nth-child(5),
        #listar-pagamentos-secao .table td:nth-child(5),
        #listar-pagamentos-secao .table th:nth-child(12),
        #listar-pagamentos-secao .table td:nth-child(12) {
            text-align: center;
        }
        #listar-pagamentos-secao .table th,
        #listar-pagamentos-secao .table td {
            padding: 10px 12px;
            font-size: 11px;
            vertical-align: middle;
        }
        #listar-pagamentos-secao .table td:nth-child(7),
        #listar-pagamentos-secao .table td:nth-child(8) {
            white-space: normal;
            word-break: break-word;
            max-width: 190px;
        }
        #listar-pagamentos-secao .table td:nth-child(1),
        #listar-pagamentos-secao .table td:nth-child(6) {
            white-space: normal;
            word-break: break-word;
        }
        .descricao-expandida-row td {
            background-color: #f1f1f1;
            font-style: italic;
            padding: 10px;
        }
        #listar-pagamentos-secao .table tbody tr:nth-child(odd) {
            background-color: #f4f4f4;
        }
        .descricao-row td {
            background-color: #f1f1f1;
            font-style: italic;
            padding: 10px;
        }
        .clickable-row {
            cursor: pointer;
        }
        .linha-pagamento {
            cursor: pointer;
        }
        .descricao-extra td {
            font-style: italic;
            padding: 8px 12px;
        }

        /* Estilos específicos para o FullCalendar */
        #calendar {
            max-width: 900px; /* Ajuste conforme a largura desejada */
            margin: 40px auto;
            font-size: 14px; /* Ajuste o tamanho da fonte */
        }
        .fc-toolbar-chunk h2 {
            font-size: 1.5rem; /* Ajuste o tamanho do título do mês/semana */
        }
        .fc-button-group .fc-button {
            background-color: #7fc241;
            border-color: #7fc241;
            color: white;
        }
        .fc-button-group .fc-button:hover {
            background-color: #6da735;
            border-color: #6da735;
        }
        .fc-button-active {
            background-color: #5b8f2d !important;
            border-color: #5b8f2d !important;
        }
        .fc-daygrid-day-number {
            font-weight: bold;
        }
        .fc-event {
            background-color: #7fc241;
            border-color: #7fc241;
        }
        .modal-body .form-group {
            margin-bottom: 1rem;
        }
        /* Adicione no seu <style> ou arquivo CSS */
        #listar-pagamentos-secao {
            overflow-x: auto;
            max-width: 100%;
        }

        #tabelaContasPagar {
            white-space: nowrap;
            min-width: 100%;
        }

        #tabelaContasPagar th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
        }

        #tabelaContasPagar td {
            white-space: normal;
            word-break: break-word;
        }

        .text-end {
            text-align: right !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BSA</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2"><a class="nav-link" href="#" id="nav-operacional">Operacional</a></li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CRM</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Listar</a></li>
                            <li><a class="dropdown-item" href="#">Nova</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Clientes</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#clientes">Listar</a></li>
                            <li><a class="dropdown-item" href="#cadastro-cliente">Novo</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Serviços</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Lavagem de Tanque</a></li>
                            <li><a class="dropdown-item" href="#">Controle de Praga</a></li>
                            <li><a class="dropdown-item" href="#">Fumigação</a></li>
                            <li><a class="dropdown-item" href="#">Estoque</a></li>
                        </ul>
                    </li>
                                <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Financeiro</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Centro de Custo</a></li>
                    <li><a class="dropdown-item" href="#cadastro-conta-pagar">Contas</a></li>
                    <li><a class="dropdown-item" href="#listar-pagamentos-secao">Listar Pagamentos</a></li>
                    <li><a class="dropdown-item" href="#">Chave Pix</a></li>
                    <li><a class="dropdown-item" href="#">Forma de Pagamento</a></li>
                </ul>
            </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Relatórios</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Consultar OS</a></li>
                            <li><a class="dropdown-item" href="#">OS por tipo de Pagamento</a></li>
                            <li><a class="dropdown-item" href="#">Estatística</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Impressões</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Clientes</a></li>
                            <li><a class="dropdown-item" href="#">Serviços</a></li>
                            <li><a class="dropdown-item" href="#">Produtos</a></li>
                            <li><a class="dropdown-item" href="#">Pragas</a></li>
                            <li><a class="dropdown-item" href="#">Equipamentos</a></li>
                            <li><a class="dropdown-item" href="#">Estoque de Produtos</a></li>
                            <li><a class="dropdown-item" href="#">Histórico de Serviços do Cliente</a></li>
                            <li><a class="dropdown-item" href="#">Roteiro do técnico</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Arquivos</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Uploud de Documentos</a></li>
                            <li><a class="dropdown-item" href="#">Boleto/Nota Fiscal</a></li>
                            <li><a class="dropdown-item" href="#">Documentos de Funcionarios</a></li>
                            <li><a class="dropdown-item" href="#">Contrato de Prestação de Serviço</a></li>
                            <li><a class="dropdown-item" href="#">Arquivos de Produtos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Configurações</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Dados da Empresa</a></li>
                            <li><a class="dropdown-item" href="#">Usuário</a></li>
                            <li><a class="dropdown-item" href="#">Departamento</a></li>
                            <li><a class="dropdown-item" href="#">Assinatura do Técnico</a></li>
                            <li><a class="dropdown-item" href="#">Frota de Veículos</a></li>
                        </ul>
                </ul>
            </div>
        </div>
    </nav>

    <hr>
    <div id="listar-pagamentos-secao" style="display: none;">
    <h2>Lista de Contas a Pagar</h2>
    <table class="table table-striped table-bordered" id="tabelaContasPagar">
        <thead>
            <tr>
                <th>Data Emissão</th>
                <th>Fornecedor</th>
                <th>Documento NF</th>
                <th>Data Vencimento</th>
                <th>Subtotal</th> <th>Situação</th>
                <th>Tipo</th>
                <th>Conta Corrente</th>
                <th>Plano de Contas</th>
                <th>Descrição</th>
                <th>Repetição</th>
                <th>Juros/Multa</th>
                <th>Desconto</th>
                <th>Forma Pgto.</th>
                <th>Data Liquidação</th>
                <th>Total Pago</th>
            </tr>
        </thead>
        <tbody id="corpoTabelaContas">
            </tbody>
    </table>
</div>


    <div class="container mt-4" id="clientes" style="display: none;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Clientes</h4>
            <button id="btnNovoCliente" class="btn btn-primary">Novo Registro</button>
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

    </div>

    <div class="container mt-5" id="cadastro-cliente" style="display: none;">
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

    <div class="container mt-5" id="cadastro-conta-pagar" style="display: none;">
    <h4>Financeiro - Conta a Pagar</h4>
    <div class="card-body">
        <div class="mb-3 financeiro-header rounded p-2 fw-bold">Conta à Pagar</div>

        <form action="salvar_conta.php" method="POST">
            <div class="container-fluid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">

                <div class="form-group">
                    <label for="data_emissao">Data Emissão</label>
                    <input type="date" id="data_emissao" name="data_emissao" class="form-control financeiro-input" />
                </div>

                <div class="form-group">
                    <label for="documento_nf">Documento/NF</label>
                    <input type="text" id="documento_nf" name="documento_nf" placeholder="Documento/NF" class="form-control financeiro-input" />
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select id="tipo" class="form-select financeiro-select" name="tipo">
                        <option value="">Selecione o tipo</option>
                        <option value="Pagamento Funcionario">Pagamento Funcionario</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="conta_corrente">Conta Corrente</label>
                    <select id="conta_corrente" class="form-select financeiro-select" name="conta_corrente">
                        <option value="">Selecione a conta</option>
                        <option value="CAIXA INTERNO – C/C 0000">CAIXA INTERNO – C/C 0000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fornecedor">Fornecedor</label>
                    <select id="fornecedor" class="form-select financeiro-select" name="fornecedor">
                        <option value="">Selecione o fornecedor</option>
                        <option value="65 MATERIAS ELETRICOS">65 MATERIAS ELETRICOS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="funcionario">Funcionário</label>
                    <select id="funcionario" class="form-select financeiro-select" name="funcionario">
                        <option value="">Selecione o funcionário</option>
                        <option value="ADMINISTRADOR DA EMPRESA">ADMINISTRADOR DA EMPRESA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="data_vencimento">Data Vencimento</label>
                    <input type="date" id="data_vencimento" name="data_vencimento" class="form-control financeiro-input" />
                </div>

                <div class="form-group">
                    <label for="subtotal">Valor Previsto</label>
                    <input type="number" id="subtotal" name="subtotal" placeholder="subtotal" class="form-control financeiro-input" value="0.00" />
                </div>

                <div class="form-group">
                    <label for="plano_contas">Plano de Contas</label>
                    <select id="plano_contas" class="form-select financeiro-select" name="plano_contas">
                        <option value="">Selecione o plano</option>
                        <option value="DESPESAS COM FINANCEIRO">DESPESAS COM FINANCEIRO</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="subcategoria">SubCategoria (Despesa)</label>
                    <select id="subcategoria" class="form-select financeiro-select" name="subcategoria">
                        <option value="">Selecione a subcategoria</option>
                        <option value="5.5.8 - AGUA">5.5.8 - AGUA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="repeticao">Repetição Mensal</label>
                    <select id="repeticao" class="form-select financeiro-select" name="repeticao"> <option value="">Selecione</option>
                        <option value="1x">1x</option>
                        <option value="60x">60x</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="forma_pagamento">Forma Pagamento.</label>
                    <select id="forma_pagamento" class="form-select financeiro-select" name="forma_pagamento">
                        <option value="">Selecione</option>
                        <option value="BOLETO">BOLETO</option>
                        <option value="A_VISTA">À VISTA</option>
                        <option value="PARCELADO">PARCELADO</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="situacao">Situação Atual</label>
                    <select id="situacao" class="form-select financeiro-select" name="situacao">
                        <option value="">Selecione</option>
                        <option value="Liquidado">Liquidado</option>
                        <option value="Vencido">Vencido</option>
                        <option value="Cartorio">Cartório</option>
                        <option value="Protestado">Protestado</option>
                        <option value="Aviso_de_cobranca">Aviso de cobrança</option>
                    </select>
                </div>

                <div class="form-group" style="grid-column: span 3;">
                    <label for="descricao">Descrição Complementar</label>
                    <textarea id="descricao" name="descricao" placeholder="Descrição" class="form-control financeiro-input"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Rateio de Centro de Custos</label>
                <input type="text" class="form-control" placeholder="Sem rateios definidos" disabled class="financeiro-input">
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="form-label">Juros / Multa</label>
                    <input type="number" id="juros_multa" name="juros_multa" placeholder="Juros/Multa" class="financeiro-input" value="0.00">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Desconto</label>
                    <input type="number" id="desconto" name="desconto" placeholder="Desconto" class="financeiro-input" value="0.00">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Data Liquidação</label>
                    <input type="date" id="data_liquidacao" name="data_liquidacao" placeholder="Data de Liquidação" class="financeiro-input">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Total Pago</label>
                    <input type="number" id="total_pago" name="total_pago" placeholder="Total Pago" class="financeiro-input" value="0.00">
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" id="salvar-conta" class="btn btn-success">Salvar Conta</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
        </div>
</div>

    <div class="container mt-4" id="operacional" style="display: block;">
        <h4 class="mt-5">Agenda Operacional</h4>
        <div id='calendar'></div>
        <div class="mt-4">
            <h5>Agendar Nova Ordem de Serviço</h5>
            <form id="formOS">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tipo_cliente" class="form-label">Cliente</label>
                        <select id="tipo_cliente" name="cliente" class="form-select">
                            <option value="">Carregando clientes...</option>
                            </select>
                    </div>
                    <div class="col-md-6">
                        <label for="os_servico" class="form-label">Serviço</label>
                        <select id="os_servico" name="servico" class="form-select">
                            <option value="">Selecione o Serviço</option>
                            <option value="Higienização de Reservatórios">Higienização de Reservatórios</option>
                            <option value="Controle de Praga">Controle de Praga</option>
                            <option value="Fumigação">Fumigação</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="os_data_inicio" class="form-label">Data Início</label>
                        <input type="date" id="os_data_inicio" name="data_inicio" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="os_hora_inicio" class="form-label">Hora Início</label>
                        <input type="time" id="os_hora_inicio" name="hora_inicio" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="os_hora_fim" class="form-label">Hora Fim (Opcional)</label>
                        <input type="time" id="os_hora_fim" name="hora_fim" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="os_observacoes" class="form-label">Observações</label>
                    <textarea id="os_observacoes" name="observacoes" class="form-control" rows="3" placeholder="Detalhes da Ordem de Serviço"></textarea>
                </div>
                <button type="button" class="btn btn-primary" id="btnSalvarOS">Salvar OS</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editarOsModal" tabindex="-1" aria-labelledby="editarOsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarOsModalLabel">Editar Ordem de Serviço</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarOS">
                        <input type="hidden" id="edit_os_id" name="id">
                        <div class="mb-3">
                            <label for="edit_tipo_cliente" class="form-label">Cliente</label>
                            <select id="tipo_cliente" name="cliente" class="form-select">
                            <option value="">Carregando clientes...</option>
                            </select>
                            </div>
                        <div class="mb-3">
                            <label for="edit_os_servico" class="form-label">Serviço</label>
                            <input type="text" id="edit_os_servico" name="servico" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_os_data_inicio" class="form-label">Data Início</label>
                            <input type="date" id="edit_os_data_inicio" name="data_inicio" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edit_os_hora_inicio" class="form-label">Hora Início</label>
                            <input type="time" id="edit_os_hora_inicio" name="hora_inicio" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edit_os_hora_fim" class="form-label">Hora Fim (Opcional)</label>
                            <input type="time" id="edit_os_hora_fim" name="hora_fim" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edit_os_observacoes" class="form-label">Observações</label>
                            <textarea id="edit_os_observacoes" name="observacoes" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" id="btnAtualizarOS">Atualizar OS</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center mt-4 mb-2 text-muted">
        Copyright © 2025 bsa.com.br
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/locales/pt-br.js'></script>
<script>
    var calendar;
    var editarOsModal;

    document.addEventListener('DOMContentLoaded', function () {
        // Elementos das seções
        const navOperacional = document.getElementById('nav-operacional');
        const operacionalSection = document.getElementById('operacional');
        const clientesSection = document.getElementById('clientes');
        const cadastroClienteSection = document.getElementById('cadastro-cliente');
        const cadastroContaPagarSection = document.getElementById('cadastro-conta-pagar');
        const listarPagamentosSecao = document.getElementById('listar-pagamentos-secao');

        // Inicializar calendário e modal
        var calendarEl = document.getElementById('calendar');
        editarOsModal = new bootstrap.Modal(document.getElementById('editarOsModal'));
        
        // Mostrar apenas a seção operacional inicialmente
        hideAllSections();
        operacionalSection.style.display = 'block';
        
        // Inicializar calendário
        initializeCalendar();

        // ============ NAVEGAÇÃO ENTRE SEÇÕES ============
        navOperacional.addEventListener('click', function(e) {
            e.preventDefault();
            hideAllSections();
            operacionalSection.style.display = 'block';
        });

        // Listener para o dropdown de Clientes
        document.querySelectorAll('.dropdown-item[href="#clientes"]').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                hideAllSections();
                clientesSection.style.display = 'block';
                carregarClientesDropdown();
            });
        });

        // Listener para o dropdown de Cadastro de Cliente
        document.querySelectorAll('.dropdown-item[href="#cadastro-cliente"]').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                hideAllSections();
                cadastroClienteSection.style.display = 'block';
            });
        });

        // Listener para o dropdown de Contas a Pagar
        document.querySelectorAll('.dropdown-item[href="#cadastro-conta-pagar"]').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                hideAllSections();
                cadastroContaPagarSection.style.display = 'block';
            });
        });

        // Listener para o dropdown de Listar Pagamentos
        document.querySelectorAll('.dropdown-item[href="#listar-pagamentos-secao"]').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                hideAllSections();
                listarPagamentosSecao.style.display = 'block';
                carregarContas();
            });
        });

        // ============ FUNÇÕES AUXILIARES ============
        function hideAllSections() {
            operacionalSection.style.display = 'none';
            clientesSection.style.display = 'none';
            cadastroClienteSection.style.display = 'none';
            cadastroContaPagarSection.style.display = 'none';
            listarPagamentosSecao.style.display = 'none';
        }

        function initializeCalendar() {
            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: 'listar_os_calendario.php',
                editable: true,
                eventStartEditable: true,
                eventDurationEditable: true,
                eventDrop: function(info) {
                    updateEventOnServer(info.event);
                },
                eventResize: function(info) {
                    updateEventOnServer(info.event);
                },
                eventClick: function(info) {
                    showEditModal(info.event);
                }
            });
            calendar.render();
        }

        function updateEventOnServer(event) {
            const newStart = event.start.toISOString().slice(0, 19).replace('T', ' ');
            let newEnd = event.end ? event.end.toISOString().slice(0, 19).replace('T', ' ') : null;
            
            const formData = new FormData();
            formData.append('id', event.id);
            formData.append('data_inicio', newStart.split(' ')[0]);
            formData.append('hora_inicio', newStart.split(' ')[1].substring(0, 5));
            formData.append('hora_fim', newEnd ? newEnd.split(' ')[1].substring(0, 5) : '');
            
            fetch('atualizar_os.php', {
                method: 'POST',
                body: formData
            })
            .then(handleResponse)
            .catch(handleError);
        }

        function showEditModal(event) {
            document.getElementById('edit_os_id').value = event.id;
            document.getElementById('edit_tipo_cliente').value = event.extendedProps.cliente_nome || '';
            document.getElementById('edit_os_servico').value = event.extendedProps.servico || '';
            document.getElementById('edit_os_data_inicio').value = event.start.toISOString().split('T')[0];
            document.getElementById('edit_os_hora_inicio').value = formatTimeForInput(event.start);
            document.getElementById('edit_os_hora_fim').value = formatTimeForInput(event.end);
            document.getElementById('edit_os_observacoes').value = event.extendedProps.description || '';
            
            editarOsModal.show();
        }

        function formatTimeForInput(date) {
            if (!date) return '';
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            return `${hours}:${minutes}`;
        }

        // ============ FUNÇÕES DE CARREGAMENTO DE DADOS ============
        function carregarClientesDropdown() {
            fetch('get_clientes.php')
                .then(response => response.json())
                .then(clientes => {
                    const selects = document.querySelectorAll('#tipo_cliente, #edit_tipo_cliente');
                    
                    selects.forEach(select => {
                        select.innerHTML = '<option value="">Selecione o Cliente</option>';
                        if (clientes.length > 0) {
                            clientes.forEach(cliente => {
                                const option = document.createElement('option');
                                option.value = cliente.id;
                                option.textContent = cliente.nome;
                                select.appendChild(option);
                            });
                        }
                    });
                })
                .catch(handleError);
        }

        function carregarContas() {
    fetch('listar_contas.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na rede');
            }
            return response.json();
        })
        .then(data => {
            if (!data.success) {
                throw new Error(data.error || 'Erro no servidor');
            }
            
            const tabela = document.getElementById('corpoTabelaContas');
            tabela.innerHTML = '';
            
            data.data.forEach(conta => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${formatarData(conta.data_emissao)}</td>
                    <td>${conta.fornecedor || ''}</td>
                    <td>${conta.documento_nf || ''}</td>
                    <td>${formatarData(conta.data_vencimento)}</td>
                    <td class="text-end">R$ ${formatarMoeda(conta.subtotal)}</td>
                    <td>${conta.situacao || ''}</td>
                    <td>${conta.tipo || ''}</td>
                    <td>${conta.conta_corrente || ''}</td>
                    <td>${conta.plano_contas || ''}</td>
                    <td>${conta.descricao || ''}</td>
                    <td>${conta.repeticao || ''}</td>
                    <td class="text-end">R$ ${formatarMoeda(conta.juros_multa)}</td>
                    <td class="text-end">R$ ${formatarMoeda(conta.desconto)}</td>
                    <td>${conta.forma_pagamento || ''}</td>
                    <td>${formatarData(conta.data_liquidacao)}</td>
                    <td class="text-end">R$ ${formatarMoeda(conta.total_pago)}</td>
                `;
                tabela.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Falha ao carregar contas: ' + error.message);
        });
}

// Funções auxiliares para formatação
function formatarData(data) {
    if (!data) return '';
    const date = new Date(data);
    return date.toLocaleDateString('pt-BR');
}

function formatarMoeda(valor) {
    return parseFloat(valor || 0).toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

        // ============ HANDLERS GENÉRICOS ============
        function handleResponse(response) {
            if (!response.ok) {
                return response.text().then(text => { throw new Error(text) });
            }
            return response.json();
        }

        function handleError(error) {
            console.error('Erro:', error);
            alert('Ocorreu um erro: ' + error.message);
        }

        // ============ INICIALIZAÇÕES ============
        carregarClientesDropdown();
    });
</script>
</body>
</html>