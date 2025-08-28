<?php
$nav = cms_get_navigation();
?>
<!-- Header & Navigation -->
<header class="bg-[var(--bg-light)] p-4 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <a href="/" class="text-3xl font-bold text-[var(--primary)]">Gifting Stories</a>
        <div class="hidden lg:flex space-x-8 items-center">
            <?php foreach ($nav as $item): ?>
                <?php if (!empty($item['children'])): ?>
                    <div class="relative group">
                        <a href="<?= htmlspecialchars($item['link_url']) ?>" class="nav-link"><?= htmlspecialchars($item['label']) ?></a>
                        <div class="absolute left-0 mt-2 hidden group-hover:block bg-white border rounded shadow-lg">
                            <?php foreach ($item['children'] as $child): ?>
                                <a href="<?= htmlspecialchars($child['link_url']) ?>" class="block px-4 py-2 hover:bg-gray-100"><?= htmlspecialchars($child['label']) ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?= htmlspecialchars($item['link_url']) ?>" class="nav-link"><?= htmlspecialchars($item['label']) ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="flex space-x-4 items-center text-xl">
                <a href="#" class="text-gray-700 hover:text-[var(--primary)]"><i class="fas fa-search"></i></a>
                <a href="#" class="text-gray-700 hover:text-[var(--primary)]"><i class="fas fa-user"></i></a>
                <a href="#" class="text-gray-700 hover:text-[var(--primary)]"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
        <!-- Mobile Menu Button -->
        <div class="lg:hidden flex space-x-4 items-center text-xl">
            <a href="#" class="text-gray-700 hover:text-[var(--primary)]"><i class="fas fa-search"></i></a>
            <a href="#" class="text-gray-700 hover:text-[var(--primary)]"><i class="fas fa-shopping-cart"></i></a>
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
        <h3 class="text-xl font-semibold">Menu</h3>
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
    <div class="flex flex-col space-y-2 py-2">
        <?php foreach ($nav as $item): ?>
            <a href="<?= htmlspecialchars($item['link_url']) ?>" class="sidebar-menu-item"><?= htmlspecialchars($item['label']) ?></a>
            <?php if (!empty($item['children'])): ?>
                <?php foreach ($item['children'] as $child): ?>
                    <a href="<?= htmlspecialchars($child['link_url']) ?>" class="sidebar-menu-item ml-4"><?= htmlspecialchars($child['label']) ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<!-- Mobile Overlay -->
<div id="mobile-overlay"></div>
