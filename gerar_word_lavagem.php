<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Recebe os dados do POST
$data = json_decode(file_get_contents('php://input'), true);

// Cria um novo documento Word
$phpWord = new PhpWord();

// Adiciona uma seção ao documento
$section = $phpWord->addSection();

// Adiciona título
$section->addText('RELATÓRIO DE LAVAGEM DE TANQUE', ['bold' => true, 'size' => 16]);
$section->addTextBreak(2);

// Dados do Cliente
$section->addText('DADOS DO CLIENTE', ['bold' => true]);
$section->addText('Cliente: ' . $data['cliente_nome']);
$section->addText('Fantasia: ' . $data['fantasia']);
$section->addText('Endereço: ' . $data['endereco']);
// Adicione todos os outros campos do cliente...

// Dados do Reservatório
$section->addTextBreak(1);
$section->addText('DADOS DO RESERVATÓRIO', ['bold' => true]);
$section->addText('Volume: ' . $data['volume'] . ' litros');
$section->addText('Profundidade: ' . $data['profundidade'] . ' metros');
// Adicione todos os outros campos do reservatório...

// Observações
$section->addTextBreak(1);
$section->addText('OBSERVAÇÕES', ['bold' => true]);
$section->addText('Do superior: ' . $data['obs_superior']);
$section->addText('Do cliente: ' . $data['obs_cliente']);

// Salva o documento
$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$filename = 'lavagem_tanque_' . date('Ymd_His') . '.docx';

// Força o download
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');
exit;