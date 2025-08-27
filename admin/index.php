<?php
require_once __DIR__ . '/partials/_header.php';
?>
<h1 class="text-2xl font-semibold mb-6">Dashboard</h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  <a href="<?php echo BASE_URL; ?>admin/manage.php?resource=banners" class="block p-4 rounded bg-white shadow hover:shadow-md">
    <div class="font-semibold mb-1">Banners</div>
    <div class="text-sm text-gray-600">Manage home hero slider images (desktop/mobile/links).</div>
  </a>
  <a href="<?php echo BASE_URL; ?>admin/manage.php?resource=mobile_categories" class="block p-4 rounded bg-white shadow hover:shadow-md">
    <div class="font-semibold mb-1">Mobile Categories</div>
    <div class="text-sm text-gray-600">Manage the top mobile slider items (image/label/link).</div>
  </a>
  <a href="<?php echo BASE_URL; ?>admin/manage.php?resource=testimonials" class="block p-4 rounded bg-white shadow hover:shadow-md">
    <div class="font-semibold mb-1">Testimonials</div>
    <div class="text-sm text-gray-600">Edit customer quotes shown on the home page.</div>
  </a>
  <a href="<?php echo BASE_URL; ?>admin/manage.php?resource=products" class="block p-4 rounded bg-white shadow hover:shadow-md">
    <div class="font-semibold mb-1">Products Grid</div>
    <div class="text-sm text-gray-600">Control the “Our Complete Collection” cards.</div>
  </a>
  <a href="<?php echo BASE_URL; ?>admin/settings.php" class="block p-4 rounded bg-white shadow hover:shadow-md">
    <div class="font-semibold mb-1">Settings</div>
    <div class="text-sm text-gray-600">Edit home page titles/subtitles.</div>
  </a>
</div>
<?php require_once __DIR__ . '/partials/_footer.php'; ?>
