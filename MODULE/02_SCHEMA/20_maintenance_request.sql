CREATE TABLE MAINTENANCE_REQUEST (
    request_id INT AUTO_INCREMENT PRIMARY KEY,

    computer_id INT,
    equipment_id INT,

    reported_by_student_id INT,
    reported_by_faculty_id INT,

    request_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    issue_description VARCHAR(255) NOT NULL,
    priority VARCHAR(20) DEFAULT 'MEDIUM',
    request_status VARCHAR(30) DEFAULT 'OPEN',

    CONSTRAINT fk_maintenance_computer
        FOREIGN KEY (computer_id)
        REFERENCES COMPUTER(computer_id),

    CONSTRAINT fk_maintenance_equipment
        FOREIGN KEY (equipment_id)
        REFERENCES EQUIPMENT(equipment_id),

    CONSTRAINT fk_maintenance_student
        FOREIGN KEY (reported_by_student_id)
        REFERENCES STUDENT(student_id),

    CONSTRAINT fk_maintenance_faculty
        FOREIGN KEY (reported_by_faculty_id)
        REFERENCES FACULTY(faculty_id),

    CONSTRAINT chk_maintenance_asset
        CHECK (
            (computer_id IS NOT NULL AND equipment_id IS NULL)
            OR
            (computer_id IS NULL AND equipment_id IS NOT NULL)
        ),

    CONSTRAINT chk_maintenance_reporter
        CHECK (
            (reported_by_student_id IS NOT NULL AND reported_by_faculty_id IS NULL)
            OR
            (reported_by_student_id IS NULL AND reported_by_faculty_id IS NOT NULL)
        ),

    CONSTRAINT chk_maintenance_priority
        CHECK (
            priority IN ('LOW', 'MEDIUM', 'HIGH', 'CRITICAL')
        ),

    CONSTRAINT chk_maintenance_status
        CHECK (
            request_status IN
            ('OPEN', 'IN_PROGRESS', 'RESOLVED', 'CLOSED', 'CANCELLED')
        )
);