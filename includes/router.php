<?php

declare(strict_types=1);

const ALLOWED_METHODS = ['GET', 'POST'];
const INDEX_PAGE = 'index';
const PAGES = ['contact', 'guestbook'];

function normalizeUri(string $uri): string
{
    $uri = trim($uri, '/');
    return $uri === '' ? INDEX_PAGE : $uri;
}

function throw404(): void
{
    http_response_code(404);
    echo '404 Not Found';
}

function dispatch(string $uri, string $method): void
{
    $uri = normalizeUri($uri);
    var_dump($uri);
    var_dump($method);
    die;
}
