USE smart_campus_db;

INSERT INTO EQUIPMENT (
    asset_tag,
    equipment_name,
    category_id,
    serial_number,
    room_id,
    department_id,
    purchase_date,
    warranty_expiry,
    condition_status,
    operational_status
) VALUES

('EQ-PROJ-001', 'Epson EB-X06 Projector', 1,
 'EPX06-2024-001', 6, 1,
 '2024-06-10', '2027-06-09', 'GOOD', 'AVAILABLE'),

('EQ-PROJ-002', 'BenQ MW560 Projector', 1,
 'BNQ560-2024-002', 23, 8,
 '2024-07-15', '2027-07-14', 'GOOD', 'IN_USE'),

('EQ-PRINT-001', 'HP LaserJet Pro Printer', 2,
 'HPLJ-2024-001', 7, 2,
 '2024-05-20', '2027-05-19', 'GOOD', 'AVAILABLE'),

('EQ-PRINT-002', 'Canon ImageCLASS Printer', 2,
 'CNLJ-2024-002', 8, 7,
 '2023-11-15', '2026-11-14', 'GOOD', 'IN_USE'),

('EQ-UPS-001', 'APC Smart-UPS 1500VA', 3,
 'APC1500-2024-001', 4, 1,
 '2024-04-12', '2027-04-11', 'GOOD', 'AVAILABLE'),

('EQ-UPS-002', 'APC Easy UPS 1200VA', 3,
 'APC1200-2024-002', 5, 2,
 '2024-05-08', '2027-05-07', 'GOOD', 'AVAILABLE'),

('EQ-NET-001', 'Cisco Catalyst 24-Port Switch', 4,
 'CSC24-2024-001', 25, 7,
 '2024-06-25', '2027-06-24', 'GOOD', 'IN_USE'),

('EQ-NET-002', 'TP-Link Wireless Access Point', 4,
 'TPLAP-2024-002', 26, 7,
 '2024-07-18', '2027-07-17', 'GOOD', 'AVAILABLE'),

('EQ-NET-003', 'Cisco ISR Router', 4,
 'CSISR-2024-003', 25, 7,
 '2023-09-10', '2026-09-09', 'NEEDS_REPAIR', 'UNDER_MAINTENANCE'),

('EQ-AUDIO-001', 'JBL Professional Speaker System', 5,
 'JBLSPK-2024-001', 6, 1,
 '2024-01-15', '2027-01-14', 'GOOD', 'AVAILABLE'),

('EQ-AUDIO-002', 'Shure Wireless Microphone Set', 5,
 'SHURE-2024-002', 6, 1,
 '2024-02-20', '2027-02-19', 'GOOD', 'AVAILABLE'),

('EQ-CAM-001', 'Canon EOS 200D II Camera', 6,
 'CNEOS-2024-001', 30, 1,
 '2024-03-12', '2027-03-11', 'GOOD', 'AVAILABLE'),

('EQ-CAM-002', 'Sony 4K Video Camera', 6,
 'SONY4K-2024-002', 31, 8,
 '2023-08-20', '2026-08-19', 'GOOD', 'IN_USE'),

('EQ-LAB-001', 'Digital Storage Oscilloscope', 7,
 'DSO-2024-001', 9, 3,
 '2024-06-05', '2027-06-04', 'GOOD', 'AVAILABLE'),

('EQ-LAB-002', 'Digital Multimeter Set', 7,
 'DMM-2024-002', 10, 3,
 '2024-06-05', '2027-06-04', 'GOOD', 'AVAILABLE'),

('EQ-LAB-003', '3D Printer', 7,
 '3DP-2024-003', 33, 4,
 '2024-08-10', '2027-08-09', 'GOOD', 'AVAILABLE'),

('EQ-LAB-004', 'Digital Laboratory Weighing Scale', 7,
 'DLWS-2024-004', 21, 8,
 '2023-12-10', '2026-12-09', 'GOOD', 'AVAILABLE'),

('EQ-DISP-001', 'Samsung 65-inch Interactive Display', 8,
 'SAMDISP-2024-001', 6, 1,
 '2024-07-25', '2027-07-24', 'GOOD', 'AVAILABLE'),

('EQ-DISP-002', 'LG 55-inch Smart Display', 8,
 'LGDISP-2024-002', 23, 8,
 '2024-08-15', '2027-08-14', 'GOOD', 'IN_USE'),

('EQ-SCAN-001', 'Epson Document Scanner', 9,
 'EPSCAN-2024-001', 7, 2,
 '2024-04-18', '2027-04-17', 'GOOD', 'AVAILABLE'),

('EQ-SCAN-002', 'Canon Document Scanner', 9,
 'CNSCAN-2024-002', 19, 7,
 '2023-10-05', '2026-10-04', 'GOOD', 'AVAILABLE'),

('EQ-POWER-001', 'Voltage Stabilizer 5KVA', 10,
 'VS5KVA-2024-001', 12, 4,
 '2024-02-12', '2027-02-11', 'GOOD', 'AVAILABLE'),

('EQ-POWER-002', 'Electrical Power Distribution Unit', 10,
 'EPDU-2024-002', 16, 6,
 '2024-03-18', '2027-03-17', 'GOOD', 'IN_USE'),

('EQ-PROJ-003', 'ViewSonic Short Throw Projector', 1,
 'VSPROJ-2024-003', 28, 2,
 '2024-09-05', '2027-09-04', 'GOOD', 'AVAILABLE'),

('EQ-NET-004', 'Aruba Managed Network Switch', 4,
 'ARUBA-2024-004', 27, 2,
 '2024-09-12', '2027-09-11', 'GOOD', 'AVAILABLE'),

('EQ-LAB-005', 'Arduino Development Kit Set', 7,
 'ARD-2024-005', 28, 2,
 '2024-10-01', '2027-09-30', 'GOOD', 'IN_USE'),

('EQ-LAB-006', 'Raspberry Pi Development Kit', 7,
 'RPI-2024-006', 30, 1,
 '2024-10-10', '2027-10-09', 'GOOD', 'IN_USE'),

('EQ-DISP-003', 'BenQ Interactive Flat Panel', 8,
 'BENQIFP-2024-003', 32, 1,
 '2024-10-15', '2027-10-14', 'GOOD', 'AVAILABLE');