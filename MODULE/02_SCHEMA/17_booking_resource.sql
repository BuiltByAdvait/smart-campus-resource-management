USE smart_campus_db;

CREATE TABLE BOOKING_RESOURCE (
    booking_resource_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    equipment_id INT NOT NULL,
    quantity INT DEFAULT 1,

    CONSTRAINT fk_booking_resource_booking
        FOREIGN KEY (booking_id)
        REFERENCES BOOKING(booking_id)
        ON DELETE CASCADE,

    CONSTRAINT fk_booking_resource_equipment
        FOREIGN KEY (equipment_id)
        REFERENCES EQUIPMENT(equipment_id),

    CONSTRAINT chk_booking_resource_quantity
        CHECK (quantity > 0),

    CONSTRAINT uq_booking_equipment
        UNIQUE (booking_id, equipment_id)
);