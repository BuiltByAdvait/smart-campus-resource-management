INSERT INTO STUDENT (
    enrollment_no,
    first_name,
    last_name,
    gender,
    date_of_birth,
    email,
    phone,
    admission_year,
    semester,
    department_id
) VALUES
('AIML001', 'Advait', 'Patil', 'Male', '2007-05-14', 'advait.patil@smartcampus.edu', '9876500001', 2024, 5, 1),
('AIML002', 'Aarav', 'Sharma', 'Male', '2007-08-21', 'aarav.sharma@smartcampus.edu', '9876500002', 2024, 5, 1),
('AIML003', 'Isha', 'Mehta', 'Female', '2007-02-18', 'isha.mehta@smartcampus.edu', '9876500003', 2024, 5, 1),
('AIML004', 'Kunal', 'Joshi', 'Male', '2007-11-03', 'kunal.joshi@smartcampus.edu', '9876500004', 2024, 5, 1),

('COMP001', 'Nirbhay', 'Joshi', 'Male', '2007-03-18', 'nirbhay.joshi@smartcampus.edu', '9876500005', 2024, 5, 2),
('COMP002', 'Rohan', 'Deshmukh', 'Male', '2007-11-09', 'rohan.deshmukh@smartcampus.edu', '9876500006', 2024, 5, 2),
('COMP003', 'Siddhant', 'Shah', 'Male', '2007-06-24', 'siddhant.shah@smartcampus.edu', '9876500007', 2024, 5, 2),
('COMP004', 'Anjali', 'Kulkarni', 'Female', '2007-09-17', 'anjali.kulkarni@smartcampus.edu', '9876500008', 2024, 5, 2),

('ENTC001', 'Shreyash', 'Kulkarni', 'Male', '2007-06-11', 'shreyash.kulkarni@smartcampus.edu', '9876500009', 2024, 5, 3),
('ENTC002', 'Tanvi', 'Pawar', 'Female', '2007-10-05', 'tanvi.pawar@smartcampus.edu', '9876500010', 2024, 5, 3),

('MECH001', 'Parth', 'Shinde', 'Male', '2007-02-27', 'parth.shinde@smartcampus.edu', '9876500011', 2024, 5, 4),
('MECH002', 'Omkar', 'More', 'Male', '2007-07-19', 'omkar.more@smartcampus.edu', '9876500012', 2024, 5, 4),

('CIVIL001', 'Ananya', 'Patil', 'Female', '2007-12-15', 'ananya.patil@smartcampus.edu', '9876500013', 2024, 5, 5),

('ELEC001', 'Akshay', 'Jadhav', 'Male', '2007-04-22', 'akshay.jadhav@smartcampus.edu', '9876500014', 2024, 5, 6),

('IT001', 'Ishaan', 'Mehta', 'Male', '2007-09-04', 'ishaan.mehta@smartcampus.edu', '9876500015', 2024, 5, 7),
('IT002', 'Snehal', 'Desai', 'Female', '2007-01-28', 'snehal.desai@smartcampus.edu', '9876500016', 2024, 5, 7),

('SCI001', 'Rahul', 'Verma', 'Male', '2007-05-30', 'rahul.verma@smartcampus.edu', '9876500017', 2024, 5, 8)
ON DUPLICATE KEY UPDATE
    first_name = VALUES(first_name), last_name = VALUES(last_name), gender = VALUES(gender),
    date_of_birth = VALUES(date_of_birth), email = VALUES(email), phone = VALUES(phone),
    admission_year = VALUES(admission_year), semester = VALUES(semester), department_id = VALUES(department_id);

SELECT
    student_id,
    enrollment_no,
    first_name,
    last_name,
    department_id
FROM STUDENT
ORDER BY student_id;
