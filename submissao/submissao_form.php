<?php
use Banco\BD;

$bd = new BD("host", "database", "user", "password");
$bd->connect();

if (isset($_POST['save_submissao'])) {
    $usuario_id = $_POST['usuario_id'];
    $desafio_id = $_POST['desafio_id'];
    $modelo_id = $_POST['modelo_id'];
    $prompt = trim($_POST['prompt']);
    $resposta = trim($_POST['resposta']);
    $bd->save_submissao($usuario_id, $desafio_id, $modelo_id, $prompt, $resposta);
    header("Location: submissao_list.php");
    exit();
}
?>
<html>
    <h1>Cadastrar Nova Submissão</h1>
    <form method="POST">
        <label for="usuario_id">ID Do Usuario</label><br>
        <input id="usuario_id" name="usuario_id" type="number" required>
        <label for="desafio_id">ID Do Desafio</label><br>
        <input id="desafio_id" name="desafio_id" type="number" required>
        <label for="modelo_id">ID Do Modelo</label><br>
        <input id="modelo_id" name="modelo_id" type="number" required>
        <label for="prompt">Prompt</label><br>
        <input id="prompt" name="prompt" type="text" required>
        <label for="resposta">Resposta</label><br>
        <input id="resposta" name="resposta" type="text" required>
        <button type="submit" name="save_submissao">Salvar</button>
    </form>
</html>