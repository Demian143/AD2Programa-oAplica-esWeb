<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();

if (isset($_POST['save_modelo'])) {
    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $versao = $_POST['versao'];
    $bd->save_modelo($nome, $empresa, $versao);
    header("Location: modelo_list.php");
    exit();
}
if (isset($_POST['update_modelo'])) {
    $args = [
        'id' => $_POST['id'] ?? null,
        'nome' => $_POST['nome'] ?? null,
        'empresa' => $_POST['empresa'] ?? null,
        'versao' => $_POST['versao'] ?? null,
        'status' => $_POST['status'] ?? null
    ];
    $clean_data = array_filter($args, function ($value) {
        return $value !== null && $value !== '';
    });
    $bd->update_modelo($clean_data);
    header("Location: modelo_list.php");
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
    <h1>Cadastrar Novo Modelo</h1>
    <form method="POST">
        <label for="nome">Nome</label><br>
        <input id="nome" name="nome" type="text" required>
        <label for="empresa">Empresa</label><br>
        <input id="empresa" name="empresa" type="text" required>
        <label for="versao">Versão</label><br>
        <input id="versao" name="versao" type="text" required>
        <button type="submit" name="save_modelo">Salvar</button>
    </form><br>
    <h1>Alterar Modelo</h1>
    <form method="POST">
        <label for="id">ID</label><br>
        <input id="id" name="id" type="number" required>
        <label for="nome">Nome</label><br>
        <input id="nome" name="nome" type="text">
        <label for="empresa">Empresa</label><br>
        <input id="empresa" name="empresa" type="text">
        <label for="versao">Versão</label><br>
        <input id="versao" name="versao" type="text">
        <label for="status">Status</label><br>
        <select name="status" id="status">
            <option value="">-- Não alterar --</option>
            <option value="ativo">ativo</option>
            <option value="inativo">inativo</option>
        </select>
        <button type="submit" name="update_modelo">Atualizar</button>
    </form>
</body>
</html>