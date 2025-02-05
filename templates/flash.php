<?php $messages = getFlashMessages(); ?>

<?php if (!empty($messages)): ?>
    <ul class="flash-messages-list">
        <?php foreach ($messages as $type => $message): ?>
            <li class="flash-message flash-<?= htmlspecialchars($type) ?>"><?= escapeHtmlString($message) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>