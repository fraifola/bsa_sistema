<?php
$html = '
<style>
  body { font-family: DejaVu Sans, sans-serif; font-size: 11px; margin: 20mm 15mm 30mm 15mm; color: #333; }

  /* Regras de página */
  @page {
    margin: 40mm 15mm 30mm 15mm;
  }

  /* Cabeçalho fixo */
  header {
    position: fixed;
    top: -30mm;
    left: 0;
    right: 0;
    height: 30mm;
    border-bottom: 3px solid #4CAF50;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 5px 15px;
  }
  header img { height: 40px; }
  header .titulo { font-size: 14px; font-weight: bold; color: #2d572c; text-align: center; flex: 1; }

  /* Rodapé fixo */
  footer {
    position: fixed;
    bottom: -20mm;
    left: 0;
    right: 0;
    height: 20mm;
    border-top: 1px solid #ccc;
    font-size: 9px;
    text-align: center;
    line-height: 18px;
    color: #555;
  }

  /* Seções */
  .section { margin: 15px 0; }
  h4 { background: #f0f0f0; padding: 5px; border-left: 4px solid #4CAF50; font-size: 12px; margin-top: 20px; }

  /* Tabelas */
  table { width: 100%; border-collapse: collapse; margin-top: 5px; page-break-inside: auto; }
  th, td { border: 1px solid #000; padding: 5px; font-size: 10px; }
  th { background: #e0e0e0; text-align: center; font-weight: bold; }
  td { vertical-align: top; }
  tr { page-break-inside: avoid; page-break-after: auto; }

  /* Assinaturas */
  .assinaturas { display: flex; justify-content: space-between; margin-top: 50px; }
  .assinatura { text-align: center; width: 45%; }
  .linha-assinatura { border-top: 1px solid #000; margin-top: 40px; }
</style>

<!-- Cabeçalho -->
<header>
   <img src="C:/xampp/htdocs/bsa_sistema/logo_bsa.png" class="logo">
  <div class="titulo">ORDEM DE SERVIÇO DE HIGIENIZAÇÃO DE RESERVATÓRIOS</div>
</header>

<!-- Rodapé -->
<footer>
  Bahia Saúde Ambiental - CNPJ: 05.406.298/0001-58<br>
  Endereço: Lote Perímetro Irrigado do Brumado, 93 - Livramento de Nossa Senhora - BA<br>
  Página {PAGE_NUM} de {PAGE_COUNT}
</footer>

<!-- Conteúdo -->
<div class="section">
  <b>OS Nº:</b> '.$dados["os_numero"].' &nbsp; | 
  <b>Emissão:</b> '.$dados["emissao"].' &nbsp; | 
  <b>Execução:</b> '.$dados["data_execucao"].'
</div>

<h4>Dados do Cliente</h4>
<table>
  <tr>
    <td><b>Cliente:</b> '.$dados["fantasia"].'</td>
    <td><b>Atividade:</b> '.$dados["atividade_imovel"].'</td>
  </tr>
  <tr>
    <td><b>Endereço:</b> '.$dados["endereco"].'</td>
    <td><b>Telefone:</b> '.$dados["telefone"].'</td>
  </tr>
  <tr>
    <td colspan="2"><b>Contato:</b> '.$dados["contato"].'</td>
  </tr>
</table>

<h4>Reservatórios Tratados</h4>
<table>
  <thead>
    <tr>
      <th>Setor</th><th>Reservatório</th><th>Volume (L)</th><th>Material</th>
      <th>Cobertura</th><th>Detritos</th><th>Vetores</th><th>Rachaduras</th>
    </tr>
  </thead>
  <tbody>
    '.$dados["tabela_reservatorios"].'
  </tbody>
</table>

<h4>Observações</h4>
<table>
  <tr><td><b>Supervisor:</b> '.$dados["obs_superior"].'</td></tr>
  <tr><td><b>Cliente:</b> '.$dados["obs_cliente"].'</td></tr>
  <tr><td><b>Gerais:</b> '.$dados["info_gerais"].'</td></tr>
</table>

<h4>Produtos Utilizados</h4>
<table>
  <thead>
    <tr>
      <th>Produto</th><th>Princípio Ativo</th><th>Quant.</th><th>Un.</th>
      <th>Reg. Saúde</th><th>Concentração (%)</th><th>Volume</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>'.$dados["produto"].'</td>
      <td>'.$dados["principio_ativo"].'</td>
      <td>'.$dados["quantidade"].'</td>
      <td>'.$dados["unidade_medida"].'</td>
      <td>'.$dados["reg_min_saude"].'</td>
      <td>'.$dados["concentracao"].'</td>
      <td>'.$dados["volume"].'</td>
    </tr>
  </tbody>
</table>

<div class="section">
  <p><b>Executores:</b> '.$dados["executores"].'</p>
  <p><b>Responsável Técnico:</b> '.$dados["responsavel"].'</p>
</div>

<div class="assinaturas">
  <div class="assinatura">
    <div class="linha-assinatura"></div>
    <p>Responsável Técnico</p>
  </div>
  <div class="assinatura">
    <div class="linha-assinatura"></div>
    <p>Cliente</p>
  </div>
</div>
';
?>
