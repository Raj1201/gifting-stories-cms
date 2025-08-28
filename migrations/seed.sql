-- Seed data inferred from your original index.php
INSERT INTO settings (`key`,`value`) VALUES
('curated_title','Elegant Gifts for Every Celebration'),
('curated_subtitle','Explore premium gift hampers thoughtfully curated to suit every occasion, with gourmet delights, elegant packaging, and a personal touch that makes every gift memorable.');

INSERT INTO banners (desktop_image, mobile_image, link_url, sort_order, active) VALUES
('BANNER_01.png','BANNER_01_MOBILE.png','#',1,1),
('BANNER_02.png','BANNER_02_MOBILE.png','#',2,1),
('BANNER_03.png','BANNER_03_MOBILE.png','#',3,1),
('BANNER_04.png','BANNER_04_MOBILE.png','#',4,1);

INSERT INTO mobile_categories (image_url, label, link_url, sort_order, active) VALUES
('https://placehold.co/100x100/D4B08F/fff?text=Best+Seller','Bestseller Gifts','#',1,1),
('https://placehold.co/100x100/D4B08F/fff?text=Festive+Hampers','Festive Hampers','#',2,1),
('https://placehold.co/100x100/D4B08F/fff?text=Birthday','Birthday Hampers','#',3,1),
('https://placehold.co/100x100/D4B08F/fff?text=Anniversary','Anniversary Gifts','#',4,1),
('https://placehold.co/100x100/D4B08F/fff?text=Gourmet','Gourmet Edibles','#',5,1),
('https://placehold.co/100x100/D4B08F/fff?text=Self+Care','Self Care Hampers','#',6,1),
('https://placehold.co/100x100/D4B08F/fff?text=New+Arrivals','New Arrivals','#',7,1);

INSERT INTO testimonials (quote, author, sort_order, active) VALUES
('"The most beautifully curated gift box I have ever received! The attention to detail is simply incredible. I will definitely be a returning customer."','Jane D.',1,1),
('"Gifting Stories made my corporate gifting process so easy and professional. The team was a pleasure to work with, and the recipients were thrilled!"','Mark S.',2,1),
('"I love the build a box feature. It allowed me to create a truly personal gift for my best friend. Highly recommend!"','Sarah B.',3,1);

INSERT INTO products (name, description, price, image_url, sort_order, active) VALUES
('The Coffee Lovers Box','A perfect gift for any coffee aficionado.',1200,'https://placehold.co/400x400/D0D0D0/5C817C?text=Product+1',1,1),
('Self-Care Spa Kit','Relax and rejuvenate with this luxurious box.',1850,'https://placehold.co/400x400/D0D0D0/5C817C?text=Product+2',2,1),
('Gourmet Delight','A curated selection of artisanal snacks.',2100,'https://placehold.co/400x400/D0D0D0/5C817C?text=Product+3',3,1),
('The Desk Companion','Perfect for a new colleague or a work anniversary.',1500,'https://placehold.co/400x400/D0D0D0/5C817C?text=Product+4',4,1);

-- Navigation menu
INSERT INTO navigation_items (id, parent_id, label, link_url, image_url, menu_type, sort_order, active) VALUES
(1, NULL, 'Home', '/', NULL, 'link', 1, 1),
(2, NULL, 'Shop Gifts', '#', NULL, 'mega', 2, 1),
(3, NULL, 'Make Your Own Hamper', '#', NULL, 'link', 3, 1),
(4, NULL, 'About Us', '#', NULL, 'link', 4, 1),
(5, NULL, 'Contact Us', '/#contact', NULL, 'link', 5, 1),
(6, 2, 'Diwali Gifts', '#', NULL, 'link', 1, 1),
(7, 2, 'All Gifts', '#', NULL, 'link', 2, 1),
(8, 2, 'New Arrivals', '#', NULL, 'link', 3, 1);
