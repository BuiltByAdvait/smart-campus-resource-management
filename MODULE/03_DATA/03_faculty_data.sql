USE smart_campus_db;

INSERT INTO FACULTY (
    employee_code,
    first_name,
    last_name,
    designation,
    email,
    phone,
    joining_date,
    department_id
) VALUES
('FAC001', 'Rahul', 'Kulkarni', 'Professor',
 'rahul.kulkarni@smartcampus.edu', '9820001001', '2018-06-15', 1),

('FAC002', 'Sneha', 'Joshi', 'Assistant Professor',
 'sneha.joshi@smartcampus.edu', '9820001002', '2020-07-01', 2),

('FAC003', 'Amit', 'Patil', 'Associate Professor',
 'amit.patil@smartcampus.edu', '9820001003', '2017-08-10', 3),

('FAC004', 'Pooja', 'Deshmukh', 'Assistant Professor',
 'pooja.deshmukh@smartcampus.edu', '9820001004', '2021-06-21', 7),

('FAC005', 'Vivek', 'Shinde', 'Professor',
 'vivek.shinde@smartcampus.edu', '9820001005', '2016-07-11', 4),

('FAC006', 'Neha', 'Pawar', 'Assistant Professor',
 'neha.pawar@smartcampus.edu', '9820001006', '2022-08-01', 5),

('FAC007', 'Sanjay', 'More', 'Associate Professor',
 'sanjay.more@smartcampus.edu', '9820001007', '2019-07-15', 6),

('FAC008', 'Kavita', 'Desai', 'Assistant Professor',
 'kavita.desai@smartcampus.edu', '9820001008', '2021-08-16', 8),

('FAC009', 'Rohan', 'Jadhav', 'Assistant Professor',
 'rohan.jadhav@smartcampus.edu', '9820001009', '2023-07-03', 1),

('FAC010', 'Priya', 'Shah', 'Associate Professor',
 'priya.shah@smartcampus.edu', '9820001010', '2018-09-12', 2),

('FAC011', 'Nitin', 'Chavan', 'Professor',
 'nitin.chavan@smartcampus.edu', '9820001011', '2015-06-18', 3),

('FAC012', 'Swati', 'Joshi', 'Assistant Professor',
 'swati.joshi@smartcampus.edu', '9820001012', '2022-07-25', 4),

('FAC013', 'Deepak', 'Kale', 'Assistant Professor',
 'deepak.kale@smartcampus.edu', '9820001013', '2020-08-05', 5),

('FAC014', 'Meenal', 'Patil', 'Associate Professor',
 'meenal.patil@smartcampus.edu', '9820001014', '2017-07-17', 6),

('FAC015', 'Akash', 'Sawant', 'Assistant Professor',
 'akash.sawant@smartcampus.edu', '9820001015', '2023-06-26', 7),

('FAC016', 'Ritu', 'Verma', 'Assistant Professor',
 'ritu.verma@smartcampus.edu', '9820001016', '2021-09-01', 8);
 
 SELECT
    faculty_id,
    employee_code,
    first_name,
    last_name,
    designation,
    department_id
FROM FACULTY
ORDER BY faculty_id;