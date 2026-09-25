CREATE TABLE MAINTENANCE_ASSIGNMENT (
    assignment_id INT AUTO_INCREMENT PRIMARY KEY,

    request_id INT NOT NULL,
    technician_id INT NOT NULL,

    assigned_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    completed_date DATETIME,

    work_description VARCHAR(255),
    assignment_status VARCHAR(20) DEFAULT 'ASSIGNED',

    CONSTRAINT fk_assignment_request
        FOREIGN KEY (request_id)
        REFERENCES MAINTENANCE_REQUEST(request_id)
        ON DELETE CASCADE,

    CONSTRAINT fk_assignment_technician
        FOREIGN KEY (technician_id)
        REFERENCES TECHNICIAN(technician_id),

    CONSTRAINT chk_assignment_status
        CHECK (
            assignment_status IN
            ('ASSIGNED', 'IN_PROGRESS', 'COMPLETED', 'CANCELLED')
        ),

    CONSTRAINT chk_assignment_dates
        CHECK (
            completed_date IS NULL
            OR completed_date >= assigned_date
        ),

    CONSTRAINT uq_request_technician
        UNIQUE (request_id, technician_id)
);