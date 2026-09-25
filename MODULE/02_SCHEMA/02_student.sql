USE smart_campus_db;

CREATE TABLE STUDENT (
    student_id INT AUTO_INCREMENT PRIMARY KEY,

    enrollment_no VARCHAR(20) NOT NULL UNIQUE,

    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,

    gender VARCHAR(10),

    date_of_birth DATE,

    email VARCHAR(100) UNIQUE,

    phone VARCHAR(15),

    admission_year YEAR,

    semester INT,

    department_id INT NOT NULL,

    CONSTRAINT fk_student_department
        FOREIGN KEY (department_id)
        REFERENCES DEPARTMENT(department_id),

    CONSTRAINT chk_student_semester
        CHECK (semester BETWEEN 1 AND 8)
);

SHOW TABLES;
DESCRIBE STUDENT;
SHOW CREATE TABLE STUDENT;

SELECT
    s.student_id,
    s.enrollment_no,
    CONCAT(s.first_name, ' ', s.last_name) AS student_name,
    d.department_code,
    d.department_name
FROM STUDENT s
JOIN DEPARTMENT d
    ON s.department_id = d.department_id;