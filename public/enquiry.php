<?php
require_once __DIR__ . '/../includes/bootstrap.php';

$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();
    // Optional: handle enquiry submission (e.g., save to database or send email)
    $submitted = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry - Gifting Stories</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8F7F4; }
        .nav-link {
            @apply text-gray-700 hover:text-[#5C817C] transition duration-300 ease-in-out font-medium;
        }
    </style>
</head>
<body class="text-gray-800">
    <header class="bg-[#efe8e0] p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-3xl font-bold text-[#5C817C]">Gifting Stories</a>
            <nav class="hidden lg:flex space-x-8 items-center">
                <a href="/" class="nav-link">Home</a>
                <a href="#" class="nav-link">Make Your Own Hamper</a>
                <a href="#" class="nav-link">About Us</a>
                <a href="/#contact" class="nav-link">Contact Us</a>
            </nav>
        </div>
    </header>

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
                <button type="submit" class="bg-[#5C817C] text-white px-6 py-2 rounded hover:bg-[#4a6b65]">Submit</button>
            </div>
        </form>
    </main>
</body>
</html>
