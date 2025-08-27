<?php
// One-time script to create the first admin user.
// 1) Edit $username and $password below.
// 2) Upload to /admin/create_admin.php and open it once in the browser.
// 3) Delete this file from the server.
require_once __DIR__ . '/../includes/bootstrap.php';

$username = 'admin';
$password = 'changeme123'; // CHANGE THIS BEFORE RUNNING

$hash = password_hash($password, PASSWORD_BCRYPT);
$stmt = $pdo->prepare('INSERT INTO users(username, password_hash) VALUES (?, ?)');
try {
    $stmt->execute([$username, $hash]);
    echo 'Admin user created: ' . htmlspecialchars($username) . '<br>Remember to DELETE this file now.';
} catch (Exception $e) {
    echo 'Error: ' . htmlspecialchars($e->getMessage());
}
