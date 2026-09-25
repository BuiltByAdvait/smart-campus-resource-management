USE smart_campus_db;

CREATE TABLE STAFF (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_code VARCHAR(20) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    designation VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15),
    joining_date DATE,
    department_id INT,

    CONSTRAINT fk_staff_department
        FOREIGN KEY (department_id)
        REFERENCES DEPARTMENT(department_id)
);