<?php
$entries = getMessages(dbConnect());
?>

<section>
    <h2>Guestbook</h1>
        <?php if (empty($entries)): ?>
            <p>No entries yet</p>
            <a href="/contact">Be the first to leave a message</a>
        <?php else: ?>
            <?php foreach ($entries as $entry): ?>
                <h4>
                    from:
                    <?= htmlspecialchars($entry['name']) ?>
                </h4>
                <p>
                    message:
                    <?= nl2br(htmlspecialchars($entry['message'])) ?>
                </p>
                <small>
                    <?php echo $entry['created_at']; ?>
                </small>
            <?php endforeach; ?>
        <?php endif; ?>
</section>