<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();

$id = (int) $_GET['id'];
$desafio = $bd->get_desafio($id);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Desafio</title>

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

        .desafio-container {
            width: 90%;
            max-width: 700px;
            padding: 30px;
            background: #1e1e1e;
            border: 1px solid #333;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
        }

        h1 {
            margin: 0 0 25px;
            font-size: 28px;
        }

        .desafio-info {
            list-style: none;
            padding: 0;
            margin: 0 0 25px;
        }

        .desafio-info li {
            padding: 12px;
            border-bottom: 1px solid #333;
            color: #ccc;
        }

        .desafio-info li:last-child {
            border-bottom: none;
        }

        .desafio-info strong {
            color: #f1f1f1;
        }

        h2 {
            margin-bottom: 10px;
            font-size: 20px;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #aaa;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            color: #fff;
        }

        .descricao {
            padding: 15px;
            background: #121212;
            border: 1px solid #333;
            border-radius: 6px;
            color: #ccc;
            line-height: 1.6;
            white-space: normal;
            overflow-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="desafio-container">
        <h1>
            <?= htmlspecialchars($desafio['titulo']); ?>
        </h1>
        <ul class="desafio-info">
            <li>
                <strong>ID:</strong>
                #<?= htmlspecialchars($desafio['id']); ?>
            </li>

            <li>
                <strong>Categoria:</strong>
                <?= htmlspecialchars($desafio['categoria']); ?>
            </li>

            <li>
                <strong>Data limite:</strong>
                <?= htmlspecialchars($desafio['data_limite']); ?>
            </li>

            <li>
                <strong>Status:</strong>
                <?= htmlspecialchars($desafio['status']); ?>
            </li>
        </ul>
        <h2>Descrição</h2>
        <div class="descricao">
            <?= nl2br(htmlspecialchars($desafio['descricao'])); ?>
        </div>
        <a class="back-link" href="desafio_list.php">
            ← Voltar para desafios
        </a>
    </div>
</body>
</html>
