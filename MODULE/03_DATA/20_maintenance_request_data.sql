INSERT INTO MAINTENANCE_REQUEST
(
    computer_id,
    equipment_id,
    reported_by_student_id,
    reported_by_faculty_id,
    request_date,
    issue_description,
    priority,
    request_status
)
VALUES
(1, NULL, 1, NULL, '2026-09-01 09:15:00',
 'Computer does not start properly', 'HIGH', 'OPEN'),

(2, NULL, NULL, 1, '2026-09-01 11:30:00',
 'System is restarting unexpectedly', 'HIGH', 'IN_PROGRESS'),

(3, NULL, 2, NULL, '2026-09-02 10:20:00',
 'Keyboard keys are not responding', 'MEDIUM', 'RESOLVED'),

(NULL, 1, NULL, 4, '2026-09-02 14:10:00',
 'Projector display is flickering', 'HIGH', 'IN_PROGRESS'),

(NULL, 2, 3, NULL, '2026-09-03 09:45:00',
 'Printer is not printing documents', 'MEDIUM', 'OPEN'),

(5, NULL, 5, NULL, '2026-09-04 12:15:00',
 'Operating system showing frequent errors', 'MEDIUM', 'OPEN'),

(NULL, 3, NULL, 9, '2026-09-05 10:00:00',
 'UPS battery backup is very low', 'HIGH', 'RESOLVED'),

(7, NULL, NULL, 2, '2026-09-06 15:30:00',
 'Monitor display has horizontal lines', 'MEDIUM', 'IN_PROGRESS'),

(NULL, 6, 9, NULL, '2026-09-07 11:20:00',
 'Camera is not detected by the system', 'LOW', 'OPEN'),

(10, NULL, 10, NULL, '2026-09-08 13:40:00',
 'Computer becomes very slow during applications', 'MEDIUM', 'RESOLVED'),

(NULL, 7, NULL, 3, '2026-09-09 09:30:00',
 'Laboratory equipment requires calibration', 'HIGH', 'IN_PROGRESS'),

(12, NULL, 12, NULL, '2026-09-10 10:45:00',
 'SSD performance is significantly reduced', 'HIGH', 'OPEN'),

(NULL, 10, NULL, 8, '2026-09-11 14:20:00',
 'Power equipment showing abnormal operation', 'CRITICAL', 'OPEN'),

(15, NULL, 14, NULL, '2026-09-12 11:10:00',
 'Computer network connection is unstable', 'HIGH', 'IN_PROGRESS'),

(NULL, 13, 16, NULL, '2026-09-13 16:00:00',
 'Equipment requires inspection after damage', 'MEDIUM', 'OPEN');