<?php

declare(strict_types=1);

const ALLOWED_METHODS = ['GET', 'POST'];
const INDEX_PAGE = 'index';
const ROUTES_DIR = __DIR__ . '/../routes';
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

function throw404(): void
{
    http_response_code(404);
    echo '404 Not Found';
    die;
}

function dispatch(string $uri, string $method): void
{
    if (!in_array($method, ALLOWED_METHODS)) {
        throw404();
    }
    $filePath = getFilePath($uri, $method);
    if (file_exists($filePath)) {
        include($filePath);
    } else {
        throw404();
    }
    die;
}
