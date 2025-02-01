<?php

declare(strict_types=1);
require_once __DIR__ . '/view.php';
require_once __DIR__ . '/response.php';

const ALLOWED_METHODS = ['GET', 'POST'];
const INDEX_PAGE = 'index';
const PAGES = ['contact', 'guestbook'];

function normalizeUri(string $uri): string
{
    $uri = strtolower(trim($uri, '/'));
    return $uri === '' ? INDEX_PAGE : $uri;
}

function getFilePath(string $uri, string $method): string
{
    $uri = normalizeUri($uri);
    return ROUTES_DIR . "/{$uri}_{$method}.php";
}



function dispatch(string $uri, string $method): void
{
    if (!in_array($method, ALLOWED_METHODS)) {
        throw404();
    }
    $filePath = getFilePath($uri, $method);
    if (file_exists($filePath)) {
        renderView($filePath);
    } else {
        throw404();
    }
    die;
}
