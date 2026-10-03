<?php
use Banco\BD;

$bd = new BD("host", "database", "user", "password");
$bd->connect();
$modelos = $bd->list_modelos();
?>
<html>
    <div class="modelo-list">
        <?php foreach ($modelos as $modelo): ?>
            <div class="modelo-card">
                <h1><?= htmlspecialchars($submissao['nome']); ?></h1>
                <ul>
                    <li>Empresa: <?= htmlspecialchars($submissao['empresa']); ?></li>
                    <li>Versão: <?= htmlspecialchars($submissao['versao']); ?></li>
                    <li>Status: <?= htmlspecialchars($submissao['status']); ?></li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</html>