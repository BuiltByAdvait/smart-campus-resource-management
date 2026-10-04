INSERT INTO DEPARTMENT (
    department_code,
    department_name,
    office_location,
    email
) VALUES
('AIML', 'Artificial Intelligence and Machine Learning', 'Technology Block', 'aiml@smartcampus.edu'),
('COMP', 'Computer Engineering', 'Technology Block', 'computer@smartcampus.edu'),
('ENTC', 'Electronics and Telecommunication Engineering', 'Academic Block B', 'entc@smartcampus.edu'),
('MECH', 'Mechanical Engineering', 'Academic Block A', 'mech@smartcampus.edu'),
('CIVIL', 'Civil Engineering', 'Academic Block A', 'civil@smartcampus.edu'),
('ELEC', 'Electrical Engineering', 'Academic Block B', 'elec@smartcampus.edu'),
('IT', 'Information Technology', 'Academic Block B', 'it@smartcampus.edu'),
('SCI', 'Applied Sciences', 'Science Block', 'science@smartcampus.edu'),
('ADMIN', 'Administration', 'Main Administrative Block', 'admin@smartcampus.edu'),
('LIB', 'Central Library', 'Library Block', 'library@smartcampus.edu')
ON DUPLICATE KEY UPDATE
    department_name = VALUES(department_name),
    office_location = VALUES(office_location),
    email = VALUES(email);

SELECT
    department_id,
    department_code,
    department_name
FROM DEPARTMENT
ORDER BY department_id;
