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
(1, NULL, 'Make Your Own Hamper', '#', NULL, 'link', 1, 1),
(2, NULL, 'About Us', '#', NULL, 'link', 2, 1),
(3, NULL, 'Our Products/Hampers', '#', NULL, 'mega', 3, 1),
(4, NULL, 'Home', '/', NULL, 'link', 4, 1),
(5, NULL, 'Contact Us', '/#contact', NULL, 'link', 5, 1),
(6, 3, 'AI Hamper', '#', 'https://placehold.co/600x400?text=AI+Hamper', 'link', 1, 1),
(7, 3, 'Corporate Appreciation Hampers', '#', 'https://placehold.co/600x400?text=Corporate+Appreciation+Hampers', 'link', 2, 1),
(8, 3, 'Corporate/Diwali Hampers', '#', 'https://placehold.co/600x400?text=Corporate-Diwali+Hampers', 'link', 3, 1),
(9, 3, 'Corporate-On Boarding Hampers', '#', 'https://placehold.co/600x400?text=Corporate-On+Boarding+Hampers', 'link', 4, 1),
(10, 3, 'Wedding Hampers', '#', 'https://placehold.co/600x400?text=Wedding+Hampers', 'link', 5, 1),
(11, 3, 'Room Hampers', '#', 'https://placehold.co/600x400?text=Room+Hampers', 'link', 6, 1),
(12, 3, 'Trousseau Packaging', '#', 'https://placehold.co/600x400?text=Trousseau+Packaging', 'link', 7, 1),
(13, 3, 'HALDI FAVOURS', '#', 'https://placehold.co/600x400?text=HALDI+FAVOURS', 'link', 8, 1),
(14, 3, 'BRIDESMAID HAMPERS', '#', 'https://placehold.co/600x400?text=BRIDESMAID+HAMPERS', 'link', 9, 1),
(15, 3, 'Baby Welcoming/Baby Shower Hampers', '#', 'https://placehold.co/600x400?text=Baby+Welcoming+Baby+Shower+Hampers', 'link', 10, 1),
(16, 3, 'FESTIVE HAMPERS', '#', 'https://placehold.co/600x400?text=FESTIVE+HAMPERS', 'link', 11, 1);
