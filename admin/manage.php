<?php
require_once '../includes/bootstrap.php';
require_login();
require_once __DIR__ . '/../includes/csrf.php';

$resources = [
  'banners' => [
    'table' => 'banners',
    'title' => 'Banners',
    'fields' => [
      'desktop_image' => ['label' => 'Desktop Image (filename only, from /images)', 'type' => 'text'],
      'mobile_image'  => ['label' => 'Mobile Image (filename only, from /images)',  'type' => 'text'],
      'link_url'      => ['label' => 'Link URL (optional)', 'type' => 'text'],
      'sort_order'    => ['label' => 'Sort Order', 'type' => 'number'],
      'active'        => ['label' => 'Active', 'type' => 'checkbox'],
    ],
  ],
  'mobile_categories' => [
    'table' => 'mobile_categories',
    'title' => 'Mobile Categories',
    'fields' => [
      'image_url'   => ['label' => 'Image URL', 'type' => 'text'],
      'label'       => ['label' => 'Label', 'type' => 'text'],
      'link_url'    => ['label' => 'Link URL', 'type' => 'text'],
      'sort_order'  => ['label' => 'Sort Order', 'type' => 'number'],
      'active'      => ['label' => 'Active', 'type' => 'checkbox'],
    ],
  ],
  'testimonials' => [
    'table' => 'testimonials',
    'title' => 'Testimonials',
    'fields' => [
      'quote'       => ['label' => 'Quote', 'type' => 'textarea'],
      'author'      => ['label' => 'Author', 'type' => 'text'],
      'sort_order'  => ['label' => 'Sort Order', 'type' => 'number'],
      'active'      => ['label' => 'Active', 'type' => 'checkbox'],
    ],
  ],
  'products' => [
    'table' => 'products',
    'title' => 'Products Grid',
    'fields' => [
      'name'        => ['label' => 'Name', 'type' => 'text'],
      'description' => ['label' => 'Description', 'type' => 'textarea'],
      'price'       => ['label' => 'Price (numbers only)', 'type' => 'text'],
      'image_url'   => ['label' => 'Image URL', 'type' => 'text'],
      'sort_order'  => ['label' => 'Sort Order', 'type' => 'number'],
      'active'      => ['label' => 'Active', 'type' => 'checkbox'],
    ],
  ],
];

$resource = $_GET['resource'] ?? 'banners';
if (!isset($resources[$resource])) {
    http_response_code(404);
    die('Unknown resource');
}
$conf = $resources[$resource];
$table = $conf['table'];
$title = $conf['title'];
$fields = $conf['fields'];

// Handle actions: create/update/delete
$action = $_GET['action'] ?? 'list';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();
    if ($action === 'create') {
        $cols = [];
        $vals = [];
        foreach ($fields as $name => $meta) {
            if ($meta['type'] === 'checkbox') {
                $cols[] = $name;
                $vals[] = isset($_POST[$name]) ? 1 : 0;
            } else {
                $cols[] = $name;
                $vals[] = $_POST[$name] ?? '';
            }
        }
        $placeholders = implode(',', array_fill(0, count($cols), '?'));
        $stmt = $pdo->prepare('INSERT INTO ' . $table . ' (' . implode(',', $cols) . ') VALUES (' . $placeholders . ')');
        $stmt->execute($vals);
        header('Location: manage.php?resource=' . urlencode($resource));
        exit;
    }
    if ($action === 'edit') {
        $id = (int)($_GET['id'] ?? 0);
        $sets = [];
        $vals = [];
        foreach ($fields as $name => $meta) {
            if ($meta['type'] === 'checkbox') {
                $sets[] = $name . ' = ?';
                $vals[] = isset($_POST[$name]) ? 1 : 0;
            } else {
                $sets[] = $name . ' = ?';
                $vals[] = $_POST[$name] ?? '';
            }
        }
        $vals[] = $id;
        $stmt = $pdo->prepare('UPDATE ' . $table . ' SET ' . implode(',', $sets) . ' WHERE id = ?');
        $stmt->execute($vals);
        header('Location: manage.php?resource=' . urlencode($resource));
        exit;
    }
}

if ($action === 'delete') {
    $id = (int)($_GET['id'] ?? 0);
    $stmt = $pdo->prepare('DELETE FROM ' . $table . ' WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: manage.php?resource=' . urlencode($resource));
    exit;
}

include __DIR__ . '/partials/_header.php';

echo '<h1 class="text-2xl font-semibold mb-6">' . htmlspecialchars($title) . '</h1>';

if ($action === 'list') {
    echo '<div class="mb-4"><a href="manage.php?resource=' . urlencode($resource) . '&action=create" class="px-3 py-2 bg-gray-900 text-white rounded">+ Add New</a></div>';
    $rows = $pdo->query('SELECT * FROM ' . $table . ' ORDER BY sort_order ASC, id ASC')->fetchAll();
    echo '<div class="overflow-x-auto bg-white rounded shadow"><table class="min-w-full text-sm">';
    echo '<thead class="bg-gray-100"><tr>';
    echo '<th class="px-3 py-2 text-left">ID</th>';
    foreach ($fields as $name => $meta) {
        echo '<th class="px-3 py-2 text-left">' . htmlspecialchars($meta['label']) . '</th>';
    }
    echo '<th class="px-3 py-2 text-left">Actions</th>';
    echo '</tr></thead><tbody>';
    foreach ($rows as $r) {
        echo '<tr class="border-t">';
        echo '<td class="px-3 py-2">' . (int)$r['id'] . '</td>';
        foreach ($fields as $name => $meta) {
            $v = $r[$name];
            if ($meta['type'] === 'checkbox') $v = $v ? 'Yes' : 'No';
            echo '<td class="px-3 py-2">' . htmlspecialchars((string)$v) . '</td>';
        }
        echo '<td class="px-3 py-2">';
        echo '<a class="text-blue-700 underline mr-2" href="manage.php?resource=' . urlencode($resource) . '&action=edit&id=' . (int)$r['id'] . '">Edit</a>';
        echo '<a class="text-red-700 underline" href="manage.php?resource=' . urlencode($resource) . '&action=delete&id=' . (int)$r['id'] . '" onclick="return confirm(\'Delete this item?\')">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}

if ($action === 'create' || $action === 'edit') {
    $editing = ($action === 'edit');
    $data = [];
    if ($editing) {
        $id = (int)($_GET['id'] ?? 0);
        $stmt = $pdo->prepare('SELECT * FROM ' . $table . ' WHERE id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch() ?: [];
    }
    echo '<form method="post" class="bg-white p-4 rounded shadow max-w-2xl">';
    csrf_input();
    foreach ($fields as $name => $meta) {
        $label = $meta['label'];
        $type = $meta['type'];
        $val  = $data[$name] ?? '';
        echo '<div class="mb-4">';
        echo '<label class="block text-sm mb-1">' . htmlspecialchars($label) . '</label>';
        if ($type === 'textarea') {
            echo '<textarea name="' . htmlspecialchars($name) . '" class="border rounded w-full p-2" rows="4">' . htmlspecialchars((string)$val) . '</textarea>';
        } elseif ($type === 'checkbox') {
            $checked = ((string)$val === '1') ? 'checked' : '';
            echo '<input type="checkbox" name="' . htmlspecialchars($name) . '" value="1" ' . $checked . '>';
        } else {
            echo '<input type="' . htmlspecialchars($type) . '" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars((string)$val) . '" class="border rounded w-full p-2">';
        }
        if ($resource === 'banners' && in_array($name, ['desktop_image','mobile_image'], true)) {
            echo '<div class="text-xs text-gray-500 mt-1">Store only the file name (e.g., <code>BANNER_01.png</code>). Files must exist under <code>/images</code> on your server.</div>';
        }
        echo '</div>';
    }
    echo '<div class="flex gap-2">';
    echo '<button class="bg-gray-900 text-white px-4 py-2 rounded">' . ($editing ? 'Update' : 'Create') . '</button>';
    echo '<a class="px-4 py-2 rounded border" href="manage.php?resource=' . urlencode($resource) . '">Cancel</a>';
    echo '</div>';
    echo '</form>';
}

require_once __DIR__ . '/partials/_footer.php';
