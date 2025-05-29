<?php if ($data['person']): ?>
    <div class="result">
        <p><?= htmlspecialchars($data['message']) ?></p>
        <p><strong>Nome:</strong> <?= htmlspecialchars($data['person']->getName()) ?></p>
        <p><strong>NIS:</strong> <?= htmlspecialchars($data['person']->getNis()) ?></p>
    </div>
<?php else: ?>
    <div class="error"><?= htmlspecialchars($data['message']) ?></div>
<?php endif; ?>

<a href="/index.php">Voltar</a>
