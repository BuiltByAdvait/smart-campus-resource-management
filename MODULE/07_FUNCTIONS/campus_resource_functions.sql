USE smart_campus_db;

DROP FUNCTION IF EXISTS fn_get_department_student_count;
DROP FUNCTION IF EXISTS fn_get_room_resource_count;
DELIMITER $$
CREATE FUNCTION fn_get_department_student_count(p_department_id INT)
RETURNS INT READS SQL DATA
BEGIN
    DECLARE v_total INT DEFAULT 0;
    SELECT COUNT(*) INTO v_total FROM STUDENT WHERE department_id = p_department_id;
    RETURN v_total;
END $$

CREATE FUNCTION fn_get_room_resource_count(p_room_id INT)
RETURNS INT READS SQL DATA
BEGIN
    DECLARE v_total INT DEFAULT 0;
    SELECT (SELECT COUNT(*) FROM LAB WHERE room_id = p_room_id)
         + (SELECT COUNT(*) FROM EQUIPMENT WHERE room_id = p_room_id)
    INTO v_total;
    RETURN v_total;
END $$
DELIMITER ;
