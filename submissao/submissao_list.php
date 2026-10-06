<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();

$submissoes = $bd->list_submissoes();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Submissões</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            background: #121212;
            color: #f1f1f1;

            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            max-width: 800px;

            margin: 50px auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 25px;
        }

        .top-bar h1 {
            margin: 0;

            font-size: 28px;
            color: #f1f1f1;
        }

        .btn-cadastrar {
            display: inline-block;

            padding: 10px 16px;

            background: #2563eb;
            color: white;

            border-radius: 6px;

            text-decoration: none;
            font-size: 14px;

            transition: background 0.2s;
        }

        .btn-cadastrar:hover {
            background: #1d4ed8;
        }

        .submissao-card {
            background: #1e1e1e;

            border: 1px solid #333;
            border-radius: 10px;

            padding: 25px;
            margin-bottom: 18px;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .submissao-card ul {
            list-style: none;

            padding: 0;
            margin: 0;
        }

        .submissao-card li {
            padding: 10px 12px;

            border-bottom: 1px solid #333;

            color: #ccc;
        }

        .submissao-card li:last-child {
            border-bottom: none;
        }

        .submissao-card strong {
            color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h1>Submissões</h1>

            <a class="btn-cadastrar" href="submissao_form.php">
                Nova Submissão
            </a>
        </div>
        <div class="submissao-list">
            <?php foreach ($submissoes as $submissao): ?>
                <div class="submissao-card">

                    <ul>
                        <li>
                            <strong>ID:</strong>
                            <?= htmlspecialchars($submissao['id']); ?>
                        </li>

                        <li>
                            <strong>Desafio:</strong>
                            <?= htmlspecialchars($submissao['desafio_id']); ?>
                        </li>

                        <li>
                            <strong>Usuário:</strong>
                            <?= htmlspecialchars($submissao['usuario_id']); ?>
                        </li>

                        <li>
                            <strong>Modelo:</strong>
                            <?= htmlspecialchars($submissao['modelo_id']); ?>
                        </li>

                        <li>
                            <strong>Nota:</strong>
                            <?= htmlspecialchars($submissao['nota']); ?>
                        </li>

                        <li>
                            <strong>Data de submissão:</strong>
                            <?= htmlspecialchars($submissao['data_submissao']); ?>
                        </li>
                    </ul>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>