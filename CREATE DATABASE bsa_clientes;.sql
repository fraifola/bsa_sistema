CREATE DATABASE bsa_clientes;

USE bsa_clientes;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_cliente VARCHAR(50),
    cpf_cnpj VARCHAR(20),
    razao_social VARCHAR(100),
    telefone VARCHAR(20),
    email VARCHAR(100),
    contato_responsavel VARCHAR(100),
    data_aniversario DATE,
    cep VARCHAR(10),
    endereco VARCHAR(100),
    numero VARCHAR(10),
    complemento VARCHAR(50),
    bairro VARCHAR(50),
    cidade VARCHAR(50),
    uf VARCHAR(2),
    exibir_ces VARCHAR(10),
);
