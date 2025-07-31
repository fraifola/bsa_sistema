<?php
/* Conexão */
$conn = new mysqli("localhost", "root", "", "bsa_clientes");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

/* Coletando dados exatamente com os mesmos names do formulário */
$tipo        = $_POST['tipo_cliente']        ?? '';
$cpf_cnpj    = $_POST['cpf_cnpj']            ?? '';
$razao       = $_POST['razao_social']        ?? '';
$telefone    = $_POST['telefone']            ?? '';
$email       = $_POST['email']               ?? '';
$contato     = $_POST['contato_responsavel'] ?? '';
$aniversario = $_POST['data_aniversario']    ?? null;   // pode ser NULL
$cep         = $_POST['cep']                 ?? '';
$endereco    = $_POST['endereco']            ?? '';
$numero      = $_POST['numero']              ?? '';
$complemento = $_POST['complemento']         ?? '';
$bairro      = $_POST['bairro']              ?? '';
$cidade      = $_POST['cidade']              ?? '';
$uf          = $_POST['uf']                  ?? '';
$exibir_ces  = $_POST['exibir_ces']          ?? 'nao';

/* INSERT seguro */
$stmt = $conn->prepare(
  "INSERT INTO clientes
   (tipo_cliente, cpf_cnpj, razao_social, telefone, email, contato_responsavel,
    data_aniversario, cep, endereco, numero, complemento, bairro, cidade, uf, exibir_ces)
   VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
);

$stmt->bind_param(
  "sssssssssssssss",
  $tipo, $cpf_cnpj, $razao, $telefone, $email, $contato, $aniversario,
  $cep, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $exibir_ces
);

if ($stmt->execute()) {
    /* redireciona de volta para a lista já focando na aba clientes */
    header("Location: Sistema_bsa.php");
    exit;
} else {
    echo "Erro ao salvar: " . $stmt->error;
}
?>
