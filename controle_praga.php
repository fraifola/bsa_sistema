<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSA - Propostas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php include("menu.php"); ?>

    <form id="formPragas" method="post">
  <h3 class="bg-success text-white p-2 rounded text-center">
    Controle de pragas
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
            <select id="cliente-pragas" class="form-select" required>
              <option value="">Carregando clientes...</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Fantasia</label>
            <input type="text" id="fantasia-pragas" class="form-control" readonly>
          </div>
        </div>
      </div> <!-- fecha row -->

      <div class="row mb-3">
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Endereço</label>
            <input type="text" id="endereco-pragas" class="form-control" readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" id="telefone-pragas" class="form-control" readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-3">
            <label class="form-label">Ponto de Referência</label>
            <input type="text" id="ponto-referencia-pragas" name="ponto_referencia" class="form-control" placeholder="Ex: Próximo ao mercado X">
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-3">
            <label class="form-label">Contato</label>
            <input type="text" id="contato-pragas" class="form-control" readonly>
          </div>
        </div>
      </div> <!-- fecha row -->

      <div class="row mb-3">
        <div class="col-md-3">
          <div class="mb-3">
            <label class="form-label">Atividade do Imóvel *</label>
            <select id="atividade-imovel-pragas" name="atividade_imovel" class="form-select" required>
              <option value="">Selecione...</option>
              <option value="comercial">Comercial</option>
              <option value="residencial">Residencial</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-3">
            <label class="form-label">CEP</label>
            <input type="text" id="cep-pragas" class="form-control" readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-3">
            <label class="form-label">Vendedor</label>
            <input type="text" id="vendedor-pragas" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-3">
            <label class="form-label">Setor</label>
            <input type="text" id="setor-pragas" class="form-control">
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Serviços Executados -->
  <h5 class="bg-success text-white p-2 rounded text-center">Serviços Executados</h5>
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Serviço</label>
      <select class="form-control" name="servico">
        <option value="">Selecione o serviço...</option>
        <option value="servico1">Desinsetização</option>
        <option value="servico2">Desratização</option>
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">Garantia da assistência técnica</label>
      <input type="text" class="form-control" name="contrato">
    </div>
  </div>

  <!-- Área tratada -->
  <h5 class="bg-success text-white p-2 rounded text-center">Área Tratada</h5>
  <input type="text" class="form-control mb-3" id="area-tratada-pragas" name="area_tratada" placeholder="Ex: 200m²">

  <!-- Pragas Combatidas -->
  <h5 class="bg-success text-white p-2 rounded text-center">Pragas Combatidas</h5>
  <input type="text" class="form-control mb-3" id="pragas-alvo-pragas" name="pragas_alvo" placeholder="Ex: baratas, ratos">

  <!-- Observações -->
  <h5 class="bg-success text-white p-2 rounded text-center">Observações</h5>
  <textarea id="obs-pragas" class="form-control mb-3" rows="3" placeholder="Digite observações gerais..."></textarea>

  <h6 class="bg-success text-white p-2 rounded text-center">Observações específicas</h6>
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Supervisor</label>
      <textarea class="form-control" id="obs-supervisor-pragas" name="obs_supervisor"></textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">Cliente</label>
      <textarea class="form-control" id="obs-cliente-pragas" name="obs_cliente"></textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">Executores</label>
      <textarea class="form-control" id="obs-executores-pragas" name="obs_executores"></textarea>
    </div>
  </div>

  <!-- Produtos Utilizados -->
  <h5 class="bg-success text-white p-2 rounded text-center mt-4">Produtos Utilizados</h5>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Produto</th>
        <th>Princípio Ativo</th>
        <th>Concentração</th>
        <th>Quantidade utilizada</th>
        <th>Praga</th>
        <th>Equipamento</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody id="produtos-body"></tbody>
  </table>
  <button type="button" class="btn btn-success" onclick="adicionarLinhaProduto()">+ Adicionar Produto</button>

  <!-- Executores -->
  <h5 class="bg-success text-white p-2 rounded text-center mt-4">Executores</h5>
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

  <h2>Controle de Pragas</h2>
<table class="table" id="tabelaPragas">
  <thead>
    <tr>
      <th>ID</th>
      <th>Fantasia</th>
      <th>Endereço</th>
      <th>Telefone</th>
      <th>Contato</th>
      <th>Atividade</th>
      <th>Data Emissão</th>
      <th>Data Execução</th>
      <th>Executores</th>
      <th>Observações</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>
<script>
/// ============ FORMULÁRIO DE CONTROLE DE PRAGAS ============
document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ DOM carregado, chamando initializePragas()");
    initializePragas();
});

function initializePragas() {
    console.log("✅ initializePragas chamado");

    carregarClientesParaPragas();
    carregarProdutosEstoquePragas();

    // Evento de seleção de cliente
    document.getElementById("cliente-pragas")?.addEventListener("change", function () {
        console.log("📌 Cliente selecionado:", this.value);
        const clienteId = this.value;
        if (clienteId) {
            carregarDadosClientePragas(clienteId);
        } else {
            limparDadosClientePragas();
        }
    });

    // Evento de envio do formulário
    document.getElementById("formPragas")?.addEventListener("submit", function (e) {
        e.preventDefault();
        console.log("📌 Submit detectado em formPragas");
        if (validarFormularioPragas()) {
            const dados = coletarDadosPragas();
            console.log("📦 Dados coletados:", dados);
            enviarDadosPragas(dados);
        } else {
            console.log("❌ Validação do formulário falhou");
        }
    });
}

/* ================= CLIENTES ================= */

function carregarClientesParaPragas() {
    console.log("➡️ Carregando clientes...");
    fetch("get_clientes.php")
    .then((response) => response.json())
    .then((result) => {
        console.log("✅ Clientes recebidos:", result);
        if (!result.success) {
            throw new Error(result.error || "Erro ao carregar clientes");
        }

        const select = document.getElementById("cliente-pragas");
        select.innerHTML = '<option value="">Selecione o cliente...</option>';

        const clientes = Array.isArray(result.data) ? result.data : [];

        clientes.forEach((cliente) => {
            const option = document.createElement("option");
            option.value = cliente.id;
            option.textContent = cliente.fantasia || cliente.razao_social;
            select.appendChild(option);
        });
    })
    .catch((error) => {
        console.error("💥 Erro ao carregar clientes:", error);
        alert("Erro ao carregar clientes: " + error.message);
    });


}

function carregarDadosClientePragas(clienteId) {
    console.log("➡️ Buscando dados do cliente:", clienteId);
    fetch("get_clientes.php")
        .then((response) => response.json())
        .then((result) => {
            console.log("✅ Dados do cliente recebidos:", result);
            if (!result.success) {
                throw new Error(result.error || "Erro ao buscar dados do cliente");
            }

            const clientes = Array.isArray(result.data) ? result.data : [];
            const cliente = clientes.find((c) => c.id == clienteId);

            if (!cliente) {
                throw new Error("Cliente não encontrado");
            }

            document.getElementById("fantasia-pragas").value =
                cliente.fantasia || cliente.razao_social;
            document.getElementById("endereco-pragas").value =
                cliente.endereco_completo || cliente.endereco || "";
            document.getElementById("telefone-pragas").value = cliente.telefone || "";
            document.getElementById("contato-pragas").value =
                cliente.contato_responsavel || "";
            document.getElementById("cep-pragas").value = cliente.cep || "";
        })
        .catch((error) => {
            console.error("💥 Erro ao carregar dados do cliente:", error);
            alert("Erro ao carregar dados do cliente: " + error.message);
        });
}

function limparDadosClientePragas() {
    console.log("🧹 Limpando dados do cliente");
    ["fantasia-pragas", "endereco-pragas", "telefone-pragas", "contato-pragas", "cep-pragas"].forEach(
        (id) => {
            document.getElementById(id).value = "";
        }
    );
}

/* ================= PRODUTOS ================= */

let produtosCache = [];

function carregarProdutosEstoquePragas() {
    console.log("➡️ Carregando produtos...");
    fetch("get_produtos.php")
        .then((r) => r.json())
        .then((result) => {
            console.log("✅ Produtos recebidos:", result);
            if (!result.success) throw new Error(result.error || "Erro ao carregar produtos");
            produtosCache = result.data;
        })
        .catch((err) => alert("Erro ao carregar produtos: " + err.message));
}

function adicionarLinhaProduto() {
    console.log("➕ Adicionando linha de produto");
    const tbody = document.getElementById("produtos-body");
    const row = document.createElement("tr");

    row.innerHTML = `
      <td>
        <select class="form-control produto-select">
          <option value="">Selecione...</option>
          ${produtosCache
              .map(
                  (p) => `
            <option value="${p.id}" 
                data-principio="${p.principio_ativo || ""}" 
                data-concentracao="${p.concentracao || ""}" 
                data-registro="${p.registro_ms || ""}">
              ${p.produto_utilizado} (${p.unidade_medida})
            </option>`
              )
              .join("")}
        </select>
      </td>
      <td><input type="text" class="form-control principio-ativo" readonly></td>
      <td><input type="text" class="form-control concentracao" readonly></td>
      <td><input type="text" class="form-control quantidade"></td>
      <td><input type="text" class="form-control praga"></td>
      <td><input type="text" class="form-control equipamento"></td>
      <td><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">Excluir</button></td>
    `;

    // Evento para preencher automaticamente os campos ao escolher produto
    row.querySelector(".produto-select").addEventListener("change", function () {
        console.log("📌 Produto selecionado:", this.value);
        const opt = this.selectedOptions[0];
        const tr = this.closest("tr");
        tr.querySelector(".principio-ativo").value = opt.dataset.principio || "";
        tr.querySelector(".concentracao").value = opt.dataset.concentracao || "";
    });

    tbody.appendChild(row);
}

function coletarProdutosPragas() {
    console.log("📦 Coletando produtos...");
    const linhas = document.querySelectorAll("#produtos-body tr");
    let produtos = [];
    linhas.forEach((tr) => {
        const produto = {
            produto_id: tr.querySelector(".produto-select").value,
            produto_nome: tr.querySelector(".produto-select").selectedOptions[0]?.text || "",
            principio_ativo: tr.querySelector(".principio-ativo").value,
            concentracao: tr.querySelector(".concentracao").value,
            quantidade: tr.querySelector(".quantidade").value,
            praga: tr.querySelector(".praga").value,
            equipamento: tr.querySelector(".equipamento").value,
        };
        if (produto.produto_id) produtos.push(produto);
    });
    console.log("✅ Produtos coletados:", produtos);
    return produtos;
}

/* ================= FORM ================= */

function validarFormularioPragas() {
    console.log("📝 Validando formulário...");
    const camposObrigatorios = [
        { id: "cliente-pragas", mensagem: "Selecione um cliente" },
        { id: "atividade-imovel-pragas", mensagem: "Informe a atividade do imóvel" },
    ];

    for (const campo of camposObrigatorios) {
        const elemento = document.getElementById(campo.id);
        if (!elemento || !elemento.value.trim()) {
            alert(campo.mensagem);
            console.warn("❌ Validação falhou no campo:", campo.id);
            elemento?.focus();
            return false;
        }
    }

    if (coletarProdutosPragas().length === 0) {
        alert("Adicione pelo menos um produto!");
        console.warn("❌ Nenhum produto adicionado");
        return false;
    }

    console.log("✅ Validação OK");
    return true;
}

function coletarDadosPragas() {
    return {
        cliente_id: document.getElementById("cliente-pragas").value,
        fantasia: document.getElementById("fantasia-pragas").value,
        endereco: document.getElementById("endereco-pragas").value,
        telefone: document.getElementById("telefone-pragas").value,
        contato: document.getElementById("contato-pragas").value,
        cep: document.getElementById("cep-pragas").value,
        atividade_imovel: document.getElementById("atividade-imovel-pragas").value,

        // novos campos adicionados ao formulário
        area_tratada: document.getElementById("area-tratada-pragas")?.value || null,
        pragas_alvo: document.getElementById("pragas-alvo-pragas")?.value || null,

        observacoes: document.getElementById("obs-pragas")?.value || "",
        obs_supervisor: document.getElementById("obs-supervisor-pragas")?.value || null,
        obs_cliente: document.getElementById("obs-cliente-pragas")?.value || null,
        obs_gerais: document.getElementById("obs-pragas")?.value || null,
        obs_executores: document.getElementById("obs-executores-pragas")?.value || null,

        // executores
        tecnico: document.querySelector("[name='tecnico']").value,
        auxiliares: document.querySelector("[name='auxiliares']").value,

        // produtos utilizados
        produtos: coletarProdutosPragas(),
    };
}



function enviarDadosPragas(dados) {
    console.log("🚀 Enviando para salvar_pragas.php:", dados);

  fetch("salvar_pragas.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(dados)
})
.then(res => res.json())
.then(result => {
    console.log("📩 Resposta do servidor:", result);

    if (result.success) {
        alert("✅ Ordem de serviço salva com sucesso! ID: " + result.id);
        // Aqui você pode limpar o formulário ou atualizar a tela
        document.getElementById("formPragas").reset();
    } else {
        alert("⚠️ Erro: " + result.message);
    }
})
.catch(err => {
    console.error("💥 Erro no fetch:", err);
    alert("Erro ao salvar: " + err.message);
});
function carregarPragas() {
    fetch("listar_pragas.php")
        .then(response => response.json())
        .then(res => {
            let tbody = document.getElementById("lista-pragas");
            tbody.innerHTML = "";

            if (!res.success || res.data.length === 0) {
                tbody.innerHTML = "<tr><td colspan='7'>Nenhum registro encontrado</td></tr>";
                return;
            }

            res.data.forEach(praga => {
                tbody.innerHTML += `
                    <tr>
                        <td>${praga.id}</td>
                        <td>${praga.fantasia ?? ''}</td>
                        <td>${praga.endereco ?? ''}</td>
                        <td>${praga.contato ?? ''} (${praga.telefone ?? ''})</td>
                        <td>${praga.data_execucao ?? ''}</td>
                        <td>${praga.executores ?? '-'}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="gerarPDFPraga(${praga.id})">
                                Gerar PDF
                            </button>
                        </td>
                    </tr>
                `;
            });
        })
        .catch(err => console.error("Erro ao carregar pragas:", err));
}

function gerarPDFPraga(id) {
    window.open("gerar_pdf_pragas.php?id=" + id, "_blank");
}

document.addEventListener("DOMContentLoaded", carregarPragas);
}

/* ================= OUTROS ================= */

function editarLavagem(id) {
    window.location.href = "form_lavagem.php?id=" + id; 
}

function visualizarLavagem(id) {
    window.location.href = "ver_lavagem.php?id=" + id; 
}

function excluirLavagem(id) {
    if (confirm("Tem certeza que deseja excluir esta lavagem?")) {
        fetch("excluir_lavagem.php?id=" + id, { method: "GET" })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Lavagem excluída com sucesso!");
                location.reload();
            } else {
                alert("Erro: " + data.error);
            }
        });
    }
}
fetch("listar_pragas.php")
  .then(res => res.json())
  .then(json => {
    if(json.success){
      let tbody = document.querySelector("#tabelaPragas tbody");
      json.data.forEach(item => {
        let tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${item.id}</td>
          <td>${item.fantasia}</td>
          <td>${item.endereco}</td>
          <td>${item.telefone}</td>
          <td>${item.contato}</td>
          <td>${item.atividade_imovel}</td>
          <td>${item.data_emissao}</td>
          <td>${item.data_execucao}</td>
          <td>${item.executores}</td>
          <td>${item.observacoes}</td>
          <td>
            <a href="gerar_pdf_pragas.php?id=${item.id}" class="btn btn-danger btn-sm">
              Gerar PDF
            </a>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }
  });
</script>

</body>
</html>