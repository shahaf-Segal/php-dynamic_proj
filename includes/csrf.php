<?php

declare(strict_types=1);

const CSRF_TOKEN_LENGTH = 32;
const CSRF_TOKEN_SECONDS = 60 * 30;




function generateCsrfToken(): string
{
    $token = bin2hex(random_bytes(CSRF_TOKEN_LENGTH));
    setCsrfSessionToken($token);
    return $token;
}

function setCsrfSessionToken($token): void
{
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_expires'] = time() + CSRF_TOKEN_SECONDS;
}

function getCsrfTokenAndTime(): array
{
    return [
        $_SESSION['csrf_token'] ?? null,
        $_SESSION['csrf_token_expires'] ?? null,
    ];
}

function isTokenExpired(?int $time): bool
{
    return $time === null || (time() - $time) > CSRF_TOKEN_SECONDS;
}
function isCsrfValueValid(?string $token): bool
{
    if (null === $token) {
        return false;
    }
    return strlen($token) == (CSRF_TOKEN_LENGTH * 2);
}

function isCsrfTokenValid(?string $token, ?int $time): bool
{
    return isCsrfValueValid($token) && !isTokenExpired($time);
}

function validateCsrfTokenFromValue(string $token): bool
{
    [$sessionToken, $sessionTime] = getCsrfTokenAndTime();
    return isCsrfTokenValid($token, $sessionTime) && hash_equals($token, $sessionToken);
}


function getCsrfToken(): string
{
    [$token, $time] = getCsrfTokenAndTime();
    $is_csrf_valid = isCsrfTokenValid($token, $time);

    if (!$is_csrf_valid) {
        $token = generateCsrfToken();
    }

    return $token;
}
