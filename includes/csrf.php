<?php
// Minimal CSRF utilities
function csrf_token() {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_input() {
    $t = htmlspecialchars(csrf_token());
    echo '<input type="hidden" name="csrf_token" value="' . $t . '">';
}

function csrf_verify() {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
        http_response_code(400);
        die('Invalid CSRF token.');
    }
}
