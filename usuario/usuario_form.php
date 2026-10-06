<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();

if (isset($_POST['save_usuario'])) {
    $nome = trim($_POST['nome']);
    $nickname = trim($_POST['nickname']);
    $email = trim($_POST['email']);

    $bd->save_usuario($nome, $nickname, $email);

    header("Location: usuario_list.php");
    exit();
}
?>
<html>
<head>
    <title>Cadastrar Usuário</title>

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

        .form-container {
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

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;

            color: #ccc;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 11px 12px;

            background: #121212;
            color: #f1f1f1;

            border: 1px solid #444;
            border-radius: 6px;

            font-size: 15px;
            outline: none;

            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #2563eb;
        }

        button {
            width: 100%;
            padding: 11px;

            background: #2563eb;
            color: white;

            border: none;
            border-radius: 6px;

            font-size: 15px;
            cursor: pointer;

            transition: background 0.2s;
        }

        button:hover {
            background: #1d4ed8;
        }

        .back-link {
            display: block;
            margin-top: 18px;

            text-align: center;

            color: #aaa;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Cadastrar Novo Usuário</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input
                    id="nome"
                    name="nome"
                    type="text"
                    required
                >
            </div>
            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input
                    id="nickname"
                    name="nickname"
                    type="text"
                    required
                >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                >
            </div>
            <button type="submit" name="save_usuario">
                Salvar
            </button>
        </form>
        <a class="back-link" href="usuario_list.php">
            ← Voltar para usuários
        </a>
    </div>
</body>
</html>
