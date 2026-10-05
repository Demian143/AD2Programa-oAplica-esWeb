<?php
require_once __DIR__ . '/../banco/BD.php';

use Banco\BD;

$bd = new BD("host", "database", "user", "password");
$bd->connect();
$desafios = $bd->list_desafios();
?>
<html>
    <div class="desafio-list">
        <?php foreach ($desafios as $desafio): ?>
            <div class="desafio-card">
                <h1><?= htmlspecialchars($desafio['titulo']); ?></h1><br>
                <a href="desafio_view.php?id=<?php echo urlencode($desafio['id']);?>">
                    <button type="button">Visualizar detalhes</button>
                </a>
                <ul>
                    <li>ID: <?= htmlspecialchars($desafio['id']); ?></li>
                    <li>Categoria: <?= htmlspecialchars($desafio['categoria']); ?></li>
                    <li>Data Limite: <?= htmlspecialchars($desafio['data_limite']); ?></li>
                    <li>Status: <?= htmlspecialchars($desafio['status']); ?></li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</html>