<?php
require_once __DIR__ . '/../banco/bd.php';

use Banco\BD;

$bd = new BD();
$bd->connect();

$id = (int) $_GET['id'];
$desafio = $bd->get_desafio($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio View</title>
</head>
<body>
    <div>
        <h1><?php htmlspecialchars($desafio['titulo']);?></h1>
        <ul>
            <li>ID: #<?php htmlspecialchars($desafio['descricao']);?></li>
            <li>Categoria: <?php htmlspecialchars($desafio['categoria']);?></li>
            <li>Data limite <?php htmlspecialchars($desafio['data_limite']);?></li>
        </ul>
        <h2>Descrição</h2>
        <textarea name="descricao" id="descricao">
            <?php htmlspecialchars($desafio['descricao']);?>
        </textarea>
    </div>
</body>
</html>