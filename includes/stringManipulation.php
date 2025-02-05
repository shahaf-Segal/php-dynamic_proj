<?php
function escapeHtmlString(string $message): string
{
    return htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
}
