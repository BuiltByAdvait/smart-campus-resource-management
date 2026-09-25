USE smart_campus_db;

CREATE TABLE EQUIPMENT (
    equipment_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_tag VARCHAR(30) NOT NULL UNIQUE,
    equipment_name VARCHAR(100) NOT NULL,
    category_id INT NOT NULL,
    serial_number VARCHAR(50) UNIQUE,
    room_id INT,
    department_id INT,
    purchase_date DATE,
    warranty_expiry DATE,
    condition_status VARCHAR(30) DEFAULT 'GOOD',
    operational_status VARCHAR(30) DEFAULT 'AVAILABLE',

    CONSTRAINT fk_equipment_category
        FOREIGN KEY (category_id)
        REFERENCES EQUIPMENT_CATEGORY(category_id),

    CONSTRAINT fk_equipment_room
        FOREIGN KEY (room_id)
        REFERENCES ROOM(room_id),

    CONSTRAINT fk_equipment_department
        FOREIGN KEY (department_id)
        REFERENCES DEPARTMENT(department_id),

    CONSTRAINT chk_equipment_condition
        CHECK (
            condition_status IN (
                'GOOD',
                'DAMAGED',
                'NEEDS_REPAIR',
                'SCRAPPED'
            )
        ),

    CONSTRAINT chk_equipment_status
        CHECK (
            operational_status IN (
                'AVAILABLE',
                'IN_USE',
                'UNDER_MAINTENANCE',
                'RETIRED'
            )
        )
);