<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/csrf.php';
if (is_logged_in()) { header('Location: ' . BASE_URL . 'admin/index.php'); exit; }
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();
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
$page_title = 'Login - Admin';
include __DIR__ . '/partials/_auth_header.php';
?>
  <div class="min-h-screen flex items-center justify-center">
    <form method="post" class="bg-white p-8 rounded shadow w-full max-w-sm">
      <?php csrf_input(); ?>
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
<?php include __DIR__ . '/partials/_auth_footer.php'; ?>
