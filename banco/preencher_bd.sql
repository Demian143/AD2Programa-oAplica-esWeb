USE prompt_battle;

-- USUARIOS
INSERT INTO usuarios (nome, nickname, email)
VALUES
    ('Joao Silva', 'joao', 'joao@email.com'),
    ('Maria Santos', 'maria', 'maria@email.com'),
    ('Carlos Oliveira', 'carlos', 'carlos@email.com');


-- MODELOS
INSERT INTO modelos (nome, empresa, versao, status)
VALUES
    ('GPT-4o', 'OpenAI', '4o', 'ativo'),
    ('Claude', 'Anthropic', '3.5 Sonnet', 'ativo'),
    ('Gemini', 'Google', '1.5 Pro', 'ativo');


-- DESAFIOS
INSERT INTO desafios (titulo, descricao, categoria, data_limite, status)
VALUES
    (
        'Melhor prompt para resumo',
        'Crie um prompt capaz de gerar um resumo preciso de um texto.',
        'Texto',
        '2026-10-15 23:59:59',
        'aberto'
    ),
    (
        'Geracao de codigo SQL',
        'Crie um prompt para gerar uma consulta SQL correta.',
        'Programacao',
        '2026-10-20 23:59:59',
        'aberto'
    ),
    (
        'Analise de dados',
        'Crie um prompt para analisar um conjunto de dados.',
        'Dados',
        '2026-09-30 23:59:59',
        'finalizado'
    );


-- SUBMISSOES
INSERT INTO submissoes
    (usuario_id, desafio_id, modelo_id, prompt, resposta, nota)
VALUES
    (
        1, 1, 1,
        'Resuma o texto abaixo em 3 frases, mantendo apenas as informacoes principais.',
        'Resumo gerado pelo modelo...',
        92.50
    ),
    (
        2, 1, 2,
        'Faca um resumo curto destacando os pontos mais importantes.',
        'Resumo gerado pelo modelo...',
        78.00
    ),
    (
        3, 1, 1,
        'Resuma o texto sem perder informacoes importantes.',
        'Resumo gerado pelo modelo...',
        65.00
    ),
    (
        1, 2, 3,
        'Gere uma consulta SQL para encontrar os usuarios com maior pontuacao.',
        'SELECT * FROM usuarios ORDER BY pontos DESC;',
        95.00
    ),
    (
        2, 2, 1,
        'Crie uma consulta SQL que liste os usuarios ordenados por pontos.',
        'SELECT * FROM usuarios ORDER BY pontos DESC;',
        85.00
    ),
    (
        4, 3, 2,
        'Analise os dados e identifique os maiores valores.',
        'Os maiores valores encontrados foram...',
        72.00
    );