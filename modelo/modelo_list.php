<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();

$modelos = $bd->list_modelos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelos</title>
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

        .modelo-list {
            width: 90%;
            max-width: 800px;

            margin: 50px auto;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;

            margin-bottom: 20px;
        }

        .btn-cadastrar {
            padding: 10px 16px;

            background: #2563eb;
            color: white;

            border: none;
            border-radius: 6px;

            text-decoration: none;
            font-size: 14px;

            transition: background 0.2s;
        }

        .btn-cadastrar:hover {
            background: #1d4ed8;
        }

        .modelo-card {
            background: #1e1e1e;
            border: 1px solid #333;
            border-radius: 10px;

            padding: 22px;
            margin-bottom: 16px;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .modelo-card h1 {
            margin: 0 0 18px;

            font-size: 22px;
            color: #f1f1f1;
        }

        .modelo-card ul {
            list-style: none;

            padding: 0;
            margin: 0;
        }

        .modelo-card li {
            padding: 10px 12px;

            border-bottom: 1px solid #333;

            color: #ccc;
        }

        .modelo-card li:last-child {
            border-bottom: none;
        }

        .modelo-card strong {
            color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="modelo-list">
        <div class="top-bar">
            <a class="btn-cadastrar" href="modelo_form.php">
                Cadastrar / Alterar Modelo
            </a>
        </div>
        <?php foreach ($modelos as $modelo): ?>
            <div class="modelo-card">
                <h1>
                    <?= htmlspecialchars($modelo['nome']); ?>
                </h1>
                <ul>
                    <li>
                        <strong>Empresa:</strong>
                        <?= htmlspecialchars($modelo['empresa']); ?>
                    </li>

                    <li>
                        <strong>Versão:</strong>
                        <?= htmlspecialchars($modelo['versao']); ?>
                    </li>

                    <li>
                        <strong>Status:</strong>
                        <?= htmlspecialchars($modelo['status']); ?>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
