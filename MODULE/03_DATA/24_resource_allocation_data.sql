INSERT INTO RESOURCE_ALLOCATION
(
    department_id,
    room_id,
    computer_id,
    equipment_id,
    allocation_date,
    return_date,
    allocation_purpose,
    allocation_status
)
VALUES

-- Rooms
(1, 4, NULL, NULL,
 '2026-07-01', NULL,
 'AI and Machine Learning laboratory',
 'ACTIVE'),

(2, 5, NULL, NULL,
 '2026-07-01', NULL,
 'Computer programming laboratory',
 'ACTIVE'),

(3, 9, NULL, NULL,
 '2026-07-05', NULL,
 'Electronics practical laboratory',
 'ACTIVE'),

(4, 12, NULL, NULL,
 '2026-07-05', NULL,
 'Mechanical engineering workshop',
 'ACTIVE'),

(7, 19, NULL, NULL,
 '2026-07-10', NULL,
 'IT project laboratory',
 'ACTIVE'),

-- Computers
(1, NULL, 1, NULL,
 '2026-07-15', NULL,
 'AI laboratory workstation',
 'ACTIVE'),

(1, NULL, 2, NULL,
 '2026-07-15', NULL,
 'Machine learning practical workstation',
 'ACTIVE'),

(2, NULL, 5, NULL,
 '2026-07-16', NULL,
 'Programming laboratory workstation',
 'ACTIVE'),

(3, NULL, 9, NULL,
 '2026-07-16', NULL,
 'Electronics laboratory workstation',
 'ACTIVE'),

(7, NULL, 15, NULL,
 '2026-07-18', NULL,
 'IT networking laboratory workstation',
 'ACTIVE'),

-- Equipment
(1, NULL, NULL, 1,
 '2026-07-20', NULL,
 'Projector for AI department presentations',
 'ACTIVE'),

(2, NULL, NULL, 2,
 '2026-07-20', NULL,
 'Printer for Computer Engineering department',
 'ACTIVE'),

(3, NULL, NULL, 6,
 '2026-07-21', NULL,
 'Camera for Electronics project documentation',
 'ACTIVE'),

(7, NULL, NULL, 14,
 '2026-07-22', NULL,
 'Network equipment for IT laboratory',
 'ACTIVE'),

(8, NULL, NULL, 20,
 '2026-07-23', NULL,
 'Laboratory equipment for Applied Sciences',
 'ACTIVE'),

-- Returned historical allocations
(1, NULL, 3, NULL,
 '2026-06-01', '2026-08-01',
 'Previous AI laboratory workstation',
 'RETURNED'),

(2, NULL, NULL, 3,
 '2026-06-05', '2026-08-10',
 'Temporary UPS allocation',
 'RETURNED'),

(7, NULL, 7, NULL,
 '2026-06-10', '2026-08-15',
 'Previous IT laboratory workstation',
 'RETURNED'),

(4, NULL, NULL, 10,
 '2026-06-15', '2026-08-20',
 'Temporary power equipment',
 'RETURNED'),

(3, NULL, 11, NULL,
 '2026-06-20', '2026-08-25',
 'Previous electronics workstation',
 'RETURNED');