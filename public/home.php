<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gifting Stories - Curated Gift Boxes & Hampers</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F8F7F4;
            color: #333;
        }
        .hero-section {
            position: relative;
            /* Use a padding-top hack to maintain a custom aspect ratio for desktop */
            padding-top: 42.6%; /* Custom aspect ratio for 1918x817 images */
            overflow: hidden;
            width: 100%;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding-top: 125%; /* 4:5 aspect ratio for mobile */
            }
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover; /* This property ensures the entire image fills the space */
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        .hero-image.active {
            opacity: 1;
        }
        /*
          The following classes are for a full-screen, clickable hero image.
          No text overlay is present on the website as per the user's request.
        */
        .clickable-hero-link {
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        
        .card-animate {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        
        .nav-link {
            @apply text-gray-700 hover:text-[#5C817C] transition duration-300 ease-in-out font-medium;
        }
        .footer-link {
            @apply text-gray-400 hover:text-white transition duration-300;
        }
        /* Page specific content and animations */
        #home-page, #products-page, #contact-page {
            display: none;
        }
        #home-page.active, #products-page.active, #contact-page.active {
            display: block;
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .slider-dots-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
            display: flex;
            gap: 10px;
        }
        .slider-dot {
            width: 10px;
            height: 10px;
            background-color: #888;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .slider-dot.active {
            background-color: #5C817C;
        }
        .circle-image-container {
            width: 100%;
            max-width: 200px;
            height: 200px;
            overflow: hidden;
            border: 2px solid #5C817C;
            margin: 0 auto;
            border-top-left-radius: 20%;
            border-top-right-radius: 20%;
        }
        .circle-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* New custom CSS for the curated collection section */
        .collection-grid {
            columns: 3; /* Create a 3-column masonry layout */
            column-gap: 6px;
            margin-top: 40px;
        }
        
        @media (max-width: 1024px) {
            .collection-grid {
                columns: 2;
            }
        }
        
        @media (max-width: 768px) {
             .collection-grid {
                columns: 1;
             }
        }

        .collection-item {
            position: relative;
            margin-bottom: 6px; /* Add margin to create space between items */
            overflow: hidden;
            display: inline-block; /* Ensure items are treated as blocks for masonry */
            width: 100%;
        }

        .collection-item img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .collection-label {
            position: absolute;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.9);
            padding: 12px 15px;
            width: 90%;
            height: fit-content;
            font-weight: 600;
            font-size: 20px;
            line-height: 100%;
            letter-spacing: 0;
            text-align: center;
            color: #000000;
        }
        
        @media (max-width: 768px) {
             .collection-grid {
                gap: 20px;
             }
             .collection-item {
                min-height: auto;
             }
             .collection-label {
                 top: 20px;
                 padding: 8px 10px;
                 font-size: 16px;
             }
        }
        /* Star animation CSS */
        #star-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 9999;
        }
        .star {
            position: absolute;
            font-size: 20px;
            pointer-events: none;
            opacity: 0;
            animation: star-fade-out 1s forwards;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @keyframes star-fade-out {
            0% {
                opacity: 1;
                transform: scale(0.5);
            }
            100% {
                opacity: 0;
                transform: scale(1.5) translateY(-50px);
            }
        }
        /* Mobile Sidebar CSS */
        #mobile-sidebar {
            position: fixed;
            top: 0;
            right: 0;
            height: 100%;
            width: 75%;
            max-width: 300px;
            background-color: #F8F7F4;
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
            z-index: 60;
            box-shadow: -4px 0 10px rgba(0,0,0,0.1);
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
        #mobile-sidebar.open {
            transform: translateX(0);
        }
        #mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 55;
            display: none;
        }
        #mobile-overlay.open {
            display: block;
        }
        .sidebar-menu-item {
            @apply block px-6 py-4 text-lg font-medium text-gray-700 hover:bg-gray-100;
        }
        .sidebar-header {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sidebar-buttons {
            display: flex;
            padding: 1rem;
            gap: 0.5rem;
        }
        .sidebar-button-personal {
            @apply flex-1 px-4 py-2 text-sm font-semibold rounded-md transition-colors duration-200;
            background-color: #D4B08F;
            color: #333;
        }
        .sidebar-button-corporate {
            @apply flex-1 px-4 py-2 text-sm font-semibold rounded-md transition-colors duration-200;
            background-color: #EEEAE5;
            color: #333;
        }
        .sidebar-section-title {
            @apply px-6 py-4 text-sm font-bold text-gray-500 uppercase tracking-wider;
            border-bottom: 1px solid #e5e7eb;
        }
        /* New mobile categories slider */
        .mobile-category-slider {
            -webkit-overflow-scrolling: touch;
            overflow-x: auto;
            white-space: nowrap;
            padding: 1rem 0;
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }
        .mobile-category-slider::-webkit-scrollbar {
            display: none;
        }
        .mobile-category-item {
            display: inline-block;
            text-align: center;
            margin-right: 1rem;
            margin-left: 1rem;
            min-width: 80px;
        }
        .mobile-category-item img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- PHP block for defining image paths -->
    <?php
        // Define banner images for desktop and mobile (defaults only; can be overridden by CMS)
        if (!isset($banners) || empty($banners)) {
            $banners = [
                ['desktop_image' => 'BANNER_01.png', 'mobile_image' => 'BANNER_01_MOBILE.png', 'link_url' => '#'],
                ['desktop_image' => 'BANNER_02.png', 'mobile_image' => 'BANNER_02_MOBILE.png', 'link_url' => '#'],
                ['desktop_image' => 'BANNER_03.png', 'mobile_image' => 'BANNER_03_MOBILE.png', 'link_url' => '#'],
                ['desktop_image' => 'BANNER_04.png', 'mobile_image' => 'BANNER_04_MOBILE.png', 'link_url' => '#'],
            ];
        }
        // Map to original variables used in the view
        $desktop_banners = array_map(function($b){ return $b['desktop_image']; }, $banners);
        $mobile_banners  = array_map(function($b){ return $b['mobile_image']; }, $banners);
        $banner_count = count($desktop_banners);

        // Placeholder data for mobile category slider (defaults only; can be overridden by CMS)
        if (!isset($mobile_categories) || empty($mobile_categories)) {
            $mobile_categories = [
                ['image_url' => 'https://placehold.co/100x100/D4B08F/fff?text=Best+Seller', 'label' => 'Bestseller Gifts', 'link_url' => '#'],
                ['image_url' => 'https://placehold.co/100x100/D4B08F/fff?text=Festive+Hampers', 'label' => 'Festive Hampers', 'link_url' => '#'],
                ['image_url' => 'https://placehold.co/100x100/D4B08F/fff?text=Birthday', 'label' => 'Birthday Hampers', 'link_url' => '#'],
                ['image_url' => 'https://placehold.co/100x100/D4B08F/fff?text=Anniversary', 'label' => 'Anniversary Gifts', 'link_url' => '#'],
                ['image_url' => 'https://placehold.co/100x100/D4B08F/fff?text=Gourmet', 'label' => 'Gourmet Edibles', 'link_url' => '#'],
                ['image_url' => 'https://placehold.co/100x100/D4B08F/fff?text=Self+Care', 'label' => 'Self Care Hampers', 'link_url' => '#'],
                ['image_url' => 'https://placehold.co/100x100/D4B08F/fff?text=New+Arrivals', 'label' => 'New Arrivals', 'link_url' => '#'],
            ];
        }
    ?>

    <!-- Announcement Bar -->
    <div class="bg-[#2a4e4a] text-white text-center py-2 text-sm font-light tracking-wide">
        We do bulk & corporate gifting too. <a href="/enquiry" class="underline hover:text-gray-200">Enquire Now</a>
    </div>

    <!-- Header & Navigation -->
    <header class="bg-[#efe8e0] p-4 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-3xl font-bold text-[#5C817C]" onclick="navigateTo('home')">Gifting Stories</a>
            <div class="hidden lg:flex space-x-8 items-center">
                <a href="#" class="nav-link">Make Your Own Hamper</a>
                <a href="#" class="nav-link">About Us</a>
                <a href="#" class="nav-link" onclick="navigateTo('contact')">Contact Us</a>
                <div class="flex space-x-4 items-center text-xl">
                    <a href="#" class="text-gray-700 hover:text-[#5C817C]"><i class="fas fa-search"></i></a>
                    <a href="#" class="text-gray-700 hover:text-[#5C817C]"><i class="fas fa-user"></i></a>
                    <a href="#" class="text-gray-700 hover:text-[#5C817C]"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <!-- Mobile Menu Button -->
            <div class="lg:hidden flex space-x-4 items-center text-xl">
                <a href="#" class="text-gray-700 hover:text-[#5C817C]"><i class="fas fa-search"></i></a>
                <a href="#" class="text-gray-700 hover:text-[#5C817C]"><i class="fas fa-shopping-cart"></i></a>
                <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Sidebar -->
    <div id="mobile-sidebar">
        <div class="flex justify-between items-center p-4 border-b border-gray-200">
            <h3 class="text-xl font-bold">Menu</h3>
            <button id="mobile-close-button" class="text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="sidebar-buttons">
            <a href="#" class="sidebar-button-personal">Personal Gifts</a>
            <a href="#" class="sidebar-button-corporate">Corporate Gifts</a>
        </div>
        <h4 class="sidebar-section-title">Shop by Categories</h4>
        <div class="flex flex-col space-y-2 py-2">
            <a href="#" class="sidebar-menu-item">Diwali Gifts</a>
            <a href="#" class="sidebar-menu-item">Shop Gifts</a>
            <a href="#" class="sidebar-menu-item">Make Your Own Hamper</a>
            <a href="#" class="sidebar-menu-item">All Gifts</a>
            <a href="#" class="sidebar-menu-item">New Arrivals</a>
        </div>
        <h4 class="sidebar-section-title">Company</h4>
        <div class="flex flex-col space-y-2 py-2">
            <a href="#" class="sidebar-menu-item">About Us</a>
            <a href="#" class="sidebar-menu-item" onclick="navigateTo('contact')">Contact Us</a>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div id="mobile-overlay"></div>

    <!-- Page Content Container -->
    <main>
        <!-- Mobile Category Slider -->
        <section class="lg:hidden">
            <div class="mobile-category-slider">
                <?php foreach ($mobile_categories as $category): ?>
                    <a href="<?= htmlspecialchars($category['link_url']) ?>" class="mobile-category-item">
                        <img src="<?= htmlspecialchars($category['image_url']) ?>" alt="<?= htmlspecialchars($category['label']) ?>" class="mx-auto">
                        <p class="text-xs font-semibold text-gray-800"><?= htmlspecialchars($category['label']) ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Home Page -->
        <div id="home-page" class="active fade-in">
            <!-- Hero Section -->
            <section class="hero-section">
                <?php
                // Loop through the banners and display them
                $banner_count = count($banners);
                foreach ($banners as $i => $banner):
                    $active_class = ($i === 0) ? 'active' : '';
                    $desktop_image = htmlspecialchars($banner['desktop_image'] ?? '');
                    $mobile_image = htmlspecialchars($banner['mobile_image'] ?? '');
                    $link_url = htmlspecialchars($banner['link_url'] ?? '#');
                ?>
                    <!-- The anchor tag makes the entire banner clickable. Update the 'href' with the desired destination. -->
                    <a href="<?= $link_url ?>" class="clickable-hero-link">
                        <img src="" alt="Hero Image <?= $i + 1 ?>" class="hero-image <?= $active_class ?>" data-desktop-src="/images/<?= $desktop_image ?>" data-mobile-src="/images/<?= $mobile_image ?>" />
                    </a>
                <?php endforeach; ?>
                <!-- Slider Dots -->
                <div class="slider-dots-container">
                    <?php for ($i = 0; $i < $banner_count; $i++): ?>
                        <div class="slider-dot <?= ($i === 0) ? 'active' : '' ?>" data-index="<?= $i ?>"></div>
                    <?php endfor; ?>
                </div>
            </section>

            <!-- Perfect Picks Section -->
            <section class="py-16 bg-white">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-12 text-gray-800">Perfect Picks for Every Relationship</h2>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="/images/For_Her_01.png" alt="Gifts for Her" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Her</p>
                        </div>
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="/images/For_Him_01.png" alt="Gifts for Him" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Him</p>
                        </div>
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="/images/For_Couple_01.png" alt="Gifts for Couple" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Couple</p>
                        </div>
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="/images/For_Parents_01.png" alt="Gifts for Parents" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Parents</p>
                        </div>
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="/images/For_Kids_01.png" alt="Gifts for Kids" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Kids</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Curated Gift Boxes Section -->
            <section class="py-16 bg-white">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800"><?= htmlspecialchars(cms_setting('curated_title', 'Elegant Gifts for Every Celebration')) ?></h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-12"><?= htmlspecialchars(cms_setting('curated_subtitle', 'Explore premium gift hampers thoughtfully curated to suit every occasion, with gourmet delights, elegant packaging, and a personal touch that makes every gift memorable.')) ?></p>
                    <div class="collection-grid">
                        <!-- Birthday -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="/images/birthday.png" alt="Birthday Gifts">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Birthday</a>
                            </div>
                        </div>
                        <!-- Housewarming Gifts -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="/images/housewarming.png" alt="Housewarming Gifts">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Housewarming Gifts</a>
                            </div>
                        </div>
                        <!-- Baby Shower -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="/images/baby_shower.png" alt="Baby Shower Gifts">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Baby Shower</a>
                            </div>
                        </div>
                        <!-- Wedding / Anniversary -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="/images/wedding_01.png" alt="Wedding and Anniversary Gifts">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Wedding / Anniversary</a>
                            </div>
                        </div>
                        <!-- Self Care Hampers -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="/images/self.png" alt="Self Care Hampers">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Self Care Hampers</a>
                            </div>
                        </div>
                        <!-- Thank You Gifts -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="/images/thankyou.png" alt="Thank You Gifts">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Thank You Gifts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Testimonials Section -->
            <?php if (!empty($testimonials)): ?>
<section class="py-16 bg-white">
  <div class="container mx-auto px-4 text-center">
    <h2 class="text-3xl md:text-4xl font-bold mb-12 text-gray-800">What Our Customers Say</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($testimonials as $t): ?>
        <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
          <p class="italic text-gray-600 mb-4">"<?php echo htmlspecialchars($t['quote']); ?>"</p>
          <p class="font-semibold text-gray-800">- <?php echo htmlspecialchars($t['author']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php else: ?><section class="py-16 bg-white">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-12 text-gray-800">What Our Customers Say</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
                            <p class="italic text-gray-600 mb-4">"The most beautifully curated gift box I have ever received! The attention to detail is simply incredible. I will definitely be a returning customer."</p>
                            <p class="font-semibold text-gray-800">- Jane D.</p>
                        </div>
                        <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
                            <p class="italic text-gray-600 mb-4">"Gifting Stories made my corporate gifting process so easy and professional. The team was a pleasure to work with, and the recipients were thrilled!"</p>
                            <p class="font-semibold text-gray-800">- Mark S.</p>
                        </div>
                        <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
                            <p class="italic text-gray-600 mb-4">"I love the 'build a box' feature. It allowed me to create a truly personal gift for my best friend. Highly recommend!"</p>
                            <p class="font-semibold text-gray-800">- Sarah B.</p>
                        </div>
                    </div>
                </div>
            </section><?php endif; ?>

            <!-- Call to Action Section -->
            <section class="bg-white py-16">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Ready to start your gifting story?</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                        Contact us today to create the perfect personalized gift box for any occasion.
                    </p>
                    <a href="#" class="btn-primary !bg-[#5C817C] !text-white !hover:bg-[#4a6b66]">
                        Contact Us
                    </a>
                </div>
            </section>
        </div>

        <!-- Products Page -->
        <div id="products-page" class="fade-in">
            <?php if (!empty($products)): ?>
<section class="py-16">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800">Our Complete Collection</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      <?php foreach ($products as $p): ?>
      <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
        <img src="<?php echo htmlspecialchars($p['image_url']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>" class="w-full h-64 object-cover mb-4 rounded-xl">
        <h3 class="text-lg font-semibold mb-1"><?php echo htmlspecialchars($p['name']); ?></h3>
        <p class="text-gray-600 mb-2"><?php echo htmlspecialchars($p['description']); ?></p>
        <span class="text-xl font-bold text-[#5C817C]">₹<?php echo number_format((float)$p['price']); ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php else: ?><section class="py-16">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800">Our Complete Collection</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Product Card 1 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
                            <img src="https://placehold.co/400x400/D0D0D0/5C817C?text=Product+1" alt="Product 1" class="w-full h-64 object-cover mb-4 rounded-xl">
                            <h3 class="text-lg font-semibold mb-1">The Coffee Lovers Box</h3>
                            <p class="text-gray-600 mb-2">A perfect gift for any coffee aficionado.</p>
                            <span class="text-xl font-bold text-[#5C817C]">₹1,200</span>
                        </div>
                        <!-- Product Card 2 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
                            <img src="https://placehold.co/400x400/D0D0D0/5C817C?text=Product+2" alt="Product 2" class="w-full h-64 object-cover mb-4 rounded-xl">
                            <h3 class="text-lg font-semibold mb-1">Self-Care Spa Kit</h3>
                            <p class="text-gray-600 mb-2">Relax and rejuvenate with this luxurious box.</p>
                            <span class="text-xl font-bold text-[#5C817C]">₹1,850</span>
                        </div>
                        <!-- Product Card 3 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
                            <img src="https://placehold.co/400x400/D0D0D0/5C817C?text=Product+3" alt="Product 3" class="w-full h-64 object-cover mb-4 rounded-xl">
                            <h3 class="text-lg font-semibold mb-1">Gourmet Delight</h3>
                            <p class="text-gray-600 mb-2">A curated selection of artisanal snacks.</p>
                            <span class="text-xl font-bold text-[#5C817C]">₹2,100</span>
                        </div>
                        <!-- Product Card 4 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
                            <img src="https://placehold.co/400x400/D0D0D0/5C817C?text=Product+4" alt="Product 4" class="w-full h-64 object-cover mb-4 rounded-xl">
                            <h3 class="text-lg font-semibold mb-1">The Desk Companion</h3>
                            <p class="text-gray-600 mb-2">Perfect for a new colleague or a work anniversary.</p>p>
                            <span class="text-xl font-bold text-[#5C817C]">₹1,500</span>
                        </div>
                    </div>
                </div>
            </section><?php endif; ?>
        </div>

    </main>

    <!-- Star Animation Container -->
    <div id="star-container"></div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div>
                <h3 class="text-2xl font-bold mb-4">Gifting Stories</h3>
                <p class="text-gray-400">Thoughtfully curated and beautifully presented gift boxes for every occasion.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-4 text-gray-200">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="footer-link" onclick="navigateTo('home')">Home</a></li>
                    <li><a href="#" class="footer-link" onclick="navigateTo('products')">Shop</a></li>
                    <li><a href="#" class="footer-link">Corporate Gifting</a></li>
                    <li><a href="#" class="footer-link" onclick="navigateTo('contact')">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 text-center text-gray-500">
            &copy; 2024 Gifting Stories. All rights reserved.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Mobile menu toggle functionality
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const mobileCloseButton = document.getElementById('mobile-close-button');

            mobileMenuButton.addEventListener('click', () => {
                mobileSidebar.classList.add('open');
                mobileOverlay.classList.add('open');
            });
            mobileCloseButton.addEventListener('click', () => {
                mobileSidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
            });
            mobileOverlay.addEventListener('click', () => {
                mobileSidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
            });

            // Function to handle page navigation
            window.navigateTo = (page) => {
                const pages = ['home', 'products', 'contact'];
                pages.forEach(p => {
                    const el = document.getElementById(p + '-page');
                    if (el) {
                        el.classList.remove('active');
                    }
                });

                const targetPage = document.getElementById(page + '-page');
                if (targetPage) {
                    targetPage.classList.add('active');
                    window.scrollTo(0, 0); // Scroll to top on page change
                }
                
                // Close mobile menu after navigation
                mobileSidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
            };

            // Hero image slideshow functionality
            const heroImages = document.querySelectorAll('.hero-image');
            const sliderDots = document.querySelectorAll('.slider-dot');
            let currentImageIndex = 0;

            function switchHeroImage(newIndex = null) {
                // Determine the next image index
                if (newIndex !== null) {
                    currentImageIndex = newIndex;
                } else {
                    currentImageIndex = (currentImageIndex + 1) % heroImages.length;
                }

                // Update images
                heroImages.forEach(img => img.classList.remove('active'));
                heroImages[currentImageIndex].classList.add('active');

                // Update dots
                sliderDots.forEach(dot => dot.classList.remove('active'));
                sliderDots[currentImageIndex].classList.add('active');
            }

            // Function to update image sources and slideshow
            const updateImageSources = () => {
                const isMobile = window.innerWidth <= 768; // Tailwind's 'md' breakpoint
                heroImages.forEach((img, index) => {
                    // Update the src to the correct desktop or mobile image
                    img.src = isMobile ? img.dataset.mobileSrc : img.dataset.desktopSrc;
                });
            };

            // Event listeners for dots
            sliderDots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const newIndex = parseInt(dot.dataset.index);
                    switchHeroImage(newIndex);
                    // Reset the timer when a dot is clicked
                    clearInterval(slideshowInterval);
                    slideshowInterval = setInterval(switchHeroImage, 5000);
                });
            });

            // Initial image source update
            updateImageSources();

            // Event listener for window resize
            window.addEventListener('resize', updateImageSources);

            // Start the slideshow
            let slideshowInterval = setInterval(switchHeroImage, 5000); // Change image every 5 seconds

            // Star animation functionality
            const starContainer = document.getElementById('star-container');
            const starColors = ['#FF69B4', '#FFD700', '#ADD8E6', '#90EE90'];
            let lastStarTime = 0;
            const delay = 100; // milliseconds between stars

            document.addEventListener('mousemove', (e) => {
                const now = Date.now();
                if (now - lastStarTime > delay) {
                    const star = document.createElement('span');
                    star.classList.add('star');
                    star.innerHTML = '✦'; // Star emoji or character
                    
                    // Randomize star size
                    const randomSize = Math.random() * (20 - 15) + 15;
                    star.style.fontSize = `${randomSize}px`;

                    star.style.left = `${e.clientX}px`;
                    star.style.top = `${e.clientY}px`;
                    
                    const randomColor = starColors[Math.floor(Math.random() * starColors.length)];
                    star.style.color = randomColor;

                    starContainer.appendChild(star);
                    
                    setTimeout(() => {
                        star.remove();
                    }, 1000); // Remove star after 1 second
                    
                    lastStarTime = now;
                }
            });
        });
    </script>

</body>
</html>
