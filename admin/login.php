<?php
require_once __DIR__ . '/../includes/bootstrap.php';
if (is_logged_in()) { header('Location: ' . BASE_URL . 'admin/index.php'); exit; }
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        if (login($_POST['username'], $_POST['password'])) {
            header('Location: ' . BASE_URL . 'admin/index.php');
            exit;
        } else {
            $error = 'Invalid credentials';
        }
    } else {
        $error = 'Username and password are required';
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login · Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <div class="min-h-screen flex items-center justify-center">
    <form method="post" class="bg-white p-8 rounded shadow w-full max-w-sm">
      <h1 class="text-xl font-semibold mb-4">Admin Login</h1>
      <?php if ($error): ?><div class="text-red-600 text-sm mb-2"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
      <div class="mb-4">
        <label class="block text-sm mb-1">Username</label>
        <input name="username" class="border rounded w-full p-2" required>
      </div>
      <div class="mb-4">
        <label class="block text-sm mb-1">Password</label>
        <input name="password" type="password" class="border rounded w-full p-2" required>
      </div>
      <button class="bg-gray-900 text-white px-4 py-2 rounded w-full">Login</button>
    </form>
  </div>
</body>
</html>
