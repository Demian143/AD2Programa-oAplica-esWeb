<?php
use Banco\BD;

$bd = new BD("host", "database", "user", "password");
$bd->connect();

if (isset($_POST['save_modelo'])) {
    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $versao = $_POST['versao'];
    $bd->save_modelo($nome, $empresa, $versao);
    header("Location: modelo_list.php");
    exit();
}
?>
<html>
    <h1>Cadastrar Novo Modelo</h1>
    <form method="POST">
        <label for="nome">Nome</label><br>
        <input id="nome" name="nome" type="text" required>
        <label for="empresa">Empresa</label><br>
        <input id="empresa" name="empresa" type="text" required>
        <label for="versao">Versão</label><br>
        <input id="versao" name="versao" type="text" required>
        <input id="resposta" name="resposta" type="text" required>
        <button type="submit" name="save_modelo">Salvar</button>
    </form>
</html>