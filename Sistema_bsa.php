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
        /* Espaçamento geral do corpo do site */

/* Container principal - ajuste conforme necessário */
.container, .container-fluid {
    padding-left: 15px;
    padding-right: 15px;
}

/* Ajuste específico para as seções */ 
#clientes, 
#cadastro-cliente, 
#cadastro-conta-pagar, 
#listar-pagamentos-secao,
#lavagem-tanque-form {
    padding: 20px;
    margin: 10px 0;
    background-color: #fff; /* Fundo branco para destacar */
    border-radius: 8px; /* Cantos arredondados */
    box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Sombra leve */
}

/* Ajuste para o calendário */
#calendar {
    margin: 20px 0;
    padding: 15px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Ajuste para formulários */
.card {
    margin-bottom: 20px;
    border: 1px solid #dee2e6;
}

/* Ajuste para tabelas */
.table {
    margin: 15px 0;
}

/* Ajuste para os menus */
.navbar {
    padding-left: 15px;
    padding-right: 15px;
}

/* Ajuste responsivo para mobile */
@media (max-width: 768px) {
    body {
        padding-left: 10px;
        padding-right: 10px;
    }
    
    #operacional, 
    #clientes, 
    #cadastro-cliente, 
    #cadastro-conta-pagar, 
    #listar-pagamentos-secao,
    #lavagem-tanque-form {
        padding: 15px;
    }
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
                    <li><a class="dropdown-item" href="#lavagem-tanque" id="lavagem-tanque-link">Lavagem de Tanque</a></li>
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
    <div id="lavagem-tanque-form" style="display: none;">
    <h4>Formulário de Lavagem de Tanque</h4>
    <form id="formLavagemTanque">
        <!-- Seção de Dados do Cliente (preenchida automaticamente) -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Dados do Cliente
            </div>
            <div class="card-body">
               <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Cliente *</label>
                        <select id="cliente-lavagem" class="form-select" required>
                            <option value="">Carregando clientes...</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Fantasia</label>
                        <input type="text" id="fantasia-lavagem" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Endereço</label>
                        <input type="text" id="endereco-lavagem" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" id="telefone-lavagem" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Ponto de Referência</label>
                        <input type="text" id="ponto-referencia-lavagem" name="ponto_referencia" class="form-control" placeholder="Ex: Próximo ao mercado X">
                    </div>
                </div>
                <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Contato</label>
                    <input type="text" id="contato-lavagem" class="form-control" readonly>
                </div>
                </div>
                </div>
                    <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Atividade do Imóvel *</label>
                            <select id="atividade-imovel-lavagem" name="atividade_imovel" class="form-select" required>
                                <option value="">Selecione...</option>
                                <option value="comercial">Comercial</option>
                                <option value="residencial">Residencial</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="col-md-3">
                    <div class="mb-3">
                    <label class="form-label">CEP</label>
                    <input type="text" id="cep-lavagem" class="form-control" readonly>
                    </div>
                </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Vendedor</label>
                            <input type="text" id="vendedor-lavagem" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Setor</label>
                            <input type="text" id="setor-lavagem" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Seção de Dados do Reservatório -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Dados do Reservatório
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Reserv.</label>
                            <input type="text" id="reservatorio-lavagem" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Volume (L)</label>
                            <input type="number" id="volume-lavagem" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Profund. (m)</label>
                            <input type="number" id="profundidade-lavagem" class="form-control" step="0.01">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Diâm. (m)</label>
                            <input type="number" id="diametro-lavagem" class="form-control" step="0.01">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Material</label>
                            <select id="material-lavagem" class="form-select">
                                <option value="">Selecione</option>
                                <option value="Fibrocimento">Fibrocimento</option>
                                <option value="Metal">Metal</option>
                                <option value="Plástico">Plástico</option>
                                <option value="Concreto">Concreto</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Cobertura</label>
                            <select id="cobertura-lavagem" class="form-select">
                                <option value="">Selecione</option>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                                <option value="Parcial">Parcial</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Detritos Presentes</label>
                            <input type="text" id="detritos-lavagem" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Vetores Encontrados</label>
                            <input type="text" id="vetores-lavagem" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Rachaduras</label>
                            <select id="rachaduras-lavagem" class="form-select">
                                <option value="">Selecione</option>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Vetores Encontrados no Reservatório</label>
                    <textarea id="vetores-reservatorio-lavagem" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        <!-- Seção de Observações -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Observações
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Observações do Superior</label>
                    <textarea id="obs-superior-lavagem" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Observações do Cliente</label>
                    <textarea id="obs-cliente-lavagem" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Informações Gerais</label>
                    <textarea id="info-gerais-lavagem" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        <!-- Seção de Execução do Serviço -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Execução do Serviço
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Executores</label>
                            <input type="text" id="executores-lavagem" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Produto Utilizado</label>
                            <input type="text" id="produto-lavagem" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Princípio Ativo</label>
                            <input type="text" id="principio-ativo-lavagem" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Quantidade</label>
                            <input type="number" id="quantidade-lavagem" class="form-control" step="0.01">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Unidade de Medida</label>
                            <select id="unidade-medida-lavagem" class="form-select">
                                <option value="L">Litros (L)</option>
                                <option value="mL">Mililitros (mL)</option>
                                <option value="kg">Quilogramas (kg)</option>
                                <option value="g">Gramas (g)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Reg. Min. Saúde</label>
                            <input type="text" id="reg-min-saude-lavagem" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Concentração (%)</label>
                            <input type="number" id="concentracao-lavagem" class="form-control" step="0.01">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-success">Salvar Lavagem</button>
            <button type="reset" class="btn btn-secondary">Limpar Formulário</button>
        </div>
    </form>
</div>
    <footer class="text-center mt-4 mb-2 text-muted">
        Copyright © 2025 bsa.com.br
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/locales/pt-br.js'></script>
<script>
    // Variáveis globais
    var calendar;
    var editarOsModal;
    var sections

    document.addEventListener('DOMContentLoaded', function () {
        // Inicializa as seções
        sections = {
            operacional: document.getElementById('operacional'),
            clientes: document.getElementById('clientes'),
            cadastroCliente: document.getElementById('cadastro-cliente'),
            cadastroContaPagar: document.getElementById('cadastro-conta-pagar'),
            listarPagamentos: document.getElementById('listar-pagamentos-secao'),
            lavagemTanque: document.getElementById('lavagem-tanque-form')
        };
        // Inicializar calendário e modal
        initializeCalendar();
        initializeModals()
        
        // Mostrar apenas a seção operacional inicialmente
        // Mostrar apenas a seção operacional inicialmente
        hideAllSections();
        sections.operacional.style.display = 'block';
        
        // Configurar navegação
        setupNavigation();
        
        // Carregar dados iniciais
        carregarClientesDropdown();
    });

    // ============ FUNÇÕES PRINCIPAIS ============

    function hideAllSections() {
        if (!sections) return; // Verificação de segurança
        
        Object.values(sections).forEach(section => {
            if (section) section.style.display = 'none';
        });
    }

    function initializeCalendar() {
        const calendarEl = document.getElementById('calendar');
        if (!calendarEl) return;

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
            eventDrop: updateEventOnServer,
            eventResize: updateEventOnServer,
            eventClick: showEditModal
        });
        calendar.render();
    }
    function initializeModals() {
        const modalElement = document.getElementById('editarOsModal');
        if (modalElement) {
            editarOsModal = new bootstrap.Modal(modalElement);
        }
    }

    // ============ NAVEGAÇÃO ============
    function setupNavigation() {
        // Navegação principal
        document.getElementById('nav-operacional')?.addEventListener('click', (e) => {
            e.preventDefault();
            hideAllSections();
            sections.operacional.style.display = 'block';
        });

        // Configurar listeners para dropdowns
        setupDropdownNavigation('#clientes', sections.clientes, carregarClientesDropdown);
        setupDropdownNavigation('#cadastro-cliente', sections.cadastroCliente);
        setupDropdownNavigation('#cadastro-conta-pagar', sections.cadastroContaPagar);
        setupDropdownNavigation('#listar-pagamentos-secao', sections.listarPagamentos, carregarContas);
        setupDropdownNavigation('#lavagem-tanque', sections.lavagemTanque, initializeLavagemTanque);
    }

    function setupDropdownNavigation(selector, section, callback = null) {
        document.querySelectorAll(`.dropdown-item[href="${selector}"]`).forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                hideAllSections();
                section.style.display = 'block';
                if (callback && typeof callback === 'function') {
                    callback();
                }
            });
        });
    }

    // ============ FUNÇÕES AUXILIARES ============
    function hideAllSections() {
        Object.values(sections).forEach(section => {
            if (section) section.style.display = 'none';
        });
    }

    function formatTimeForInput(date) {
        if (!date) return '';
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${hours}:${minutes}`;
    }

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

    // ============ FUNÇÕES DE CARREGAMENTO DE DADOS ============
    function carregarClientesDropdown() {
        fetch('get_clientes.php')
            .then(handleResponse)
            .then(clientes => {
                const selects = document.querySelectorAll('#tipo_cliente, #edit_tipo_cliente');
                
                selects.forEach(select => {
                    if (!select) return;
                    
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
            .then(handleResponse)
            .then(data => {
                if (!data.success) {
                    throw new Error(data.error || 'Erro no servidor');
                }
                
                const tabela = document.getElementById('corpoTabelaContas');
                if (!tabela) return;
                
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
            .catch(handleError);
    }

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

    // ============ FUNÇÕES DO CALENDÁRIO ============
    function updateEventOnServer(info) {
        const event = info.event;
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
        .then(data => {
            if (!data.success) {
                calendar.refetchEvents();
                throw new Error(data.message);
            }
        })
        .catch(handleError);
    }

    function showEditModal(info) {
        const event = info.event;
        
        document.getElementById('edit_os_id').value = event.id;
        document.getElementById('edit_tipo_cliente').value = event.extendedProps.cliente_nome || '';
        document.getElementById('edit_os_servico').value = event.extendedProps.servico || '';
        document.getElementById('edit_os_data_inicio').value = event.start.toISOString().split('T')[0];
        document.getElementById('edit_os_hora_inicio').value = formatTimeForInput(event.start);
        document.getElementById('edit_os_hora_fim').value = formatTimeForInput(event.end);
        document.getElementById('edit_os_observacoes').value = event.extendedProps.description || '';
        
        if (editarOsModal) {
            editarOsModal.show();
        }
    }

// ============ FORMULÁRIO DE LAVAGEM DE TANQUE ============
document.addEventListener('DOMContentLoaded', function() {
    initializeLavagemTanque();
});

function initializeLavagemTanque() {
    carregarClientesParaLavagem();
    
    // Configura eventos
    document.getElementById('cliente-lavagem')?.addEventListener('change', function() {
        const clienteId = this.value;
        if (clienteId) {
            carregarDadosCliente(clienteId);
        } else {
            limparDadosCliente();
        }
    });
    
    document.getElementById('formLavagemTanque')?.addEventListener('submit', function(e) {
        e.preventDefault();
        if (validarFormularioLavagem()) {
            const dados = coletarDadosLavagem();
            console.log('Dados para envio:', dados);
            enviarDadosLavagem(dados);
        }
    });
}

// Carrega clientes (todos ou apenas operacionais conforme necessidade)
// ============ FUNÇÕES ORIGINAIS MANTIDAS ============

function carregarClientesParaLavagem() {
    fetch('get_clientes.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(result => {
            if (!result.success) {
                throw new Error(result.error || 'Erro desconhecido ao carregar clientes');
            }

            const select = document.getElementById('cliente-lavagem');
            select.innerHTML = '<option value="">Selecione o cliente...</option>';
            
            // Garante que estamos trabalhando com um array
            const clientes = Array.isArray(result.data) ? result.data : [];
            
            clientes.forEach(cliente => {
                const option = document.createElement('option');
                option.value = cliente.id;
                // Usa fantasia se existir, caso contrário usa razão social
                option.textContent = cliente.fantasia || cliente.razao_social;
                select.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Erro ao carregar clientes:', error);
            alert('Erro ao carregar clientes: ' + error.message);
        });
}

function carregarDadosCliente(clienteId) {
    fetch('get_clientes.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(result => {
            if (!result.success) {
                throw new Error(result.error || 'Erro ao buscar dados do cliente');
            }

            // Garante que estamos trabalhando com um array
            const clientes = Array.isArray(result.data) ? result.data : [];
            const cliente = clientes.find(c => c.id == clienteId);
            
            if (!cliente) {
                throw new Error('Cliente não encontrado');
            }

            // Preenche os campos do formulário
            document.getElementById('fantasia-lavagem').value = cliente.fantasia || cliente.razao_social;
            
            if (cliente.endereco_completo) {
                document.getElementById('endereco-lavagem').value = cliente.endereco_completo;
            } else {
                document.getElementById('endereco-lavagem').value = cliente.endereco || '';
            }
            
            document.getElementById('telefone-lavagem').value = cliente.telefone || '';
            document.getElementById('contato-lavagem').value = cliente.contato_responsavel || '';
            document.getElementById('cep-lavagem').value = cliente.cep || '';
        })
        .catch(error => {
            console.error('Erro ao carregar dados do cliente:', error);
            alert('Erro ao carregar dados do cliente: ' + error.message);
        });
}

function limparDadosCliente() {
    const campos = [
        'fantasia-lavagem',
        'endereco-lavagem',
        'telefone-lavagem',
        'contato-lavagem',
        'cep-lavagem'
    ];
    
    campos.forEach(id => {
        document.getElementById(id).value = '';
    });
}

function validarFormularioLavagem() {
    const camposObrigatorios = [
        { id: 'cliente-lavagem', mensagem: 'Selecione um cliente' },
        { id: 'atividade-imovel-lavagem', mensagem: 'Informe o tipo de atividade do imóvel' },
        { id: 'volume-lavagem', mensagem: 'Informe o volume do reservatório' }
    ];
    
    for (const campo of camposObrigatorios) {
        const elemento = document.getElementById(campo.id);
        if (!elemento || !elemento.value.trim()) {
            alert(campo.mensagem);
            elemento?.focus();
            return false;
        }
    }
    
    return true;
}

function coletarDadosLavagem() {
    // Dados básicos
    const dados = {
        cliente_id: document.getElementById('cliente-lavagem').value,
        atividade_imovel: document.getElementById('atividade-imovel-lavagem').value,
        ponto_referencia: document.getElementById('ponto-referencia-lavagem').value,
        
        // Dados do cliente
        cliente_data: {
            nome: document.getElementById('fantasia-lavagem').value,
            endereco: document.getElementById('endereco-lavagem').value,
            telefone: document.getElementById('telefone-lavagem').value,
            contato: document.getElementById('contato-lavagem').value,
            cep: document.getElementById('cep-lavagem').value
        },
        
        // Dados do reservatório
        reservatorio: {
            volume: document.getElementById('volume-lavagem').value,
            profundidade: document.getElementById('profundidade-lavagem').value,
            diametro: document.getElementById('diametro-lavagem').value,
            material: document.getElementById('material-lavagem').value,
            cobertura: document.getElementById('cobertura-lavagem').value,
            detritos: document.getElementById('detritos-lavagem').value,
            vetores: document.getElementById('vetores-lavagem').checked,
            rachaduras: document.getElementById('rachaduras-lavagem').checked,
            vetores_reservatorio: document.getElementById('vetores-reservatorio-lavagem').checked
        },
        
        // Observações
        observacoes: {
            superior: document.getElementById('obs-superior-lavagem').value,
            cliente: document.getElementById('obs-cliente-lavagem').value,
            gerais: document.getElementById('info-gerais-lavagem').value
        },
        
        // Execução
        execucao: {
            executores: document.getElementById('executores-lavagem').value,
            produto: document.getElementById('produto-lavagem').value,
            principio_ativo: document.getElementById('principio-ativo-lavagem').value,
            quantidade: document.getElementById('quantidade-lavagem').value,
            unidade_medida: document.getElementById('unidade-medida-lavagem').value,
            concentracao: document.getElementById('concentracao-lavagem').value
        }
    };
    
    return dados;
}

function enviarDadosLavagem(dados) {
    // Implemente aqui o envio dos dados para o servidor
    console.log('Enviando dados:', dados);
    // Exemplo:
    // fetch('salvar_lavagem.php', {
    //     method: 'POST',
    //     headers: { 'Content-Type': 'application/json' },
    //     body: JSON.stringify(dados)
    // })
    // .then(...)
    
    alert('Formulário validado e pronto para envio! Verifique o console para os dados coletados.');
}
</script>
</body>
</html>