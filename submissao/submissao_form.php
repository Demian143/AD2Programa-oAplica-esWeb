<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();

if (isset($_POST['save_submissao'])) {
    $usuario_id = $_POST['usuario_id'];
    $desafio_id = $_POST['desafio_id'];
    $modelo_id = $_POST['modelo_id'];
    $prompt = trim($_POST['prompt']);
    $resposta = trim($_POST['resposta']);
    $nota = $_POST['nota'];
    

    $bd->save_submissao(
        $usuario_id,
        $desafio_id,
        $modelo_id,
        $prompt,
        $resposta,
        $nota
    );

    header("Location: submissao_list.php");
    exit();
}
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

        .btn-voltar {
            padding: 10px 16px;
            background: #333;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.2s;
        }

        .btn-voltar:hover {
            background: #444;
        }

        .form-card {
            background: #1e1e1e;
            border: 1px solid #333;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .form-card h2 {
            margin: 0 0 20px;
            font-size: 22px;
            color: #f1f1f1;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #ccc;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            background: #121212;
            color: #f1f1f1;
            border: 1px solid #444;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        .btn-salvar {
            width: 100%;
            padding: 11px 16px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-salvar:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h1>Submissões</h1>
            <a class="btn-voltar" href="submissao_list.php">
                Voltar
            </a>
        </div>
        <div class="form-card">
            <h2>Cadastrar Nova Submissão</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="usuario_id">
                        ID do Usuário
                    </label>
                    <input
                        id="usuario_id"
                        name="usuario_id"
                        type="number"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="desafio_id">
                        ID do Desafio
                    </label>
                    <input
                        id="desafio_id"
                        name="desafio_id"
                        type="number"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="modelo_id">
                        ID do Modelo
                    </label>
                    <input
                        id="modelo_id"
                        name="modelo_id"
                        type="number"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="prompt">
                        Prompt
                    </label>
                    <textarea
                        id="prompt"
                        name="prompt"
                        required
                    ></textarea>
                </div>
                <div class="form-group">
                    <label for="nota">
                        Nota
                    </label>
                    <input
                        id="nota"
                        name="nota"
                        type="number"
                        step="0.01"
                        min="0"
                        max="100"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="resposta">
                        Resposta
                    </label>
                    <textarea
                        id="resposta"
                        name="resposta"
                        required
                    ></textarea>
                </div>
                <button
                    class="btn-salvar"
                    type="submit"
                    name="save_submissao"
                >
                    Salvar Submissão
                </button>
            </form>
        </div>
    </div>
</body>
</html>
