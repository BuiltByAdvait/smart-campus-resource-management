USE smart_campus_db;

CREATE TABLE BUILDING (
    building_id INT AUTO_INCREMENT PRIMARY KEY,
    building_code VARCHAR(20) NOT NULL UNIQUE,
    building_name VARCHAR(100) NOT NULL,
    building_type VARCHAR(50),
    campus_id INT NOT NULL,

    CONSTRAINT fk_building_campus
        FOREIGN KEY (campus_id)
        REFERENCES CAMPUS(campus_id)
);