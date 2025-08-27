<?php
require_once __DIR__ . '/db.php';

function cms_setting($key, $default = null) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT `value` FROM settings WHERE `key` = ? LIMIT 1');
    $stmt->execute([$key]);
    $row = $stmt->fetch();
    return $row ? $row['value'] : $default;
}

function cms_set_setting($key, $value) {
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO settings(`key`,`value`) VALUES(?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)');
    return $stmt->execute([$key, $value]);
}

// === Content fetchers ===
function cms_get_banners() {
    global $pdo;
    $stmt = $pdo->query('SELECT id, desktop_image, mobile_image, link_url FROM banners WHERE active = 1 ORDER BY sort_order ASC, id ASC');
    return $stmt->fetchAll();
}

function cms_get_mobile_categories() {
    global $pdo;
    $stmt = $pdo->query('SELECT id, image_url, label, link_url FROM mobile_categories WHERE active = 1 ORDER BY sort_order ASC, id ASC');
    return $stmt->fetchAll();
}

function cms_get_testimonials() {
    global $pdo;
    $stmt = $pdo->query('SELECT id, quote, author FROM testimonials WHERE active = 1 ORDER BY sort_order ASC, id ASC');
    return $stmt->fetchAll();
}

function cms_get_products() {
    global $pdo;
    $stmt = $pdo->query('SELECT id, name, description, price, image_url FROM products WHERE active = 1 ORDER BY sort_order ASC, id ASC');
    return $stmt->fetchAll();
}
