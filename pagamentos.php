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
<div id="listar-pagamentos-secao">
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
<script>
    function carregarContas() {
        fetch('listar_contas.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erro HTTP: " + response.status);
                }
                return response.json();
            })
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
            .catch(error => {
                console.error("Erro ao carregar contas:", error);
                alert("Não foi possível carregar as contas. Veja o console para detalhes.");
            });
    }

    // Funções auxiliares básicas (caso você não tenha em outro arquivo)
    function formatarData(data) {
        if (!data) return "";
        const d = new Date(data);
        return d.toLocaleDateString("pt-BR");
    }

    function formatarMoeda(valor) {
        if (!valor) return "0,00";
        return parseFloat(valor).toFixed(2).replace(".", ",");
    }

    // Chamar no carregamento da página
    document.addEventListener("DOMContentLoaded", carregarContas);
</script>
</body>
</html>