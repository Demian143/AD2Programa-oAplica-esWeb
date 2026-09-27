create table usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    nickname VARCHAR(50) UNIQUE,
    email VARCHAR(50) UNIQUE,
    pontos INT DEFAULT 0
);

create table modelos (
    id INT PRIMARY KEY,
    nome VARCHAR(100),
    descricao TEXT,
    categoria VARCHAR(50),
    data_limite DATETIME,
    status ENUM('aberto', 'finalizado')
);

create table desafios (
    id INT PRIMARY KEY,
    titulo VARCHAR(100),
    descricao TEXT,
    categoria VARCHAR(50),
    data_limite DATETIME,
    status ENUM('aberto', 'finalizado')
);

create table submissoes (
    id INT PRIMARY KEY,
    usuario_id INT,
    desafio_id INT,
    modelo_id INT,
    prompt TEXT,
    resposta TEXT,
    nota DECIMAL(5,2),
    data_submissao DATETIME,
    CONSTRAINT fk_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
    CONSTRAINT fk_desafio FOREIGN KEY (desafio_id) REFERENCES desafios(desafio_id),
    CONSTRAINT fk_modelo FOREIGN KEY (modelo_id) REFERENCES modelos(modelo_id)
);