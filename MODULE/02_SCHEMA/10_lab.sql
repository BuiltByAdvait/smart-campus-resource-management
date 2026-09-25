USE smart_campus_db;

CREATE TABLE LAB (
    lab_id INT AUTO_INCREMENT PRIMARY KEY,
    lab_code VARCHAR(20) NOT NULL UNIQUE,
    lab_name VARCHAR(100) NOT NULL,
    lab_type VARCHAR(50),
    department_id INT,
    room_id INT NOT NULL UNIQUE,
    capacity INT,
    status VARCHAR(20) DEFAULT 'ACTIVE',

    CONSTRAINT fk_lab_department
        FOREIGN KEY (department_id)
        REFERENCES DEPARTMENT(department_id),

    CONSTRAINT fk_lab_room
        FOREIGN KEY (room_id)
        REFERENCES ROOM(room_id),

    CONSTRAINT chk_lab_capacity
        CHECK (capacity > 0),

    CONSTRAINT chk_lab_status
        CHECK (
            status IN (
                'ACTIVE',
                'INACTIVE',
                'MAINTENANCE'
            )
        )
);