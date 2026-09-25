CREATE TABLE COMPLAINT (
    complaint_id INT AUTO_INCREMENT PRIMARY KEY,

    student_id INT,
    faculty_id INT,

    complaint_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    complaint_type VARCHAR(50) NOT NULL,
    subject VARCHAR(150) NOT NULL,
    description VARCHAR(255) NOT NULL,

    priority VARCHAR(20) DEFAULT 'MEDIUM',
    complaint_status VARCHAR(20) DEFAULT 'OPEN',

    resolution_date DATETIME,
    resolution_remarks VARCHAR(255),

    CONSTRAINT fk_complaint_student
        FOREIGN KEY (student_id)
        REFERENCES STUDENT(student_id),

    CONSTRAINT fk_complaint_faculty
        FOREIGN KEY (faculty_id)
        REFERENCES FACULTY(faculty_id),

    CONSTRAINT chk_complaint_reporter
        CHECK (
            (student_id IS NOT NULL AND faculty_id IS NULL)
            OR
            (student_id IS NULL AND faculty_id IS NOT NULL)
        ),

    CONSTRAINT chk_complaint_priority
        CHECK (
            priority IN ('LOW', 'MEDIUM', 'HIGH', 'CRITICAL')
        ),

    CONSTRAINT chk_complaint_status
        CHECK (
            complaint_status IN
            ('OPEN', 'IN_PROGRESS', 'RESOLVED', 'CLOSED', 'REJECTED')
        ),

    CONSTRAINT chk_complaint_resolution
        CHECK (
            resolution_date IS NULL
            OR resolution_date >= complaint_date
        )
);