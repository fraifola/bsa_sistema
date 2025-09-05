<?php
$html = '
<style>
  body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #333; margin: 20px; }
  table { width: 100%; border-collapse: collapse; margin-top: 10px; }
  th, td { border: 1px solid #000; padding: 5px; font-size: 10px; }
  th { background: #e0e0e0; text-align: center; }
</style>

<header>
  <h2 style="text-align:center;">ORDEM DE SERVIÇO - CONTROLE DE PRAGAS</h2>
</header>

<div>
  <b>OS Nº:</b> '.htmlspecialchars($dados["os_numero"] ?? "").' <br>
  <b>Emissão:</b> '.htmlspecialchars($dados["emissao"] ?? "").' <br>
  <b>Execução:</b> '.htmlspecialchars($dados["data_execucao"] ?? "").'
</div>

<h4>Dados do Cliente</h4>
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

<h4>Área e Pragas Alvo</h4>
<table>
  <tr>
    <td><b>Área Tratada:</b> '.htmlspecialchars($dados["area_tratada"] ?? "").'</td>
    <td><b>Pragas Alvo:</b> '.htmlspecialchars($dados["pragas_alvo"] ?? "").'</td>
  </tr>
</table>

<h4>Produtos Utilizados</h4>
<table>
  <thead>
    <tr>
      <th>Produto</th><th>Princípio Ativo</th><th>Quant.</th><th>Un.</th>
      <th>Reg. Saúde</th><th>Concentração (%)</th>
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
    </tr>
  </tbody>
</table>

<h4>Observações</h4>
<table>
  <tr><td><b>Supervisor:</b> '.htmlspecialchars($dados["obs_superior"] ?? "").'</td></tr>
  <tr><td><b>Cliente:</b> '.htmlspecialchars($dados["obs_cliente"] ?? "").'</td></tr>
  <tr><td><b>Gerais:</b> '.htmlspecialchars($dados["info_gerais"] ?? "").'</td></tr>
</table>

<h4>Assinaturas</h4>
<table>
  <tr>
    <td style="text-align:center;">
      _______________________________<br>
      Responsável Técnico
    </td>
    <td style="text-align:center;">
      _______________________________<br>
      Cliente
    </td>
  </tr>
</table>
';
?>
