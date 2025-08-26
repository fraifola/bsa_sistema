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
                            <li><a class="dropdown-item" href="lista_clientes.php">Listar</a></li>
                            <li><a class="dropdown-item" href="clientes.php">Novo</a></li>
                        </ul>
                    </li>
                                <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Serviços</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="lavagem-tanque.php" id="lavagem-tanque-link">Lavagem de Tanque</a></li>
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
                </ul>
            </div>
        </div>
    </nav>  
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
        Peu Bid é FODA!!
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

        setupNavigation();
        
        // Carregar dados iniciais
        carregarClientesDropdown();
    });

    // ============ FUNÇÕES PRINCIPAIS ============
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
    console.log('Iniciando carregamento de clientes...');
    
    fetch('get_clientes.php?operacional=1')
        .then(response => response.json())
        .then(result => {
            console.log('Dados recebidos:', result);
            
            if (!result.success) {
                throw new Error(result.error || 'Erro no servidor');
            }

            // Preencher select principal
            const selectPrincipal = document.getElementById('tipo_cliente');
            if (selectPrincipal) {
                selectPrincipal.innerHTML = '<option value="">Selecione o Cliente</option>';
                result.data.forEach(cliente => {
                    const option = document.createElement('option');
                    option.value = cliente.id;
                    option.textContent = cliente.fantasia || cliente.razao_social;
                    selectPrincipal.appendChild(option);
                });
            }

            // Preencher select do modal (se existir)
            const selectModal = document.getElementById('edit_tipo_cliente');
            if (selectModal) {
                selectModal.innerHTML = '<option value="">Selecione o Cliente</option>';
                result.data.forEach(cliente => {
                    const option = document.createElement('option');
                    option.value = cliente.id;
                    option.textContent = cliente.fantasia || cliente.razao_social;
                    selectModal.appendChild(option);
                });
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao carregar clientes. Verifique o console.');
        });
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


document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".nav-link[data-section]");
  const sections = document.querySelectorAll("section");

  navLinks.forEach(link => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      // Esconde todas as seções
      sections.forEach(sec => sec.style.display = "none");

      // Mostra apenas a seção clicada
      const target = this.getAttribute("data-section");
      const sectionToShow = document.getElementById(target);
      if (sectionToShow) {
        sectionToShow.style.display = "block";
      }

      // Ativa/desativa links do menu
      navLinks.forEach(l => l.classList.remove("active"));
      this.classList.add("active");
    });
  });

  // Mostra Financeiro por padrão ao carregar
  
});
</script>

</body>
</html>