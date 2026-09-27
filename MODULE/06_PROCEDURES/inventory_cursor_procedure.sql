USE smart_campus;

DROP PROCEDURE IF EXISTS sp_inventory_cursor_report;

DELIMITER $$

CREATE PROCEDURE sp_inventory_cursor_report()
BEGIN

    DECLARE done INT DEFAULT FALSE;

    DECLARE v_inventory_id INT;
    DECLARE v_item_name VARCHAR(255);
    DECLARE v_quantity INT;
    DECLARE v_status VARCHAR(50);

    DECLARE inventory_cursor CURSOR FOR
        SELECT
            inventory_id,
            item_name,
            quantity,
            status
        FROM INVENTORY
        ORDER BY inventory_id;

    DECLARE CONTINUE HANDLER FOR NOT FOUND
        SET done = TRUE;

    OPEN inventory_cursor;

    inventory_loop: LOOP

        FETCH inventory_cursor
        INTO
            v_inventory_id,
            v_item_name,
            v_quantity,
            v_status;

        IF done THEN
            LEAVE inventory_loop;
        END IF;

        SELECT
            v_inventory_id AS inventory_id,
            v_item_name AS item_name,
            v_quantity AS quantity,
            v_status AS status;

    END LOOP;

    CLOSE inventory_cursor;

END $$

DELIMITER ;

CALL sp_inventory_cursor_report();