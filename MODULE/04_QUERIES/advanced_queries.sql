USE smart_campus_db;
-- JOIN, GROUP BY and HAVING
SELECT d.department_name, COUNT(s.student_id) AS student_count
FROM DEPARTMENT d LEFT JOIN STUDENT s ON s.department_id = d.department_id
GROUP BY d.department_id, d.department_name HAVING COUNT(s.student_id) >= 1
ORDER BY student_count DESC;
-- IN, BETWEEN and LIKE
SELECT event_name, event_date, status FROM EVENT
WHERE status IN ('PLANNED', 'ONGOING') AND event_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 90 DAY)
  AND event_name LIKE '% %';
-- Subquery
SELECT item_code, item_name, current_stock, minimum_stock FROM INVENTORY_ITEM
WHERE item_id IN (SELECT item_id FROM INVENTORY_TRANSACTION WHERE transaction_type = 'OUT')
  AND current_stock <= minimum_stock;
-- Set operation
SELECT CONCAT(first_name, ' ', last_name) AS booked_by, 'STUDENT' AS person_type FROM STUDENT
WHERE student_id IN (SELECT booked_by_student_id FROM BOOKING WHERE booked_by_student_id IS NOT NULL)
UNION
SELECT CONCAT(first_name, ' ', last_name), 'FACULTY' FROM FACULTY
WHERE faculty_id IN (SELECT booked_by_faculty_id FROM BOOKING WHERE booked_by_faculty_id IS NOT NULL);
