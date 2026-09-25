USE smart_campus_db;

CREATE TABLE ROOM (
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(20) NOT NULL,
    room_name VARCHAR(100),
    room_type VARCHAR(50),
    capacity INT,
    floor_id INT NOT NULL,
    status VARCHAR(20) DEFAULT 'AVAILABLE',

    CONSTRAINT fk_room_floor
        FOREIGN KEY (floor_id)
        REFERENCES FLOOR(floor_id),

    CONSTRAINT chk_room_capacity
        CHECK (capacity > 0),

    CONSTRAINT chk_room_status
        CHECK (
            status IN (
                'AVAILABLE',
                'OCCUPIED',
                'MAINTENANCE',
                'CLOSED'
            )
        ),

    CONSTRAINT uq_floor_room
        UNIQUE (floor_id, room_number)
);