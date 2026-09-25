DELETE FROM DEPARTMENT
WHERE department_id >= 14;

ALTER TABLE DEPARTMENT AUTO_INCREMENT = 4;

INSERT INTO DEPARTMENT (
    department_code,
    department_name,
    office_location,
    email
) VALUES
('MECH', 'Mechanical Engineering', 'Academic Block A', 'mech@smartcampus.edu'),
('CIVIL', 'Civil Engineering', 'Academic Block A', 'civil@smartcampus.edu'),
('ELEC', 'Electrical Engineering', 'Academic Block B', 'elec@smartcampus.edu'),
('IT', 'Information Technology', 'Academic Block B', 'it@smartcampus.edu'),
('SCI', 'Applied Sciences', 'Science Block', 'science@smartcampus.edu'),
('ADMIN', 'Administration', 'Main Administrative Block', 'admin@smartcampus.edu'),
('LIB', 'Central Library', 'Library Block', 'library@smartcampus.edu');

SELECT
    department_id,
    department_code,
    department_name
FROM DEPARTMENT
ORDER BY department_id;