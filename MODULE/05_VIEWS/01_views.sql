USE smart_campus_db;

CREATE OR REPLACE VIEW vw_dashboard_summary AS
SELECT
    (SELECT COUNT(*) FROM STUDENT) AS total_students,
    (SELECT COUNT(*) FROM FACULTY) AS total_faculty,
    (SELECT COUNT(*) FROM ROOM) AS total_rooms,
    (SELECT COUNT(*) FROM COMPUTER) AS total_computers;
    
    SELECT * FROM vw_dashboard_summary;