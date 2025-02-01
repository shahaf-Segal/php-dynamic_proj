<?php

declare(strict_types=1);

require_once __DIR__ . '/../bootstrap.php';
loadSchema(
    dbConnect(),
    DB_DIR . '/schema.sql'
);
