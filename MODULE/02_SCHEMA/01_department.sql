USE smart_campus_db;

CREATE TABLE DEPARTMENT (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_code VARCHAR(10) NOT NULL UNIQUE,
    department_name VARCHAR(100) NOT NULL UNIQUE,
    office_location VARCHAR(100),
    email VARCHAR(100)
);

SHOW TABLES;
DESCRIBE DEPARTMENT;