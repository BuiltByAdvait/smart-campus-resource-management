USE smart_campus_db;

CREATE TABLE COMPUTER (
    computer_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_tag VARCHAR(30) NOT NULL UNIQUE,
    serial_number VARCHAR(50) NOT NULL UNIQUE,
    lab_id INT NOT NULL,
    processor VARCHAR(100),
    ram_gb INT,
    storage_gb INT,
    storage_type VARCHAR(20),
    operating_system VARCHAR(50),
    purchase_date DATE,
    warranty_expiry DATE,
    status VARCHAR(30) DEFAULT 'WORKING',

    CONSTRAINT fk_computer_lab
        FOREIGN KEY (lab_id)
        REFERENCES LAB(lab_id),

    CONSTRAINT chk_computer_ram
        CHECK (ram_gb > 0),

    CONSTRAINT chk_computer_storage
        CHECK (storage_gb > 0),

    CONSTRAINT chk_computer_storage_type
        CHECK (
            storage_type IN ('HDD', 'SSD', 'NVMe')
        ),

    CONSTRAINT chk_computer_status
        CHECK (
            status IN (
                'WORKING',
                'UNDER_MAINTENANCE',
                'FAULTY',
                'RETIRED'
            )
        )
);