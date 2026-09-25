USE smart_campus_db;

CREATE TABLE CAMPUS (
    campus_id INT AUTO_INCREMENT PRIMARY KEY,
    campus_code VARCHAR(20) NOT NULL UNIQUE,
    campus_name VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    city VARCHAR(50),
    contact_no VARCHAR(15)
);