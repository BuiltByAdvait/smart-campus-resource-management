USE smart_campus_db;

INSERT INTO COMPUTER (
    asset_tag,
    serial_number,
    lab_id,
    processor,
    ram_gb,
    storage_gb,
    storage_type,
    operating_system,
    purchase_date,
    warranty_expiry,
    status
) VALUES

('CMP-AI-001', 'SN-AI-2024-001', 1,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-06-15', '2027-06-14', 'WORKING'),

('CMP-AI-002', 'SN-AI-2024-002', 1,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-06-15', '2027-06-14', 'WORKING'),

('CMP-AI-003', 'SN-AI-2024-003', 1,
 'AMD Ryzen 5 5600G', 16, 512, 'SSD',
 'Ubuntu 24.04', '2024-07-10', '2027-07-09', 'WORKING'),

('CMP-AI-004', 'SN-AI-2024-004', 1,
 'AMD Ryzen 5 5600G', 16, 512, 'SSD',
 'Ubuntu 24.04', '2024-07-10', '2027-07-09', 'UNDER_MAINTENANCE'),

('CMP-COMP-001', 'SN-COMP-2024-001', 2,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-06-20', '2027-06-19', 'WORKING'),

('CMP-COMP-002', 'SN-COMP-2024-002', 2,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-06-20', '2027-06-19', 'WORKING'),

('CMP-COMP-003', 'SN-COMP-2024-003', 2,
 'Intel Core i7-12700', 32, 1000, 'NVMe',
 'Windows 11 Pro', '2024-08-05', '2027-08-04', 'WORKING'),

('CMP-COMP-004', 'SN-COMP-2024-004', 2,
 'Intel Core i7-12700', 32, 1000, 'NVMe',
 'Windows 11 Pro', '2024-08-05', '2027-08-04', 'FAULTY'),

('CMP-ENTC-001', 'SN-ENTC-2024-001', 3,
 'Intel Core i5-11400', 16, 512, 'SSD',
 'Windows 11 Pro', '2023-07-12', '2026-07-11', 'WORKING'),

('CMP-ENTC-002', 'SN-ENTC-2024-002', 3,
 'Intel Core i5-11400', 16, 512, 'SSD',
 'Windows 11 Pro', '2023-07-12', '2026-07-11', 'WORKING'),

('CMP-MECH-001', 'SN-MECH-2024-001', 5,
 'AMD Ryzen 5 5600G', 16, 512, 'SSD',
 'Windows 11 Pro', '2024-01-15', '2027-01-14', 'WORKING'),

('CMP-MECH-002', 'SN-MECH-2024-002', 5,
 'AMD Ryzen 5 5600G', 16, 512, 'SSD',
 'Windows 11 Pro', '2024-01-15', '2027-01-14', 'WORKING'),

('CMP-ELEC-001', 'SN-ELEC-2024-001', 7,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-05-20', '2027-05-19', 'WORKING'),

('CMP-ELEC-002', 'SN-ELEC-2024-002', 7,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-05-20', '2027-05-19', 'WORKING'),

('CMP-IT-001', 'SN-IT-2024-001', 8,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-06-25', '2027-06-24', 'WORKING'),

('CMP-IT-002', 'SN-IT-2024-002', 8,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-06-25', '2027-06-24', 'WORKING'),

('CMP-NET-001', 'SN-NET-2024-001', 9,
 'Intel Core i5-11400', 16, 512, 'SSD',
 'Ubuntu 24.04', '2024-07-01', '2027-06-30', 'WORKING'),

('CMP-NET-002', 'SN-NET-2024-002', 9,
 'Intel Core i5-11400', 16, 512, 'SSD',
 'Ubuntu 24.04', '2024-07-01', '2027-06-30', 'UNDER_MAINTENANCE'),

('CMP-CYBER-001', 'SN-CYBER-2024-001', 10,
 'Intel Core i7-12700', 32, 1000, 'NVMe',
 'Ubuntu 24.04', '2024-08-12', '2027-08-11', 'WORKING'),

('CMP-CYBER-002', 'SN-CYBER-2024-002', 10,
 'Intel Core i7-12700', 32, 1000, 'NVMe',
 'Ubuntu 24.04', '2024-08-12', '2027-08-11', 'WORKING'),

('CMP-CLOUD-001', 'SN-CLOUD-2024-001', 11,
 'Intel Core i7-13700', 32, 1000, 'NVMe',
 'Ubuntu 24.04', '2024-09-05', '2027-09-04', 'WORKING'),

('CMP-CLOUD-002', 'SN-CLOUD-2024-002', 11,
 'Intel Core i7-13700', 32, 1000, 'NVMe',
 'Ubuntu 24.04', '2024-09-05', '2027-09-04', 'WORKING'),

('CMP-IOT-001', 'SN-IOT-2024-001', 12,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-09-10', '2027-09-09', 'WORKING'),

('CMP-IOT-002', 'SN-IOT-2024-002', 12,
 'Intel Core i5-12400', 16, 512, 'NVMe',
 'Windows 11 Pro', '2024-09-10', '2027-09-09', 'WORKING'),

('CMP-AIR-001', 'SN-AIR-2024-001', 13,
 'Intel Core i7-13700', 32, 1000, 'NVMe',
 'Ubuntu 24.04', '2024-10-01', '2027-09-30', 'WORKING'),

('CMP-AIR-002', 'SN-AIR-2024-002', 13,
 'Intel Core i7-13700', 32, 1000, 'NVMe',
 'Ubuntu 24.04', '2024-10-01', '2027-09-30', 'WORKING'),

('CMP-DS-001', 'SN-DS-2024-001', 14,
 'AMD Ryzen 7 5700G', 32, 1000, 'NVMe',
 'Ubuntu 24.04', '2024-10-15', '2027-10-14', 'WORKING'),

('CMP-DS-002', 'SN-DS-2024-002', 14,
 'AMD Ryzen 7 5700G', 32, 1000, 'NVMe',
 'Ubuntu 24.04', '2024-10-15', '2027-10-14', 'WORKING');