<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();

if (isset($_POST['save_desafio'])) {
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $categoria = trim($_POST['categoria']);
    $data_limite = trim($_POST['data_limite']);

    $bd->save_desafio(
        $titulo,
        $descricao,
        $categoria,
        new DateTime($data_limite)
    );

    header("Location: desafio_list.php");
    exit();
}

if (isset($_POST['update_desafio'])) {
    $args = [
        'id' => $_POST['id'] ?? null,
        'titulo' => isset($_POST['titulo']) ? trim($_POST['titulo']) : null,
        'descricao' => isset($_POST['descricao']) ? trim($_POST['descricao']) : null,
        'categoria' => isset($_POST['categoria']) ? trim($_POST['categoria']) : null,
        'data_limite' => isset($_POST['data_limite']) ? trim($_POST['data_limite']) : null,
        'status' => isset($_POST['status']) ? trim($_POST['status']) : null
    ];

    $bd->update_desafio($args);

    header("Location: desafio_list.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .form-card {
            background: #1e1e1e;
            border: 1px solid #333;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        h1 {
            margin: 0 0 25px;
            font-size: 25px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #ccc;
            font-size: 14px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px 12px;
            background: #121212;
            color: #f1f1f1;
            border: 1px solid #444;
            border-radius: 6px;
            font-family: Arial, sans-serif;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
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
            margin-top: 20px;
            margin-bottom: 40px;
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
    <div class="container">
        <div class="form-card">
            <h1>Cadastrar Novo Desafio</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="titulo_cadastro">Título</label>
                    <input
                        id="titulo_cadastro"
                        name="titulo"
                        type="text"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="descricao_cadastro">Descrição</label>
                    <textarea
                        id="descricao_cadastro"
                        name="descricao"
                        required
                    ></textarea>
                </div>
                <div class="form-group">
                    <label for="categoria_cadastro">Categoria</label>
                    <input
                        id="categoria_cadastro"
                        name="categoria"
                        type="text"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="data_limite_cadastro">Data Limite</label>
                    <input
                        id="data_limite_cadastro"
                        name="data_limite"
                        type="datetime-local"
                        required
                    >
                </div>
                <button type="submit" name="save_desafio">
                    Salvar
                </button>
            </form>
        </div>
        <div class="form-card">
            <h1>Atualizar Desafio</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="id_update">ID</label>
                    <input
                        id="id_update"
                        name="id"
                        type="number"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="titulo_update">Título</label>
                    <input
                        id="titulo_update"
                        name="titulo"
                        type="text"
                    >
                </div>
                <div class="form-group">
                    <label for="descricao_update">Descrição</label>
                    <textarea
                        id="descricao_update"
                        name="descricao"
                    ></textarea>
                </div>
                <div class="form-group">
                    <label for="categoria_update">Categoria</label>
                    <input
                        id="categoria_update"
                        name="categoria"
                        type="text"
                    >
                </div>
                <div class="form-group">
                    <label for="data_limite_update">Data Limite</label>
                    <input
                        id="data_limite_update"
                        name="data_limite"
                        type="date"
                    >
                </div>
                <div class="form-group">
                    <label for="status_update">Status</label>
                    <select
                        name="status"
                        id="status_update"
                    >
                        <option value="">-- Não alterar --</option>
                        <option value="aberto">Aberto</option>
                        <option value="finalizado">Finalizado</option>
                    </select>
                </div>
                <button type="submit" name="update_desafio">
                    Atualizar
                </button>
            </form>
        </div>
        <a class="back-link" href="desafio_list.php">
            ← Voltar para desafios
        </a>
    </div>
</body>
</html>
