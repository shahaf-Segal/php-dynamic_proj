<?php

declare(strict_types=1);
function renderView(string $file): void
{
    include TEMPLATES_DIR . '/header.php';
    include TEMPLATES_DIR . '/nav.php';
    include TEMPLATES_DIR . '/flash.php';
    include  $file;
    include TEMPLATES_DIR . '/footer.php';
}
