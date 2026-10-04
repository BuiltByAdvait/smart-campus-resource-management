USE smart_campus_db;
SHOW TABLES;
SELECT 'STUDENT' AS table_name, COUNT(*) AS row_count FROM STUDENT UNION ALL SELECT 'FACULTY', COUNT(*) FROM FACULTY UNION ALL SELECT 'ROOM', COUNT(*) FROM ROOM UNION ALL SELECT 'LAB', COUNT(*) FROM LAB UNION ALL SELECT 'COMPUTER', COUNT(*) FROM COMPUTER UNION ALL SELECT 'EQUIPMENT', COUNT(*) FROM EQUIPMENT UNION ALL SELECT 'BOOKING', COUNT(*) FROM BOOKING;
-- Every integrity query below should return zero rows.
SELECT s.student_id FROM STUDENT s LEFT JOIN DEPARTMENT d ON d.department_id=s.department_id WHERE d.department_id IS NULL;
SELECT b.building_id FROM BUILDING b LEFT JOIN CAMPUS c ON c.campus_id=b.campus_id WHERE c.campus_id IS NULL;
SELECT r.room_id FROM ROOM r LEFT JOIN FLOOR f ON f.floor_id=r.floor_id WHERE f.floor_id IS NULL;
SELECT l.lab_id FROM LAB l LEFT JOIN ROOM r ON r.room_id=l.room_id WHERE r.room_id IS NULL;
SELECT c.computer_id FROM COMPUTER c LEFT JOIN LAB l ON l.lab_id=c.lab_id WHERE l.lab_id IS NULL;
SELECT ma.assignment_id FROM MAINTENANCE_ASSIGNMENT ma LEFT JOIN TECHNICIAN t ON t.technician_id=ma.technician_id WHERE t.technician_id IS NULL;
SELECT fn_get_department_student_count(1), fn_get_room_resource_count(1);
CALL sp_get_building_summary(1);
CALL sp_inventory_low_stock_report();
SELECT * FROM vw_campus_room_directory LIMIT 5;
EXPLAIN SELECT * FROM BOOKING WHERE booking_date = CURDATE() AND booking_status = 'CONFIRMED';
