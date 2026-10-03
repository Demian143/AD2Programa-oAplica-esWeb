<?php
use Banco\BD;

$bd = new BD("host", "database", "user", "password");
$bd->connect();
$usuarios = $bd->list_usuarios();
?>
<html>
    <div class="usuario-list">
        <a href="./usuario_form.php">
            <button type="button">Cadastrar Usuario</button>
        </a>
        <div class="usuario-card">
            <ul>
                <?php foreach ($usuarios as $usuario): ?>
                            <li>ID: <?= htmlspecialchars($usuario['id']); ?></li>
                            <li>Nome: <?= htmlspecialchars($usuario['nome']); ?></li>
                            <li>Nickname: <?= htmlspecialchars($usuario['nickname']); ?></li>
                            <li>Email: <?= htmlspecialchars($usuario['email']); ?></li>
                            <li>Pontos: <?= htmlspecialchars($usuario['pontos']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</html>