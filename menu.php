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
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BSA</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2"><a class="nav-link" href="Sistema_bsa.php" id="nav-operacional">Operacional</a></li>
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
                        <li><a class="dropdown-item" href="lista_clientes.php">Listar</a></li>
                        <li><a class="dropdown-item" href="clientes.php">Novo</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Serviços</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="lavagem-tanque.php">Lavagem de Tanque</a></li>
                        <li><a class="dropdown-item" href="#">Controle de Praga</a></li>
                        <li><a class="dropdown-item" href="#">Fumigação</a></li>
                        <li><a class="dropdown-item" href="estoque.php">Estoque</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Financeiro</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Centro de Custo</a></li>
                        <li><a class="dropdown-item" href="financeiro.php">Contas</a></li>
                        <li><a class="dropdown-item" href="pagamentos.php">Listar Pagamentos</a></li>
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
                </li>
            </ul>
        </div>
    </div>
</nav>

</body>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
</script>
</html>

