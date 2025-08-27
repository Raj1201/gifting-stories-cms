<?php
require_once __DIR__ . '/../../includes/bootstrap.php';
require_login();
include __DIR__ . '/_auth_header.php';
?>
  <nav class="bg-gray-900 text-white">
    <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
      <div class="font-semibold">Gifting Stories - Admin</div>
      <div class="space-x-4 text-sm">
        <a class="hover:underline" href="<?php echo BASE_URL; ?>admin/index.php">Dashboard</a>
        <a class="hover:underline" href="<?php echo BASE_URL; ?>admin/manage.php?resource=banners">Banners</a>
        <a class="hover:underline" href="<?php echo BASE_URL; ?>admin/manage.php?resource=mobile_categories">
          Mobile Categories
        </a>
        <a class="hover:underline" href="<?php echo BASE_URL; ?>admin/manage.php?resource=testimonials">Testimonials</a>
        <a class="hover:underline" href="<?php echo BASE_URL; ?>admin/manage.php?resource=products">Products</a>
        <a class="hover:underline" href="<?php echo BASE_URL; ?>admin/settings.php">Settings</a>
        <a class="hover:underline" href="<?php echo BASE_URL; ?>admin/logout.php">Logout</a>
      </div>
    </div>
  </nav>
  <main class="max-w-6xl mx-auto p-4">
