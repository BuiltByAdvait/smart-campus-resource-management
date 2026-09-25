CREATE TABLE RESOURCE_ALLOCATION (
    allocation_id INT AUTO_INCREMENT PRIMARY KEY,

    department_id INT NOT NULL,

    room_id INT,
    computer_id INT,
    equipment_id INT,

    allocation_date DATE NOT NULL,
    return_date DATE,

    allocation_purpose VARCHAR(255),
    allocation_status VARCHAR(20) DEFAULT 'ACTIVE',

    CONSTRAINT fk_allocation_department
        FOREIGN KEY (department_id)
        REFERENCES DEPARTMENT(department_id),

    CONSTRAINT fk_allocation_room
        FOREIGN KEY (room_id)
        REFERENCES ROOM(room_id),

    CONSTRAINT fk_allocation_computer
        FOREIGN KEY (computer_id)
        REFERENCES COMPUTER(computer_id),

    CONSTRAINT fk_allocation_equipment
        FOREIGN KEY (equipment_id)
        REFERENCES EQUIPMENT(equipment_id),

    CONSTRAINT chk_allocation_resource
        CHECK (
            (room_id IS NOT NULL AND computer_id IS NULL AND equipment_id IS NULL)
            OR
            (room_id IS NULL AND computer_id IS NOT NULL AND equipment_id IS NULL)
            OR
            (room_id IS NULL AND computer_id IS NULL AND equipment_id IS NOT NULL)
        ),

    CONSTRAINT chk_allocation_dates
        CHECK (
            return_date IS NULL
            OR return_date >= allocation_date
        ),

    CONSTRAINT chk_allocation_status
        CHECK (
            allocation_status IN
            ('ACTIVE', 'RETURNED', 'CANCELLED')
        )
);