CREATE TABLE EVENT_REGISTRATION (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    student_id INT NOT NULL,
    registration_date DATE NOT NULL,
    attendance_status VARCHAR(20) DEFAULT 'REGISTERED',

    CONSTRAINT fk_registration_event
        FOREIGN KEY (event_id)
        REFERENCES EVENT(event_id)
        ON DELETE CASCADE,

    CONSTRAINT fk_registration_student
        FOREIGN KEY (student_id)
        REFERENCES STUDENT(student_id),

    CONSTRAINT uq_event_student
        UNIQUE (event_id, student_id),

    CONSTRAINT chk_registration_status
        CHECK (
            attendance_status IN
            ('REGISTERED', 'ATTENDED', 'ABSENT', 'CANCELLED')
        )
);