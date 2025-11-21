CREATE TABLE missoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_cidadao VARCHAR(100) NOT NULL,
    descricao_problema TEXT NOT NULL,
    localizacao VARCHAR(100) NOT NULL,
    nivel_urgencia ENUM('Baixa', 'Media', 'Alta', 'Vingadores') DEFAULT 'Media',
    status ENUM('Pendente', 'Em Andamento', 'Concluida') DEFAULT 'Pendente',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE civis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    endereco VARCHAR(150),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE herois (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_heroi VARCHAR(100) NOT NULL,
    identidade_secreta VARCHAR(100),
    poderes TEXT,
    afiliacao VARCHAR(50),
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    foto VARCHAR(255),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);