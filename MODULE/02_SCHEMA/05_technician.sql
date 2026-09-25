USE smart_campus_db;

CREATE TABLE TECHNICIAN (
    technician_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_code VARCHAR(20) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    specialization VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15),
    joining_date DATE,
    status VARCHAR(20) DEFAULT 'ACTIVE',

    CONSTRAINT chk_technician_status
        CHECK (status IN ('ACTIVE', 'INACTIVE', 'ON_LEAVE'))
);