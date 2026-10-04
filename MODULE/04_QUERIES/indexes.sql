USE smart_campus_db;
-- Run once after importing the schema. These indexes support filtered directory pages.
CREATE INDEX idx_room_status_type ON ROOM(status, room_type);
CREATE INDEX idx_computer_lab_status ON COMPUTER(lab_id, status);
CREATE INDEX idx_equipment_category_status ON EQUIPMENT(category_id, operational_status);
CREATE INDEX idx_booking_date_status ON BOOKING(booking_date, booking_status);
CREATE INDEX idx_maintenance_status_priority ON MAINTENANCE_REQUEST(request_status, priority);
CREATE INDEX idx_complaint_status_priority ON COMPLAINT(complaint_status, priority);
