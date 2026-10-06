<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prompt Battle</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #121212;
            color: #f1f1f1;

            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            max-width: 500px;

            padding: 30px;

            background: #1e1e1e;
            border: 1px solid #333;
            border-radius: 10px;

            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
        }

        h1 {
            margin: 0 0 25px;

            text-align: center;
            font-size: 26px;
        }

        .links {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .links a {
            display: block;

            padding: 13px 15px;

            background: #252525;
            border: 1px solid #3a3a3a;
            border-radius: 6px;

            color: #f1f1f1;
            text-decoration: none;

            transition:
                background 0.2s,
                border-color 0.2s,
                transform 0.2s;
        }

        .links a:hover {
            background: #2f2f2f;
            border-color: #2563eb;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listas Disponíveis</h1>
        <div class="links">
            <a href="usuario/usuario_list.php">
                Usuários
            </a>

            <a href="submissao/submissao_list.php">
                Submissões
            </a>

            <a href="modelo/modelo_list.php">
                Modelos
            </a>

            <a href="desafio/desafio_list.php">
                Desafios
            </a>
        </div>
    </div>
</body>
</html>
