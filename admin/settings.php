<?php
require_once __DIR__ . '/partials/_header.php';
require_once __DIR__ . '/../includes/csrf.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();
    cms_set_setting('curated_title', $_POST['curated_title'] ?? '');
    cms_set_setting('curated_subtitle', $_POST['curated_subtitle'] ?? '');
    $msg = 'Settings saved.';
}

$curated_title = cms_setting('curated_title', 'Elegant Gifts for Every Celebration');
$curated_subtitle = cms_setting('curated_subtitle', 'Explore premium gift hampers thoughtfully curated to suit every occasion, with gourmet delights, elegant packaging, and a personal touch that makes every gift memorable.');
?>
<h1 class="text-2xl font-semibold mb-6">Settings</h1>
<?php if ($msg): ?><div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-900 rounded"><?php echo htmlspecialchars($msg); ?></div><?php endif; ?>
<form method="post" class="bg-white p-4 rounded shadow max-w-3xl">
  <?php csrf_input(); ?>
  <div class="mb-4">
    <label class="block text-sm mb-1">Curated Section Title</label>
    <input name="curated_title" class="border rounded w-full p-2" value="<?php echo htmlspecialchars($curated_title); ?>">
  </div>
  <div class="mb-4">
    <label class="block text-sm mb-1">Curated Section Subtitle</label>
    <textarea name="curated_subtitle" class="border rounded w-full p-2" rows="3"><?php echo htmlspecialchars($curated_subtitle); ?></textarea>
  </div>
  <button class="bg-gray-900 text-white px-4 py-2 rounded">Save</button>
</form>
<?php require_once __DIR__ . '/partials/_footer.php'; ?>
