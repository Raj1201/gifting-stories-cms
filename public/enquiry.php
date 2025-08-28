<?php
require_once __DIR__ . '/../includes/bootstrap.php';

$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();
    // Optional: handle enquiry submission (e.g., save to database or send email)
    $submitted = true;
}

$title = 'Enquiry - Gifting Stories';
require __DIR__ . '/partials/header.php';
?>
<body class="text-gray-800">
    <?php require __DIR__ . '/partials/navigation.php'; ?>

    <main class="container mx-auto py-10">
        <?php if ($submitted): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">Thank you for your enquiry!</div>
        <?php endif; ?>
        <h1 class="text-2xl font-semibold mb-6 text-center">Send us an Enquiry</h1>
        <form action="/enquiry" method="POST" class="max-w-xl mx-auto space-y-4">
            <?php csrf_input(); ?>
            <div>
                <label for="name" class="block text-sm font-medium mb-1">Name</label>
                <input type="text" id="name" name="name" required class="w-full border border-gray-300 rounded p-2" />
            </div>
            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded p-2" />
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium mb-1">Phone</label>
                <input type="tel" id="phone" name="phone" class="w-full border border-gray-300 rounded p-2" />
            </div>
            <div>
                <label for="message" class="block text-sm font-medium mb-1">Message</label>
                <textarea id="message" name="message" rows="4" required class="w-full border border-gray-300 rounded p-2"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn-primary text-white px-6 py-2 rounded">Submit</button>
            </div>
        </form>
    </main>
<?php require __DIR__ . '/partials/footer.php'; ?>

