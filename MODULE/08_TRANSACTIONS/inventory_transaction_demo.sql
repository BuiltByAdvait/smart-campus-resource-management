USE smart_campus_db;
-- Demonstration only: it preserves the seeded data.
START TRANSACTION;
SELECT item_id, item_name, current_stock FROM INVENTORY_ITEM WHERE item_id = 1 FOR UPDATE;
SAVEPOINT before_demo_issue;
UPDATE INVENTORY_ITEM SET current_stock = current_stock - 1 WHERE item_id = 1 AND current_stock > 0;
ROLLBACK TO SAVEPOINT before_demo_issue;
COMMIT;

START TRANSACTION;
SAVEPOINT before_invalid_issue;
UPDATE INVENTORY_ITEM SET current_stock = current_stock - 999999 WHERE item_id = 1;
ROLLBACK TO SAVEPOINT before_invalid_issue;
ROLLBACK;
