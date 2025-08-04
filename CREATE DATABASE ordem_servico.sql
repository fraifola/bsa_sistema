CREATE TABLE ordens_servico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,  -- Coluna para referenciar o cliente
    servico VARCHAR(255) NOT NULL,
    data_inicio DATETIME NOT NULL,
    data_fim DATETIME,
    observacoes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_cliente_os FOREIGN KEY (cliente_id) 
        REFERENCES clientes(id)
        ON DELETE SET NULL  -- Pode ser alterado para CASCADE ou RESTRICT conforme necessidade
);