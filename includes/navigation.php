<?php
function cms_get_navigation() {
    return [
        'desktop' => [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Make Your Own Hamper', 'url' => '#'],
            ['label' => 'About Us', 'url' => '#'],
            ['label' => 'Contact Us', 'url' => '/#contact'],
        ],
        'categories' => [
            ['label' => 'Diwali Gifts', 'url' => '#'],
            ['label' => 'Shop Gifts', 'url' => '#'],
            ['label' => 'Make Your Own Hamper', 'url' => '#'],
            ['label' => 'All Gifts', 'url' => '#'],
            ['label' => 'New Arrivals', 'url' => '#'],
        ],
        'company' => [
            ['label' => 'About Us', 'url' => '#'],
            ['label' => 'Contact Us', 'url' => '/#contact'],
        ],
    ];
}
