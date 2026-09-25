USE smart_campus_db;

CREATE TABLE BOOKING (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT NOT NULL,
    booked_by_student_id INT,
    booked_by_faculty_id INT,
    booking_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    purpose VARCHAR(255),
    booking_status VARCHAR(20) DEFAULT 'CONFIRMED',

    CONSTRAINT fk_booking_room
        FOREIGN KEY (room_id)
        REFERENCES ROOM(room_id),

    CONSTRAINT fk_booking_student
        FOREIGN KEY (booked_by_student_id)
        REFERENCES STUDENT(student_id),

    CONSTRAINT fk_booking_faculty
        FOREIGN KEY (booked_by_faculty_id)
        REFERENCES FACULTY(faculty_id),

    CONSTRAINT chk_booking_booker
        CHECK (
            (booked_by_student_id IS NOT NULL AND booked_by_faculty_id IS NULL)
            OR
            (booked_by_student_id IS NULL AND booked_by_faculty_id IS NOT NULL)
        ),

    CONSTRAINT chk_booking_time
        CHECK (end_time > start_time),

    CONSTRAINT chk_booking_status
        CHECK (
            booking_status IN (
                'PENDING',
                'CONFIRMED',
                'CANCELLED',
                'COMPLETED'
            )
        )
);