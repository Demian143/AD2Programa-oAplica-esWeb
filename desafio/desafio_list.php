<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();

$desafios = $bd->list_desafios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Desafios</title>

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

        .btn-cadastrar,
        .btn-visualizar {
            display: inline-block;

            padding: 10px 16px;

            background: #2563eb;
            color: white;

            border-radius: 6px;

            text-decoration: none;
            font-size: 14px;

            transition: background 0.2s;
        }

        .btn-cadastrar:hover,
        .btn-visualizar:hover {
            background: #1d4ed8;
        }

        .desafio-card {
            background: #1e1e1e;

            border: 1px solid #333;
            border-radius: 10px;

            padding: 25px;
            margin-bottom: 18px;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .desafio-card h2 {
            margin: 0 0 20px;

            font-size: 22px;
            color: #f1f1f1;
        }

        .desafio-card ul {
            list-style: none;

            padding: 0;
            margin: 20px 0 0;
        }

        .desafio-card li {
            padding: 10px 12px;

            border-bottom: 1px solid #333;

            color: #ccc;
        }

        .desafio-card li:last-child {
            border-bottom: none;
        }

        .desafio-card strong {
            color: #f1f1f1;
        }

        .btn-visualizar {
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h1>Desafios</h1>

            <a class="btn-cadastrar" href="desafio_form.php">
                Cadastrar Desafio
            </a>
        </div>

        <?php foreach ($desafios as $desafio): ?>

            <div class="desafio-card">

                <h2>
                    <?= htmlspecialchars($desafio['titulo']); ?>
                </h2>

                <a
                    class="btn-visualizar"
                    href="desafio_view.php?id=<?= urlencode($desafio['id']); ?>"
                >
                    Visualizar detalhes
                </a>

                <ul>
                    <li>
                        <strong>ID:</strong>
                        <?= htmlspecialchars($desafio['id']); ?>
                    </li>

                    <li>
                        <strong>Categoria:</strong>
                        <?= htmlspecialchars($desafio['categoria']); ?>
                    </li>

                    <li>
                        <strong>Data Limite:</strong>
                        <?= htmlspecialchars($desafio['data_limite']); ?>
                    </li>

                    <li>
                        <strong>Status:</strong>
                        <?= htmlspecialchars($desafio['status']); ?>
                    </li>
                </ul>

            </div>

        <?php endforeach; ?>

    </div>

</body>
</html>