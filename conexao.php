<?php
// Arquivo: conexao.php

/**
 * Por favor, ajuste as credenciais abaixo para corresponder
 * às configurações do seu servidor MySQL no phpMyAdmin.
 */

// Host do banco de dados (geralmente 'localhost' para XAMPP)
$servername = "localhost";

// Usuário do banco de dados (o padrão no XAMPP é 'root')
$username = "root";

// Senha do banco de dados (no XAMPP, a senha padrão é vazia. Se você a configurou, coloque-a aqui)
$password = "";

// Nome do banco de dados que você criou
$dbname = "bsa_clientes";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    // Se a conexão falhar, exibe uma mensagem de erro e interrompe o script
    // Isso é útil para depurar e identificar o problema
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Opcional: Definir o charset para UTF-8 para evitar problemas com acentuação
$conn->set_charset("utf8");

// A conexão está aberta e pronta para ser usada nos outros arquivos.
?>
