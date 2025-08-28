<?php
$title = 'Gifting Stories - Curated Gift Boxes & Hampers';
$scripts = ['/assets/js/home.js'];
require __DIR__ . '/partials/header.php';
?>
<body>

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

    <?php require __DIR__ . '/partials/navigation.php'; ?>

    <!-- Page Content Container -->
    <main>
        <!-- Mobile Category Slider -->
        <section class="lg:hidden">
            <div class="max-w-7xl mx-auto px-4">
                <div class="mobile-category-slider">
                    <?php foreach ($mobile_categories as $category): ?>
                        <a href="<?= htmlspecialchars($category['link_url']) ?>" class="mobile-category-item">
                            <img src="<?= htmlspecialchars($category['image_url']) ?>" alt="<?= htmlspecialchars($category['label']) ?>" class="mx-auto">
                            <p class="text-xs font-semibold text-gray-800"><?= htmlspecialchars($category['label']) ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
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
                        <img src="" alt="Hero Image <?= $i + 1 ?>" class="hero-image <?= $active_class ?>" data-desktop-src="<?= BASE_URL ?>images/<?= $desktop_image ?>" data-mobile-src="<?= BASE_URL ?>images/<?= $mobile_image ?>" />
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
            <section class="py-16 bg-white animate-on-scroll">
                <div class="max-w-7xl mx-auto px-4 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-12 text-gray-800">Perfect Picks for Every Relationship</h2>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="<?= BASE_URL ?>images/For_Her_01.png" alt="Gifts for Her" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Her</p>
                        </div>
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="<?= BASE_URL ?>images/For_Him_01.png" alt="Gifts for Him" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Him</p>
                        </div>
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="<?= BASE_URL ?>images/For_Couple_01.png" alt="Gifts for Couple" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Couple</p>
                        </div>
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="<?= BASE_URL ?>images/For_Parents_01.png" alt="Gifts for Parents" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Parents</p>
                        </div>
                        <div class="card-animate">
                            <div class="circle-image-container">
                                <img src="<?= BASE_URL ?>images/For_Kids_01.png" alt="Gifts for Kids" class="circle-image">
                            </div>
                            <p class="mt-4 font-semibold text-gray-800">For Kids</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Curated Gift Boxes Section -->
            <section class="py-16 bg-white animate-on-scroll">
                <div class="max-w-7xl mx-auto px-4 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800"><?= htmlspecialchars(cms_setting('curated_title', 'Elegant Gifts for Every Celebration')) ?></h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-12"><?= htmlspecialchars(cms_setting('curated_subtitle', 'Explore premium gift hampers thoughtfully curated to suit every occasion, with gourmet delights, elegant packaging, and a personal touch that makes every gift memorable.')) ?></p>
                    <div class="collection-grid">
                        <!-- Birthday -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="<?= BASE_URL ?>images/birthday.png" alt="Birthday Gifts">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Birthday</a>
                            </div>
                        </div>
                        <!-- Housewarming Gifts -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="<?= BASE_URL ?>images/housewarming.png" alt="Housewarming Gifts">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Housewarming Gifts</a>
                            </div>
                        </div>
                        <!-- Baby Shower -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="<?= BASE_URL ?>images/baby_shower.png" alt="Baby Shower Gifts">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Baby Shower</a>
                            </div>
                        </div>
                        <!-- Wedding / Anniversary -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="<?= BASE_URL ?>images/wedding_01.png" alt="Wedding and Anniversary Gifts">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Wedding / Anniversary</a>
                            </div>
                        </div>
                        <!-- Self Care Hampers -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="<?= BASE_URL ?>images/self.png" alt="Self Care Hampers">
                            </a>
                            <div class="collection-label">
                                <a href="#" class="font-semibold text-gray-800">Self Care Hampers</a>
                            </div>
                        </div>
                        <!-- Thank You Gifts -->
                        <div class="collection-item">
                            <a href="#">
                                <img src="<?= BASE_URL ?>images/thankyou.png" alt="Thank You Gifts">
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
                <div class="max-w-7xl mx-auto px-4 text-center">
                    <h2 class="text-3xl font-semibold mb-12 text-gray-800">What Our Customers Say</h2>
                    <div class="swiper testimonial-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($testimonials as $t): ?>
                            <div class="swiper-slide">
                                <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
                                    <p class="italic text-gray-600 mb-4">"<?php echo htmlspecialchars($t['quote']); ?>"</p>
                                    <p class="font-semibold text-gray-800">- <?php echo htmlspecialchars($t['author']); ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php else: ?>
            <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 text-center">
                    <h2 class="text-3xl font-semibold mb-12 text-gray-800">What Our Customers Say</h2>
                    <div class="swiper testimonial-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
                                    <p class="italic text-gray-600 mb-4">"The most beautifully curated gift box I have ever received! The attention to detail is simply incredible. I will definitely be a returning customer."</p>
                                    <p class="font-semibold text-gray-800">- Jane D.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
                                    <p class="italic text-gray-600 mb-4">"Gifting Stories made my corporate gifting process so easy and professional. The team was a pleasure to work with, and the recipients were thrilled!"</p>
                                    <p class="font-semibold text-gray-800">- Mark S.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
                                    <p class="italic text-gray-600 mb-4">"I love the 'build a box' feature. It allowed me to create a truly personal gift for my best friend. Highly recommend!"</p>
                                    <p class="font-semibold text-gray-800">- Sarah B.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <!-- Call to Action Section -->
            <section class="bg-white py-16 animate-on-scroll">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Ready to start your gifting story?</h2>
            <section class="bg-white py-16">
                <div class="max-w-7xl mx-auto px-4 text-center">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-800">Ready to start your gifting story?</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                        Contact us today to create the perfect personalized gift box for any occasion.
                    </p>
                    <a href="#" class="btn-primary text-white">
                        Contact Us
                    </a>
                </div>
            </section>
        </div>

        <!-- Products Page -->
        <div id="products-page" class="fade-in">
            <?php if (!empty($products)): ?>
            <section class="py-16">
                <div class="max-w-7xl mx-auto px-4">
                    <h2 class="text-3xl font-semibold text-center mb-12 text-gray-800">Our Complete Collection</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <?php foreach ($products as $p): ?>
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
                            <img src="<?php echo htmlspecialchars($p['image_url']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>" class="w-full h-64 object-cover mb-4 rounded-xl">
                            <h3 class="text-xl font-semibold mb-1"><?php echo htmlspecialchars($p['name']); ?></h3>
                            <p class="text-gray-600 mb-2"><?php echo htmlspecialchars($p['description']); ?></p>
                            <span class="text-xl font-bold text-[var(--primary)]">₹<?php echo number_format((float)$p['price']); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php else: ?>
            <section class="py-16">
                <div class="max-w-7xl mx-auto px-4">
                    <h2 class="text-3xl font-semibold text-center mb-12 text-gray-800">Our Complete Collection</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Product Card 1 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
                            <img src="https://placehold.co/400x400/D0D0D0/5C817C?text=Product+1" alt="Product 1" class="w-full h-64 object-cover mb-4 rounded-xl">
                            <h3 class="text-xl font-semibold mb-1">The Coffee Lovers Box</h3>
                            <p class="text-gray-600 mb-2">A perfect gift for any coffee aficionado.</p>
                            <span class="text-xl font-bold text-[var(--primary)]">₹1,200</span>
                        </div>
                        <!-- Product Card 2 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
                            <img src="https://placehold.co/400x400/D0D0D0/5C817C?text=Product+2" alt="Product 2" class="w-full h-64 object-cover mb-4 rounded-xl">
                            <h3 class="text-xl font-semibold mb-1">Self-Care Spa Kit</h3>
                            <p class="text-gray-600 mb-2">Relax and rejuvenate with this luxurious box.</p>
                            <span class="text-xl font-bold text-[var(--primary)]">₹1,850</span>
                        </div>
                        <!-- Product Card 3 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
                            <img src="https://placehold.co/400x400/D0D0D0/5C817C?text=Product+3" alt="Product 3" class="w-full h-64 object-cover mb-4 rounded-xl">
                            <h3 class="text-xl font-semibold mb-1">Gourmet Delight</h3>
                            <p class="text-gray-600 mb-2">A curated selection of artisanal snacks.</p>
                            <span class="text-xl font-bold text-[var(--primary)]">₹2,100</span>
                        </div>
                        <!-- Product Card 4 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-animate p-4">
                            <img src="https://placehold.co/400x400/D0D0D0/5C817C?text=Product+4" alt="Product 4" class="w-full h-64 object-cover mb-4 rounded-xl">
                            <h3 class="text-xl font-semibold mb-1">The Desk Companion</h3>
                            <p class="text-gray-600 mb-2">Perfect for a new colleague or a work anniversary.</p>
                            <span class="text-xl font-bold text-[var(--primary)]">₹1,500</span>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
        </div>

    </main>

    <!-- Star Animation Container -->
    <div id="star-container"></div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div>
                <h3 class="text-2xl font-semibold mb-4">Gifting Stories</h3>
                <p class="text-gray-400">Thoughtfully curated and beautifully presented gift boxes for every occasion.</p>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4 text-gray-200">Quick Links</h4>
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

<?php require __DIR__ . '/partials/footer.php'; ?>

