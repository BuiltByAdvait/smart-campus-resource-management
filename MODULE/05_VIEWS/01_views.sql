USE smart_campus_db;

CREATE OR REPLACE VIEW vw_dashboard_summary AS
SELECT
    (SELECT COUNT(*) FROM STUDENT) AS total_students,
    (SELECT COUNT(*) FROM FACULTY) AS total_faculty,
    (SELECT COUNT(*) FROM BUILDING) AS total_buildings,
    (SELECT COUNT(*) FROM ROOM) AS total_rooms,
    (SELECT COUNT(*) FROM LAB) AS total_labs,
    (SELECT COUNT(*) FROM COMPUTER) AS total_computers,
    (SELECT COUNT(*) FROM EQUIPMENT) AS total_equipment,
    (SELECT COUNT(*) FROM INVENTORY_ITEM) AS total_inventory_items,
    (SELECT COUNT(*) FROM BOOKING WHERE booking_status IN ('PENDING', 'CONFIRMED')) AS active_bookings,
    (SELECT COUNT(*) FROM EVENT WHERE event_date >= CURDATE() AND status IN ('PLANNED', 'ONGOING')) AS upcoming_events,
    (SELECT COUNT(*) FROM MAINTENANCE_REQUEST WHERE request_status IN ('OPEN', 'IN_PROGRESS')) AS open_maintenance_requests,
    (SELECT COUNT(*) FROM COMPLAINT WHERE complaint_status IN ('OPEN', 'IN_PROGRESS')) AS open_complaints;

CREATE OR REPLACE VIEW vw_campus_room_directory AS
SELECT c.campus_name, b.building_name, f.floor_number, r.room_id, r.room_number,
       r.room_name, r.room_type, r.capacity, r.status
FROM CAMPUS c JOIN BUILDING b ON b.campus_id = c.campus_id
JOIN FLOOR f ON f.building_id = b.building_id JOIN ROOM r ON r.floor_id = f.floor_id;

CREATE OR REPLACE VIEW vw_lab_computer_inventory AS
SELECT l.lab_id, l.lab_code, l.lab_name, l.status AS lab_status, r.room_number,
       c.computer_id, c.asset_tag, c.processor, c.ram_gb, c.storage_gb,
       c.storage_type, c.operating_system, c.status AS computer_status
FROM LAB l JOIN ROOM r ON r.room_id = l.room_id LEFT JOIN COMPUTER c ON c.lab_id = l.lab_id;

CREATE OR REPLACE VIEW vw_maintenance_overview AS
SELECT mr.request_id, mr.request_date, mr.issue_description, mr.priority, mr.request_status,
       COALESCE(computer.asset_tag, equipment.asset_tag) AS asset_tag,
       COALESCE(computer.asset_tag, equipment.equipment_name) AS resource_name,
       CONCAT(technician.first_name, ' ', technician.last_name) AS technician_name,
       ma.assignment_status, ma.assigned_date, ma.completed_date
FROM MAINTENANCE_REQUEST mr
LEFT JOIN COMPUTER computer ON computer.computer_id = mr.computer_id
LEFT JOIN EQUIPMENT equipment ON equipment.equipment_id = mr.equipment_id
LEFT JOIN MAINTENANCE_ASSIGNMENT ma ON ma.request_id = mr.request_id
LEFT JOIN TECHNICIAN technician ON technician.technician_id = ma.technician_id;

SELECT * FROM vw_dashboard_summary;
