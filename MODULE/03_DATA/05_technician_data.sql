USE smart_campus_db;

INSERT INTO TECHNICIAN (
    employee_code,
    first_name,
    last_name,
    specialization,
    email,
    phone,
    joining_date,
    status
) VALUES
('TECH001', 'Suresh', 'Pawar', 'Computer Hardware',
 'suresh.pawar@smartcampus.edu', '9840003001', '2018-06-18', 'ACTIVE'),

('TECH002', 'Vikas', 'Chavan', 'Networking',
 'vikas.chavan@smartcampus.edu', '9840003002', '2019-07-08', 'ACTIVE'),

('TECH003', 'Ramesh', 'Kale', 'Electrical Equipment',
 'ramesh.kale@smartcampus.edu', '9840003003', '2017-08-14', 'ACTIVE'),

('TECH004', 'Amit', 'Sawant', 'Laboratory Equipment',
 'amit.sawant@smartcampus.edu', '9840003004', '2020-06-22', 'ACTIVE'),

('TECH005', 'Pravin', 'Jadhav', 'Computer Hardware',
 'pravin.jadhav@smartcampus.edu', '9840003005', '2021-07-19', 'ACTIVE'),

('TECH006', 'Nilesh', 'More', 'Network Infrastructure',
 'nilesh.more@smartcampus.edu', '9840003006', '2019-09-02', 'ACTIVE'),

('TECH007', 'Swapnil', 'Patil', 'Audio Visual Equipment',
 'swapnil.patil@smartcampus.edu', '9840003007', '2022-08-01', 'ON_LEAVE'),

('TECH008', 'Manoj', 'Deshmukh', 'Electrical Systems',
 'manoj.deshmukh@smartcampus.edu', '9840003008', '2018-10-15', 'ACTIVE'),

('TECH009', 'Rohit', 'Kulkarni', 'Printer and Peripheral Devices',
 'rohit.kulkarni@smartcampus.edu', '9840003009', '2023-06-26', 'ACTIVE'),

('TECH010', 'Sachin', 'Shinde', 'Laboratory Instruments',
 'sachin.shinde@smartcampus.edu', '9840003010', '2020-11-09', 'INACTIVE');