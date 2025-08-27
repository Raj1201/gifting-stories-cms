<?php
require_once __DIR__ . '/../includes/bootstrap.php';
logout();
header('Location: ' . BASE_URL . 'admin/login.php');
exit;
