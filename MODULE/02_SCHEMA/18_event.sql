USE smart_campus_db;

CREATE TABLE EVENT (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(150) NOT NULL,
    event_type VARCHAR(50),
    description VARCHAR(255),
    event_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    room_id INT,
    organizing_department_id INT,
    coordinator_faculty_id INT,
    max_participants INT,
    status VARCHAR(20) DEFAULT 'PLANNED',

    CONSTRAINT fk_event_room
        FOREIGN KEY (room_id)
        REFERENCES ROOM(room_id),

    CONSTRAINT fk_event_department
        FOREIGN KEY (organizing_department_id)
        REFERENCES DEPARTMENT(department_id),

    CONSTRAINT fk_event_coordinator
        FOREIGN KEY (coordinator_faculty_id)
        REFERENCES FACULTY(faculty_id),

    CONSTRAINT chk_event_time
        CHECK (end_time > start_time),

    CONSTRAINT chk_event_participants
        CHECK (max_participants > 0),

    CONSTRAINT chk_event_status
        CHECK (
            status IN (
                'PLANNED',
                'ONGOING',
                'COMPLETED',
                'CANCELLED'
            )
        )
);