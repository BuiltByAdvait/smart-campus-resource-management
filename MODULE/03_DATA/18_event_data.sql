USE smart_campus_db;

INSERT INTO EVENT (
    event_name,
    event_type,
    description,
    event_date,
    start_time,
    end_time,
    room_id,
    organizing_department_id,
    coordinator_faculty_id,
    max_participants,
    status
) VALUES

(
    'AI and Machine Learning Workshop',
    'Workshop',
    'Hands-on workshop covering artificial intelligence and machine learning fundamentals',
    '2026-10-05',
    '10:00:00',
    '13:00:00',
    6,
    1,
    1,
    80,
    'PLANNED'
),

(
    'Smart Campus Hackathon 2026',
    'Hackathon',
    'Campus-wide hackathon focused on solving real-world problems using technology',
    '2026-10-10',
    '09:00:00',
    '18:00:00',
    6,
    1,
    9,
    100,
    'PLANNED'
),

(
    'Networking Fundamentals Seminar',
    'Seminar',
    'Introduction to computer networking concepts and infrastructure',
    '2026-10-15',
    '11:00:00',
    '13:00:00',
    25,
    7,
    4,
    45,
    'PLANNED'
),

(
    'Electronics Innovation Expo',
    'Exhibition',
    'Student exhibition showcasing electronics and embedded system projects',
    '2026-10-20',
    '10:00:00',
    '16:00:00',
    9,
    3,
    3,
    60,
    'PLANNED'
),

(
    'Mechanical Design Challenge',
    'Competition',
    'Design competition for mechanical engineering students',
    '2026-10-24',
    '10:00:00',
    '15:00:00',
    12,
    4,
    5,
    50,
    'PLANNED'
),

(
    'Cyber Security Awareness Session',
    'Seminar',
    'Awareness session covering cyber security and safe digital practices',
    '2026-10-28',
    '14:00:00',
    '16:00:00',
    26,
    7,
    4,
    40,
    'PLANNED'
),

(
    'Applied Science Research Symposium',
    'Symposium',
    'Research presentations by students and faculty from applied science departments',
    '2026-11-03',
    '10:00:00',
    '15:00:00',
    23,
    8,
    8,
    70,
    'PLANNED'
),

(
    'Data Science Project Showcase',
    'Exhibition',
    'Showcase of student projects based on data science and analytics',
    '2026-11-08',
    '11:00:00',
    '16:00:00',
    32,
    1,
    9,
    50,
    'PLANNED'
),

(
    'IoT and Embedded Systems Workshop',
    'Workshop',
    'Practical workshop on Internet of Things and embedded systems',
    '2026-11-12',
    '09:30:00',
    '13:30:00',
    28,
    2,
    2,
    40,
    'PLANNED'
),

(
    'Interdepartmental Technical Quiz',
    'Competition',
    'Technical quiz competition involving students from multiple departments',
    '2026-11-18',
    '14:00:00',
    '17:00:00',
    6,
    1,
    1,
    100,
    'PLANNED'
);

