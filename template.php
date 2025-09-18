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
  }
  .cabecalho {
    width: 100%;
    border-collapse: collapse;
  }
  .cabecalho td {
    vertical-align: middle;
    text-align: center;
  }
  .cabecalho .logo {
    text-align: left;
    width: 20%;
  }
  .cabecalho .titulo {
    font-size: 14px;
    font-weight: bold;
    color: #2d572c;
    text-align: center;
    width: 60%;
  }
  .cabecalho .vazio {
    width: 20%;
  }
  header img { height: 40px; }

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
    line-height: 14px;
    color: #555;
  }
    table { width: 100%; border-collapse: collapse; margin-top: 5px; }
    th, td { border: 1px solid #000; padding: 4px; font-size: 10px; }
    th { background: none; text-align: center; font-weight: bold; }
    
    @page {
  margin: 15mm 10mm 15mm 10mm; /* margens menores */
}

body {
  font-family: DejaVu Sans, sans-serif;
  font-size: 10px; /* menor */
  margin: 0;
  color: #333;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 4px;
  page-break-inside: avoid; /* não quebra tabela */
}

th, td {
  border: 1px solid #000;
  padding: 3px; /* padding menor */
  font-size: 9px;
}

header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: auto;
}

footer {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  height: auto;
  font-size: 8px;
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
  .assinaturas { margin-top: 50px; width: 100%; }
  .assinaturas td { text-align: center; width: 50%; }
  .linha-assinatura { border-top: 1px solid #000; margin: 40px 20px 0 20px; }
</style>

<!-- Cabeçalho -->
<header>
  <table style="width:100%; border-collapse: collapse;">
    <tr>
      <td style="width:25%;">
      <img src="bsa_logo.png" style="height:60px;" alt="Bahia Saúde Ambiental company logo featuring stylized green and blue elements with the company name in bold text. The logo appears on a clean white background, conveying a professional and trustworthy tone.">
</td>
      <td style="width:50%; text-align:center; font-size:14px; font-weight:bold;">
        FBAHIA TRATAMENTOS FITOSSANITÁRIOS E PRESTAÇÃO DE SERVIÇOS LTDA<br>
        CNPJ 05.406.298/0001-58<br>
        e-mail: operacional@bahiasaudeambiental.com.br<br>
        LOT PERIMETRO IRRIGADO DO BRUMADO, 93 - LIVRAMENTO DE NOSSA SENHORA - BA
      </td>
      <td style="width:25%; text-align:right; font-size:12px;">
        <div style="background:#4CAF50; color:#fff; padding:5px; border-radius:5px;">
          <b>71<br>3024-5891<br>98239-0303</b>
        </div>
      </td>
    </tr>
  </table>
  <h2 style="text-align:center; margin-top:10px; font-size:14px;">
    ORDEM DE SERVIÇO DE HIGIENIZAÇÃO DE RESERVATÓRIOS
  </h2>
</header>


<!-- Rodapé -->
<footer>
  Bahia Saúde Ambiental - CNPJ: 05.406.298/0001-58<br>
  Endereço: Lote Perímetro Irrigado do Brumado, 93 - Livramento de Nossa Senhora - BA<br>
  Página {PAGE_NUM} de {PAGE_COUNT}
</footer>

<!-- Conteúdo -->
<div class="section">
  <b>OS Nº:</b> '.htmlspecialchars($dados["os_numero"] ?? "").' &nbsp; | 
  <b>Emissão:</b> '.htmlspecialchars($dados["emissao"] ?? "").' &nbsp; | 
  <b>Execução:</b> '.htmlspecialchars($dados["data_execucao"] ?? "").'
</div>

<h4 style="border-bottom:1px solid #000; background:none; padding:3px; font-size:11px; text-transform:uppercase;">
  Dados do Cliente
</h4>

<table>
  <tr>
    <td><b>Cliente:</b> '.htmlspecialchars($dados["fantasia"] ?? "").'</td>
    <td><b>Atividade:</b> '.htmlspecialchars($dados["atividade_imovel"] ?? "").'</td>
  </tr>
  <tr>
    <td><b>Endereço:</b> '.htmlspecialchars($dados["endereco"] ?? "").'</td>
    <td><b>Telefone:</b> '.htmlspecialchars($dados["telefone"] ?? "").'</td>
  </tr>
  <tr>
    <td colspan="2"><b>Contato:</b> '.htmlspecialchars($dados["contato"] ?? "").'</td>
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
    '.($dados["tabela_reservatorios"] ?? "").'
  </tbody>
</table>

<h4>Observações</h4>
<table>
  <tr><td><b>Supervisor:</b> '.htmlspecialchars($dados["obs_superior"] ?? "").'</td></tr>
  <tr><td><b>Cliente:</b> '.htmlspecialchars($dados["obs_cliente"] ?? "").'</td></tr>
  <tr><td><b>Gerais:</b> '.htmlspecialchars($dados["info_gerais"] ?? "").'</td></tr>
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
      <td>'.htmlspecialchars($dados["produto"] ?? "").'</td>
      <td>'.htmlspecialchars($dados["principio_ativo"] ?? "").'</td>
      <td>'.htmlspecialchars($dados["quantidade"] ?? "").'</td>
      <td>'.htmlspecialchars($dados["unidade_medida"] ?? "").'</td>
      <td>'.htmlspecialchars($dados["reg_min_saude"] ?? "").'</td>
      <td>'.htmlspecialchars($dados["concentracao"] ?? "").'</td>
      <td>'.htmlspecialchars($dados["volume"] ?? "").'</td>
    </tr>
  </tbody>
</table>

<table style="width:100%; margin-top:20px;">
  <tr>
    <td style="width:70%;">
      <b>Executores:</b> '.htmlspecialchars($dados["executores"] ?? "").'<br>
      Técnico: _____________<br>
      Auxiliar: _____________
    </td>
    <td style="width:30%; text-align:right;">
      <img src="qrcode.png" style="width:80px;">
    </td>
  </tr>
</table>

<p style="margin-top:30px;">Cliente: ____________________________</p>


<table class="assinaturas">
  <tr>
    <td>
      <div class="linha-assinatura"></div>
      <p>Responsável Técnico</p>
    </td>
    <td>
      <div class="linha-assinatura"></div>
      <p>Cliente</p>
    </td>
  </tr>
</table>
';
?>
