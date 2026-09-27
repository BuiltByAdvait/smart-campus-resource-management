USE smart_campus;

DROP PROCEDURE IF EXISTS sp_get_room_safe;

DELIMITER $$

CREATE PROCEDURE sp_get_room_safe(
    IN p_room_id INT
)
BEGIN

    DECLARE v_room_count INT DEFAULT 0;

    /*
    -------------------------------------------------------
    ERROR HANDLER
    -------------------------------------------------------
    */

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN

        ROLLBACK;

        SELECT
            'ERROR' AS result,
            'Database error occurred while processing the request.' AS message;

    END;


    /*
    -------------------------------------------------------
    INPUT VALIDATION
    -------------------------------------------------------
    */

    IF p_room_id IS NULL OR p_room_id <= 0 THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid room ID.';

    END IF;


    /*
    -------------------------------------------------------
    CHECK WHETHER ROOM EXISTS
    -------------------------------------------------------
    */

    SELECT COUNT(*)
    INTO v_room_count
    FROM ROOM
    WHERE room_id = p_room_id;


    IF v_room_count = 0 THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Room does not exist.';

    END IF;


    /*
    -------------------------------------------------------
    RETURN ROOM INFORMATION
    -------------------------------------------------------
    */

    SELECT

        r.room_id,
        r.room_number,
        r.room_name,
        r.room_type,
        r.capacity,
        r.status,

        f.floor_number,
        f.floor_name,

        b.building_name,

        c.campus_name

    FROM ROOM r

    INNER JOIN FLOOR f
        ON f.floor_id = r.floor_id

    INNER JOIN BUILDING b
        ON b.building_id = f.building_id

    INNER JOIN CAMPUS c
        ON c.campus_id = b.campus_id

    WHERE r.room_id = p_room_id;

END $$

DELIMITER ;

CALL sp_get_room_safe(1);

CALL sp_get_room_safe(-1);

CALL sp_get_room_safe(999999);