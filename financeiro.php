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
     <div class="container mt-5" id="cadastro-conta-pagar">
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
    </div>
    
</body>
</html>
