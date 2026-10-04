USE smart_campus_db;

DROP PROCEDURE IF EXISTS sp_get_building_rooms;
DROP PROCEDURE IF EXISTS sp_get_room_details;
DROP PROCEDURE IF EXISTS sp_get_building_summary;

DELIMITER $$

/*
===========================================================
1. GET ALL ROOMS OF A BUILDING
===========================================================
*/

CREATE PROCEDURE sp_get_building_rooms(
    IN p_building_id INT
)
BEGIN

    SELECT
        b.building_id,
        b.building_name,

        f.floor_id,
        f.floor_number,
        f.floor_name,

        r.room_id,
        r.room_number,
        r.room_name,
        r.room_type,
        r.capacity,
        r.status

    FROM BUILDING b

    INNER JOIN FLOOR f
        ON f.building_id = b.building_id

    INNER JOIN ROOM r
        ON r.floor_id = f.floor_id

    WHERE b.building_id = p_building_id

    ORDER BY
        f.floor_number ASC,
        r.room_number ASC;

END $$


/*
===========================================================
2. GET COMPLETE ROOM DETAILS
===========================================================
*/

CREATE PROCEDURE sp_get_room_details(
    IN p_room_id INT
)
BEGIN

    SELECT
        r.room_id,
        r.room_number,
        r.room_name,
        r.room_type,
        r.capacity,
        r.status,

        f.floor_id,
        f.floor_number,
        f.floor_name,

        b.building_id,
        b.building_name,

        c.campus_id,
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


/*
===========================================================
3. BUILDING RESOURCE SUMMARY
===========================================================
*/

CREATE PROCEDURE sp_get_building_summary(
    IN p_building_id INT
)
BEGIN

    SELECT

        b.building_id,
        b.building_name,

        c.campus_id,
        c.campus_name,

        COUNT(DISTINCT f.floor_id) AS total_floors,

        COUNT(DISTINCT r.room_id) AS total_rooms,

        COALESCE(SUM(r.capacity), 0) AS total_capacity

    FROM BUILDING b

    INNER JOIN CAMPUS c
        ON c.campus_id = b.campus_id

    LEFT JOIN FLOOR f
        ON f.building_id = b.building_id

    LEFT JOIN ROOM r
        ON r.floor_id = f.floor_id

    WHERE b.building_id = p_building_id

    GROUP BY
        b.building_id,
        b.building_name,
        c.campus_id,
        c.campus_name;

END $$

DELIMITER ;

CALL sp_get_building_rooms(1);

CALL sp_get_room_details(1);

CALL sp_get_building_summary(1);