<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();
$usuarios = $bd->list_usuarios();
?>

<html>
<head>
    <title>Lista de Usuários</title>
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

        .usuario-list {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        .btn-cadastrar {
            display: block;
            width: fit-content;
            margin: 0 auto 25px;

            padding: 10px 18px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 6px;

            transition: background 0.2s;
        }

        .btn-cadastrar:hover {
            background: #1d4ed8;
        }

        .usuario-card {
            background: #1e1e1e;
            border: 1px solid #333;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .usuario-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .usuario-card li {
            padding: 10px 12px;
            border-bottom: 1px solid #333;
        }

        .usuario-card li:last-child {
            border-bottom: none;
        }

        .usuario-card li strong {
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="usuario-list">
        <h1>Usuários</h1>
        <a class="btn-cadastrar" href="usuario_form.php">
            Cadastrar Usuário
        </a>
        <?php foreach ($usuarios as $usuario): ?>
            <div class="usuario-card">
                <ul>
                    <li>
                        <strong>ID:</strong>
                        <?= htmlspecialchars($usuario['id']); ?>
                    </li>

                    <li>
                        <strong>Nome:</strong>
                        <?= htmlspecialchars($usuario['nome']); ?>
                    </li>

                    <li>
                        <strong>Nickname:</strong>
                        <?= htmlspecialchars($usuario['nickname']); ?>
                    </li>

                    <li>
                        <strong>Email:</strong>
                        <?= htmlspecialchars($usuario['email']); ?>
                    </li>

                    <li>
                        <strong>Pontos:</strong>
                        <?= htmlspecialchars($usuario['pontos']); ?>
                    </li>
                </ul>
            </div>

        <?php endforeach; ?>
    </div>
</body>
</html>
