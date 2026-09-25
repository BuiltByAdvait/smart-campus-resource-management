INSERT INTO MAINTENANCE_ASSIGNMENT
(
    request_id,
    technician_id,
    assigned_date,
    completed_date,
    work_description,
    assignment_status
)
VALUES
(1, 1, '2026-09-01 10:00:00', NULL,
 'Inspect power supply and motherboard',
 'IN_PROGRESS'),

(2, 1, '2026-09-01 13:00:00', NULL,
 'Diagnose unexpected system restarts',
 'IN_PROGRESS'),

(3, 1, '2026-09-02 11:00:00', '2026-09-02 15:30:00',
 'Replace faulty keyboard and test system',
 'COMPLETED'),

(4, 4, '2026-09-02 15:00:00', NULL,
 'Inspect projector display connection',
 'IN_PROGRESS'),

(5, 5, '2026-09-03 10:30:00', NULL,
 'Inspect printer hardware and toner system',
 'ASSIGNED'),

(6, 1, '2026-09-04 13:00:00', NULL,
 'Check operating system and hardware errors',
 'ASSIGNED'),

(7, 3, '2026-09-05 11:00:00', '2026-09-06 16:00:00',
 'Test UPS battery and replace if required',
 'COMPLETED'),

(8, 1, '2026-09-06 16:00:00', NULL,
 'Inspect monitor cable and display panel',
 'IN_PROGRESS'),

(9, 6, '2026-09-07 12:00:00', NULL,
 'Check camera connection and device drivers',
 'ASSIGNED'),

(10, 2, '2026-09-08 14:30:00', '2026-09-09 12:00:00',
 'Perform system cleanup and performance testing',
 'COMPLETED'),

(11, 4, '2026-09-09 10:30:00', NULL,
 'Inspect laboratory equipment calibration',
 'IN_PROGRESS'),

(12, 1, '2026-09-10 11:30:00', NULL,
 'Check SSD health and system performance',
 'ASSIGNED'),

(13, 3, '2026-09-11 15:00:00', NULL,
 'Inspect power equipment and electrical connections',
 'ASSIGNED'),

(14, 2, '2026-09-12 12:00:00', NULL,
 'Diagnose network connectivity issue',
 'IN_PROGRESS'),

(15, 7, '2026-09-13 16:30:00', NULL,
 'Inspect equipment for physical damage',
 'ASSIGNED');