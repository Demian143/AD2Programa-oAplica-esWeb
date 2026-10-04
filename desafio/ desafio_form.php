<?php
use Banco\BD;

$bd = new BD("host", "database", "user", "password");
$bd->connect();

if (isset($_POST['save_desafio'])) {
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $categoria = trim($_POST['categoria']);
    $data_limite = trim($_POST['data_limite']);
    $bd->save_desafio($titulo, $descricao, $categoria, new DateTime($data_limite));
    header("Location: desafio_list.php");
    exit();
}
if (isset($_POST['update_desafio'])) {
    $args = [
        'id' => $_POST['id'] ?? null,
        'titulo' => trim($_POST['titulo']) ?? null,
        'descricao' => trim($_POST['descricao']) ?? null,
        'categoria' => trim($_POST['categoria']) ?? null,
        'data_limite' => trim($_POST['data_limite']) ?? null
    ];
    $bd->update_desafio($args);
    header("Location: desafio_list.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastrar Novo Desafio</h1>
    <form method="POST">
        <label for="titulo">Titulo</label><br>
        <input id="titulo" name="titulo" type="text" required>
        <label for="descricao">Descricao</label><br>
        <input id="descricao" name="descricao" type="text" required>
        <label for="categoria">Categoria</label><br>
        <input id="categoria" name="categoria" type="text" required>
        <label for="data_limite">Data Limite</label><br>
        <input id="data_limite" name="data_limite" type="datetime-local" required>
        <button type="submit" name="save_desafio">Salvar</button>
    </form>
    <h1>Atualizar Desafio</h1>
    <form method="POST">
        <label for="id">ID</label><br>
        <input id="id" name="id" type="number" required>
        <label for="titulo">Titulo</label><br>
        <input id="titulo" name="titulo" type="text">
        <label for="descricao">Descricao</label><br>
        <input id="descricao" name="descricao" type="text">
        <label for="categoria">Categoria</label><br>
        <input id="categoria" name="categoria" type="text">
        <label for="data_limite">Data Limite</label><br>
        <input id="data_limite" name="data_limite" type="datetime-local">
        <label for="status">Status</label><br>
        <select name="status" id="status">
            <option value="">-- Não alterar --</option>
            <option value="aberto">aberto</option>
            <option value="finalizado">finalizado</option>
        </select>
        <button type="submit" name="update_desafio">Salvar</button>
    </form>
</body>
</html>
