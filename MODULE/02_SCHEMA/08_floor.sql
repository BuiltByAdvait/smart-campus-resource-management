USE smart_campus_db;

CREATE TABLE FLOOR (
    floor_id INT AUTO_INCREMENT PRIMARY KEY,
    floor_number INT NOT NULL,
    floor_name VARCHAR(50),
    building_id INT NOT NULL,

    CONSTRAINT fk_floor_building
        FOREIGN KEY (building_id)
        REFERENCES BUILDING(building_id),

    CONSTRAINT uq_building_floor
        UNIQUE (building_id, floor_number)
);