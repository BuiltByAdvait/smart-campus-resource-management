USE smart_campus_db;

DROP PROCEDURE IF EXISTS sp_inventory_low_stock_report;

DELIMITER $$

CREATE PROCEDURE sp_inventory_low_stock_report()
BEGIN

    DECLARE done INT DEFAULT FALSE;

    DECLARE v_item_id INT;
    DECLARE v_item_code VARCHAR(30);
    DECLARE v_item_name VARCHAR(255);
    DECLARE v_current_stock INT;
    DECLARE v_minimum_stock INT;

    DECLARE inventory_cursor CURSOR FOR
        SELECT
            item_id,
            item_code,
            item_name,
            current_stock,
            minimum_stock
        FROM INVENTORY_ITEM
        WHERE current_stock <= minimum_stock
        ORDER BY current_stock, item_name;

    DECLARE CONTINUE HANDLER FOR NOT FOUND
        SET done = TRUE;

    OPEN inventory_cursor;

    inventory_loop: LOOP

        FETCH inventory_cursor
        INTO
            v_item_id,
            v_item_code,
            v_item_name,
            v_current_stock,
            v_minimum_stock;

        IF done THEN
            LEAVE inventory_loop;
        END IF;

        SELECT
            v_item_id AS item_id,
            v_item_code AS item_code,
            v_item_name AS item_name,
            v_current_stock AS current_stock,
            v_minimum_stock AS minimum_stock,
            IF(v_current_stock = 0, 'OUT_OF_STOCK', 'LOW_STOCK') AS stock_status;

    END LOOP;

    CLOSE inventory_cursor;

END $$

DELIMITER ;

CALL sp_inventory_low_stock_report();
