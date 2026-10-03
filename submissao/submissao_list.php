<?php
use Banco\BD;

$bd = new BD("host", "database", "user", "password");
$bd->connect();
$submissoes = $bd->list_submissoes();
?>
<html>
    <div class="submissao-list">
        <div class="submissao-card">
            <ul>
                <?php foreach ($submissoes as $submissao): ?>
                            <li>ID: <?= htmlspecialchars($submissao['id']); ?></li>
                            <li>Desafio: <?= htmlspecialchars($submissao['desafio_id']); ?></li>
                            <li>Usuario: <?= htmlspecialchars($submissao['usuario_id']); ?></li>
                            <li>Modelo: <?= htmlspecialchars($submissao['modelo_id']); ?></li>
                            <li>Nota: <?= htmlspecialchars($submissao['nota']); ?></li>
                            <li>Data de submissão: <?= htmlspecialchars($submissao['data_submissao']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</html>