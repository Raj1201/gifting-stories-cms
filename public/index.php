<?php
require_once __DIR__ . '/../includes/bootstrap.php';

// Preload dynamic data for the view; fallback defaults will still exist within the view.
$banners = cms_get_banners();
$mobile_categories = cms_get_mobile_categories();
$testimonials = cms_get_testimonials();
$products = cms_get_products();

// Render the exact original view (lightly instrumented for dynamic content).
require __DIR__ . '/home.php';
