<?php

declare(strict_types=1);

require_once './bootstrap.php';

session_start();

dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
