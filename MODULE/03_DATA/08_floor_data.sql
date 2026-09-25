USE smart_campus_db;

INSERT INTO FLOOR (
    floor_number,
    floor_name,
    building_id
) VALUES
(0, 'Ground Floor', 1),
(1, 'First Floor', 1),
(2, 'Second Floor', 1),

(0, 'Ground Floor', 2),
(1, 'First Floor', 2),
(2, 'Second Floor', 2),

(0, 'Ground Floor', 3),
(1, 'First Floor', 3),

(0, 'Ground Floor', 4),
(1, 'First Floor', 4),

(0, 'Ground Floor', 5),
(1, 'First Floor', 5),

(0, 'Ground Floor', 6),
(1, 'First Floor', 6),

(0, 'Ground Floor', 7),
(1, 'First Floor', 7),

(0, 'Ground Floor', 8),
(1, 'First Floor', 8);

SELECT
    floor_id,
    floor_number,
    floor_name,
    building_id
FROM FLOOR
ORDER BY building_id, floor_number;