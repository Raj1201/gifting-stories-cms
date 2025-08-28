-- Schema for navigation items
CREATE TABLE IF NOT EXISTS navigation_items (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    parent_id INT UNSIGNED DEFAULT NULL,
    label VARCHAR(255) NOT NULL,
    link_url VARCHAR(255) DEFAULT NULL,
    image_url VARCHAR(255) DEFAULT NULL,
    menu_type ENUM('link','dropdown','mega') NOT NULL DEFAULT 'link',
    sort_order INT NOT NULL DEFAULT 0,
    active TINYINT(1) NOT NULL DEFAULT 1,
    CONSTRAINT fk_navigation_parent FOREIGN KEY (parent_id) REFERENCES navigation_items(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

