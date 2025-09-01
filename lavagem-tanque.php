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
<form id="formLavagemTanque">
  <h3 class="bg-success text-white p-2 rounded text-center">
  Lavagem de Tanque
</h3>

<div class="card mb-4">
  <div class="card-header bg-success text-white">
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
    </div> <!-- fecha row -->

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
    </div> <!-- fecha row -->

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
</form>


        <!-- Seção de Dados do Reservatório -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
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
            <div class="card-header bg-success text-white">
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
            <div class="card-header bg-success text-white">
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
                            <select id="produto-lavagem" class="form-select" required>
                                <option value="">Carregando produtos...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Princípio Ativo</label>
                            <input type="text" id="principio-ativo-lavagem" class="form-control" readonly>
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
</div>
<div class="d-flex justify-content-start gap-2 mt-4">
    <button type="button" class="btn btn-primary" onclick="listarLavagens()">
    Listar Lavagens
</button>

<div id="lista-lavagens" class="mt-3"></div>

<script>
  // ============ FORMULÁRIO DE LAVAGEM DE TANQUE ============
document.addEventListener('DOMContentLoaded', function() {
    initializeLavagemTanque();
});
function initializeLavagemTanque() {
    carregarClientesParaLavagem();
    carregarProdutosEstoque();

    
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

function carregarClientesParaLavagem() {
    fetch('get_clientes.php')
        .then(response => {
            // Primeiro verifique o texto bruto
            return response.text().then(text => {
                console.log('Resposta bruta:', text);
                
                try {
                    // Tente parsear como JSON
                    return JSON.parse(text);
                } catch (e) {
                    console.error('Falha ao parsear JSON:', e, 'Texto:', text);
                    throw new Error('Resposta não é JSON válido: ' + text.substring(0, 100));
                }
            });
        })
        .then(result => {
            if (!result.success) {
                throw new Error(result.error || 'Erro desconhecido ao carregar clientes');
            }

            const select = document.getElementById('cliente-lavagem');
            select.innerHTML = '<option value="">Selecione o cliente...</option>';
            
            const clientes = Array.isArray(result.data) ? result.data : [];
            
            clientes.forEach(cliente => {
                const option = document.createElement('option');
                option.value = cliente.id;
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
    const produtoSelect = document.getElementById('produto-lavagem');
    
    const dados = {
        cliente_id: document.getElementById('cliente-lavagem').value,
        fantasia: document.getElementById('fantasia-lavagem').value,
        endereco: document.getElementById('endereco-lavagem').value,
        telefone: document.getElementById('telefone-lavagem').value,
        ponto_referencia: document.getElementById('ponto-referencia-lavagem').value,
        contato: document.getElementById('contato-lavagem').value,
        atividade_imovel: document.getElementById('atividade-imovel-lavagem').value,
        cep: document.getElementById('cep-lavagem').value,
        vendedor: document.getElementById('vendedor-lavagem').value,
        setor: document.getElementById('setor-lavagem').value,
        
        // Dados do reservatório
        reservatorio: document.getElementById('reservatorio-lavagem').value,
        volume: document.getElementById('volume-lavagem').value,
        profundidade: document.getElementById('profundidade-lavagem').value,
        diametro: document.getElementById('diametro-lavagem').value,
        material: document.getElementById('material-lavagem').value,
        cobertura: document.getElementById('cobertura-lavagem').value,
        detritos: document.getElementById('detritos-lavagem').value,
        vetores: document.getElementById('vetores-lavagem').value,
        rachaduras: document.getElementById('rachaduras-lavagem').value,
        vetores_reservatorio: document.getElementById('vetores-reservatorio-lavagem').value,
        
        // Observações
        obs_superior: document.getElementById('obs-superior-lavagem').value,
        obs_cliente: document.getElementById('obs-cliente-lavagem').value,
        info_gerais: document.getElementById('info-gerais-lavagem').value,
        
        // Execução
        executores: document.getElementById('executores-lavagem').value,
        produto_id: produtoSelect.value, // ID do produto
        produto: produtoSelect.options[produtoSelect.selectedIndex]?.text || '', // Nome do produto
        principio_ativo: document.getElementById('principio-ativo-lavagem').value,
        quantidade: document.getElementById('quantidade-lavagem').value,
        unidade_medida: document.getElementById('unidade-medida-lavagem').value,
        reg_min_saude: document.getElementById('reg-min-saude-lavagem').value,
        concentracao: document.getElementById('concentracao-lavagem').value
    };
    
    return dados;
}

function enviarDadosLavagem(dados) {
    console.log('Enviando dados:', dados);
    
    fetch('salvar_lavagem_tanque.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dados)
    })
    .then(response => {
        console.log('Status da resposta:', response.status);
        console.log('Headers:', response.headers);
        
        // Primeiro veja o texto bruto
        return response.text().then(text => {
            console.log('Resposta bruta:', text);
            
            // Tenta parsear como JSON
            try {
                return JSON.parse(text);
            } catch (e) {
                console.error('Falha ao parsear JSON:', e);
                throw new Error('Resposta não é JSON válido: ' + text.substring(0, 200));
            }
        });
    })
    .then(result => {
        if (result.success) {
            alert('Lavagem salva com sucesso! ID: ' + result.lavagem_id);
            document.getElementById('formLavagemTanque').reset();
        } else {
            alert('Erro: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Erro completo:', error);
        alert('Erro ao enviar dados: ' + error.message);
    });
}
// Carregar produtos do estoque
function carregarProdutosEstoque() {
    fetch('get_produtos.php')
        .then(res => res.json())
        .then(result => {
            if (!result.success) throw new Error(result.error || "Erro ao carregar produtos");

            const select = document.getElementById("produto-lavagem");
            select.innerHTML = '<option value="">Selecione um produto...</option>';

            result.data.forEach(produto => {
                const option = document.createElement("option");
                option.value = produto.id; // ID do produto
                option.textContent = `${produto.produto_utilizado} (${produto.unidade_medida})`;
                option.dataset.principio = produto.principio_ativo; 
                option.dataset.registro = produto.registro_ms;
                option.dataset.concentracao = produto.concentracao;
                select.appendChild(option);
            });
        })
        .catch(err => {
            console.error("Erro ao carregar produtos:", err);
            alert("Erro ao carregar produtos: " + err.message);
        });
}

// Quando escolher produto, preencher os outros campos
document.getElementById("produto-lavagem")?.addEventListener("change", function() {
    const option = this.selectedOptions[0];
    if (option) {
        document.getElementById("principio-ativo-lavagem").value = option.dataset.principio || "";
        document.getElementById("reg-min-saude-lavagem").value = option.dataset.registro || "";
        document.getElementById("concentracao-lavagem").value = option.dataset.concentracao || "";
    }
});
function listarLavagens() {
    fetch("listar_lavagens.php")
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                let html = "<table class='table table-striped'>";
                html += "<tr><th>ID</th><th>Fantasia</th><th>Reservatório</th><th>Data</th><th>Ações</th></tr>";

                res.data.forEach(lav => {
                    html += `
                        <tr>
                            <td>${lav.id}</td>
                            <td>${lav.fantasia}</td>
                            <td>${lav.reservatorio}</td>
                            <td>${lav.data_cadastro}</td>
                            <td>
                                <a href="gerar_pdf_lavagem.php?id=${lav.id}" target="_blank" class="btn btn-danger btn-sm">
                                    Gerar PDF
                                </a>
                            </td>
                        </tr>
                    `;
                });

                html += "</table>";
                document.getElementById("lista-lavagens").innerHTML = html;
            } else {
                alert("Erro: " + res.message);
            }
        })
        .catch(err => console.error("Erro na listagem:", err));
}





</script>
</body>
</html>