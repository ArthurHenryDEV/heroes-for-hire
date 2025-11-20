CREATE TABLE missoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_cidadao VARCHAR(100) NOT NULL,
    descricao_problema TEXT NOT NULL,
    localizacao VARCHAR(100) NOT NULL,
    nivel_urgencia ENUM('Baixa', 'Media', 'Alta', 'Vingadores') DEFAULT 'Media',
    status ENUM('Pendente', 'Em Andamento', 'Concluida') DEFAULT 'Pendente',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);