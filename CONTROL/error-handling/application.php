<?php
/** Shared, user-safe controller loader for PHP frontend pages. */

function load_controller(string $controller): array
{
    global $conn;
    try {
        if (!isset($conn) && isset($GLOBALS['conn'])) {
            $conn = $GLOBALS['conn'];
        }
        $result = require $controller;
        return ['data' => $result, 'error' => null];
    } catch (Throwable $exception) {
        error_log(sprintf('Smart Campus controller error: %s', $exception->getMessage()));
        return ['data' => [], 'error' => 'We could not load this information right now. Please try again later.'];
    }
}

function h(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
