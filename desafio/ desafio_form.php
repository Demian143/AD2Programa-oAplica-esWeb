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
?>
<html>
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
</html>