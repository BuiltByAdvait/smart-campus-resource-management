USE smart_campus_db;

CREATE TABLE INVENTORY_ITEM (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_code VARCHAR(30) NOT NULL UNIQUE,
    item_name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    unit VARCHAR(20) NOT NULL,
    minimum_stock INT DEFAULT 0,
    current_stock INT DEFAULT 0,
    storage_location VARCHAR(100),
    status VARCHAR(20) DEFAULT 'ACTIVE',

    CONSTRAINT chk_inventory_stock
        CHECK (current_stock >= 0),

    CONSTRAINT chk_inventory_minimum
        CHECK (minimum_stock >= 0)
);