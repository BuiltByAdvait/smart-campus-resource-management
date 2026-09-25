USE smart_campus_db;

INSERT INTO BUILDING (
    building_code,
    building_name,
    building_type,
    campus_id
) VALUES
('BLK-A', 'Academic Block A', 'Academic', 1),
('BLK-B', 'Academic Block B', 'Academic', 1),
('BLK-C', 'Academic Block C', 'Academic', 1),
('BLK-D', 'Science Block', 'Academic', 1),

('LAB-B1', 'Technology Laboratory Block', 'Laboratory', 2),
('LAB-B2', 'Advanced Computing Block', 'Laboratory', 2),

('SCI-B1', 'Science Research Block', 'Research', 3),
('SCI-B2', 'Applied Science Laboratory Block', 'Laboratory', 3);

SELECT
    building_id,
    building_code,
    building_name,
    building_type,
    campus_id
FROM BUILDING
ORDER BY building_id;