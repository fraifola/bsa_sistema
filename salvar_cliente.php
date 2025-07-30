<?php
// Conexão com o banco
$host = "localhost";
$db = "bsa_clientes";
$user = "root"; // troque pelo seu usuário
$pass = "";     // troque pela sua senha

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Coletando dados do formulário
$tipo = isset($_POST['tipo_cliente']) ? $_POST['tipo_cliente'] : '';

$cpf_cnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : '';
$razao =  isset($_POST['razao']) ? $_POST['razao'] : '';
$telefone =  isset($_POST['telefone']) ? $_POST['telefone'] : '';
$email =  isset($_POST['email']) ? $_POST['email'] : '';
$contato =  isset($_POST['contato']) ? $_POST['contato'] : '';
$aniversario =  isset($_POST['aniversario']) ? $_POST['aniversario'] : '';
$cep =  isset($_POST['cep']) ? $_POST['cep'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$numero =  isset($_POST['numero']) ? $_POST['numero'] : '';
$complemento =  isset($_POST['complemento']) ? $_POST['complemento'] : '';
$bairro =  isset($_POST['bairro']) ? $_POST['bairro'] : '';
$cidade =  isset($_POST['cidade']) ? $_POST['cidade'] : '';
$uf =  isset($_POST['uf']) ? $_POST['uf'] : '';
$exibir_ces = isset($_POST['exibir_ces']) ? $_POST['exibir_ces'] : '';

$sql = "INSERT INTO clientes (tipo_cliente, cpf_cnpj, razao_social, telefone, email, contato_responsavel, data_aniversario, cep, endereco, numero, complemento, bairro, cidade, uf, exibir_ces)
        VALUES ('$tipo', '$cpf_cnpj', '$razao', '$telefone', '$email', '$contato', '$aniversario', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$exibir_ces')";

if ($conn->query($sql) === TRUE) {
    echo "Cliente cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>