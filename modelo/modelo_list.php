<?php
use Banco\BD;

$bd = new BD("host", "database", "user", "password");
$bd->connect();
$modelos = $bd->list_modelos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="modelo-list">
        <?php foreach ($modelos as $modelo): ?>
            <div class="modelo-card">
                <h1><?= htmlspecialchars($modelo['nome']); ?></h1>
                <ul>
                    <li>Empresa: <?= htmlspecialchars($modelo['empresa']); ?></li>
                    <li>Versão: <?= htmlspecialchars($modelo['versao']); ?></li>
                    <li>Status: <?= htmlspecialchars($modelo['status']); ?></li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>