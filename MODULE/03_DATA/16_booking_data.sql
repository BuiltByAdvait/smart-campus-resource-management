USE smart_campus_db;

INSERT INTO BOOKING (
    room_id,
    booked_by_student_id,
    booked_by_faculty_id,
    booking_date,
    start_time,
    end_time,
    purpose,
    booking_status
) VALUES

-- Student bookings

(6, 1, NULL,
 '2026-09-22', '10:00:00', '12:00:00',
 'AI project presentation and discussion',
 'CONFIRMED'),

(8, 5, NULL,
 '2026-09-23', '14:00:00', '16:00:00',
 'Computer engineering project work',
 'CONFIRMED'),

(19, 9, NULL,
 '2026-09-24', '11:00:00', '13:00:00',
 'IT project development session',
 'CONFIRMED'),

(32, 16, NULL,
 '2026-09-25', '10:00:00', '12:00:00',
 'Data science project discussion',
 'PENDING'),

(28, 17, NULL,
 '2026-09-26', '13:00:00', '15:00:00',
 'IoT project demonstration',
 'CONFIRMED'),

-- Faculty bookings

(6, NULL, 1,
 '2026-09-22', '14:00:00', '16:00:00',
 'AI and Machine Learning faculty workshop',
 'CONFIRMED'),

(23, NULL, 4,
 '2026-09-23', '09:30:00', '11:30:00',
 'Applied Science departmental meeting',
 'CONFIRMED'),

(25, NULL, 8,
 '2026-09-24', '15:00:00', '17:00:00',
 'Networking laboratory session',
 'CONFIRMED'),

(12, NULL, 5,
 '2026-09-25', '11:00:00', '13:00:00',
 'Mechanical engineering project review',
 'COMPLETED'),

(20, NULL, 8,
 '2026-09-26', '10:00:00', '12:00:00',
 'Physics laboratory planning meeting',
 'CONFIRMED');