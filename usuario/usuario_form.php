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
    <h1>Cadastrar Novo Usuario</h1>
    <form method="POST">
        <label for="nome">Nome</label><br>
        <input id="nome" name="nome" type="text" required>
        <label for="nickname">Nickname</label><br>
        <input id="nickname" name="nickname" type="text" required>
        <label for="email">Email</label><br>
        <input id="email" name="email" type="email" required>
        <button type="submit" name="save_usuario">Salvar</button>
    </form>
</html>