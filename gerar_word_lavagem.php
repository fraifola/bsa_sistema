<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;

// carrega template docx pronto
$template = new TemplateProcessor('template_ordem_servico.docx');

// substitui os campos com valores do banco
$template->setValue('cliente', 'VOPAK BRASIL S.A.');
$template->setValue('atividade', 'Comercial');
$template->setValue('endereco', 'Av. do Contorno, Candeias - BA');
$template->setValue('telefone', '(71) 99971-3270');
$template->setValue('cep', '43813-300');
$template->setValue('vendedor', 'GILBIRANA KATIA RIBEIRO DA SILVA DO CARMO');

// dados do reservatório
$template->setValue('reservatorio1', 'Caixa D’Água');
$template->setValue('volume1', '1000L');
$template->setValue('material1', 'Polietileno');
$template->setValue('cobertura1', 'Tampa');
$template->setValue('racheduras1', 'Não');
$template->setValue('vetores1', 'Não');

// salva arquivo final
$nomeArquivo = 'ordem_servico_' . date('Ymd_His') . '.docx';
$template->saveAs($nomeArquivo);

echo "Arquivo gerado: $nomeArquivo";
?>
