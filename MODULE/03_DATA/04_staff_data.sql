USE smart_campus_db;

INSERT INTO STAFF (
    employee_code,
    first_name,
    last_name,
    designation,
    email,
    phone,
    joining_date,
    department_id
) VALUES
('STF001', 'Mahesh', 'Jadhav', 'Lab Assistant',
 'mahesh.jadhav@smartcampus.edu', '9830002001', '2019-06-17', 1),

('STF002', 'Kiran', 'More', 'Office Assistant',
 'kiran.more@smartcampus.edu', '9830002002', '2020-07-06', 2),

('STF003', 'Neha', 'Shah', 'Administrative Assistant',
 'neha.shah@smartcampus.edu', '9830002003', '2021-08-02', 9),

('STF004', 'Prakash', 'Pawar', 'Lab Assistant',
 'prakash.pawar@smartcampus.edu', '9830002004', '2018-06-25', 3),

('STF005', 'Sunita', 'Deshmukh', 'Office Assistant',
 'sunita.deshmukh@smartcampus.edu', '9830002005', '2022-07-11', 4),

('STF006', 'Ganesh', 'Kale', 'Lab Attendant',
 'ganesh.kale@smartcampus.edu', '9830002006', '2019-09-16', 5),

('STF007', 'Madhuri', 'Patil', 'Administrative Assistant',
 'madhuri.patil@smartcampus.edu', '9830002007', '2020-06-29', 9),

('STF008', 'Suresh', 'Chavan', 'Store Assistant',
 'suresh.chavan@smartcampus.edu', '9830002008', '2017-07-17', 10),

('STF009', 'Asha', 'Kulkarni', 'Lab Assistant',
 'asha.kulkarni@smartcampus.edu', '9830002009', '2021-08-09', 6),

('STF010', 'Vijay', 'Sawant', 'Technical Assistant',
 'vijay.sawant@smartcampus.edu', '9830002010', '2018-10-01', 7);
 
 SELECT
    staff_id,
    employee_code,
    first_name,
    last_name,
    designation,
    department_id
FROM STAFF
ORDER BY staff_id;