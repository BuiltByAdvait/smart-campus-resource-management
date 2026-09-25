USE smart_campus_db;

CREATE TABLE INVENTORY_TRANSACTION (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT NOT NULL,
    transaction_type VARCHAR(10) NOT NULL,
    quantity INT NOT NULL,
    transaction_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    reference_no VARCHAR(50),
    remarks VARCHAR(255),

    CONSTRAINT fk_inventory_transaction_item
        FOREIGN KEY (item_id)
        REFERENCES INVENTORY_ITEM(item_id),

    CONSTRAINT chk_transaction_type
        CHECK (transaction_type IN ('IN', 'OUT')),

    CONSTRAINT chk_transaction_quantity
        CHECK (quantity > 0)
);