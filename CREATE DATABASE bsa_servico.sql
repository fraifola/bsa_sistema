CREATE DATABASE IF NOT EXISTS bsa_servicos;
USE bsa_servicos;
CREATE TABLE IF NOT EXISTS lavagem_tanque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    data_servico DATE NOT NULL,
    vendedor VARCHAR(100),
    setor VARCHAR(50),
    
    -- Dados do reservatório
    reservatorio VARCHAR(50),
    volume DECIMAL(10,2),
    profundidade DECIMAL(10,2),
    diametro DECIMAL(10,2),
    material ENUM('Fibrocimento', 'Metal', 'Plástico', 'Concreto'),
    cobertura ENUM('Sim', 'Não', 'Parcial'),
    detritos TEXT,
    vetores TEXT,
    rachaduras ENUM('Sim', 'Não'),
    vetores_reservatorio TEXT,
    
    -- Observações
    obs_superior TEXT,
    obs_cliente TEXT,
    info_gerais TEXT,
    
    -- Dados da execução
    executores VARCHAR(200),
    produto VARCHAR(100),
    principio_ativo VARCHAR(100),
    quantidade DECIMAL(10,2),
    unidade_medida ENUM('L', 'mL', 'kg', 'g'),
    reg_min_saude VARCHAR(50),
    concentracao DECIMAL(5,2),
    
    -- Controle
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);