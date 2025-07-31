-- Exemplo de como você pode alterar sua tabela ordens_servico
-- Se a tabela já existir, use ALTER TABLE
ALTER TABLE ordens_servico
ADD COLUMN cliente_id INT,
ADD CONSTRAINT fk_cliente_os
FOREIGN KEY (cliente_id) REFERENCES clientes(id)
ON DELETE SET NULL; -- Ou ON DELETE CASCADE, ON DELETE RESTRICT, dependendo do seu requisito

-- Se você estiver criando a tabela do zero:
CREATE TABLE ordens_servico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_cliente INT, -- Nova coluna para armazenar o ID do cliente
    servico VARCHAR(255) NOT NULL,
    data_inicio DATETIME NOT NULL,
    data_fim DATETIME,
    observacoes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
        ON DELETE SET NULL -- Ou ON DELETE CASCADE, ON DELETE RESTRICT
);