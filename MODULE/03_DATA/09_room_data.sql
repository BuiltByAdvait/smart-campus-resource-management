USE smart_campus_db;

INSERT INTO ROOM (
    room_number,
    room_name,
    room_type,
    capacity,
    floor_id,
    status
) VALUES

-- Academic Block A
('101', 'Computer Classroom 1', 'Classroom', 60, 1, 'AVAILABLE'),
('102', 'Computer Classroom 2', 'Classroom', 60, 1, 'AVAILABLE'),
('103', 'Faculty Room', 'Faculty Room', 20, 1, 'OCCUPIED'),

('201', 'AI Laboratory', 'Laboratory', 40, 2, 'AVAILABLE'),
('202', 'Programming Laboratory', 'Laboratory', 45, 2, 'AVAILABLE'),
('203', 'Seminar Hall', 'Seminar Hall', 100, 2, 'AVAILABLE'),

('301', 'Department Office', 'Office', 15, 3, 'OCCUPIED'),
('302', 'Project Room', 'Project Room', 30, 3, 'AVAILABLE'),

-- Academic Block B
('101', 'Electronics Lab 1', 'Laboratory', 40, 4, 'AVAILABLE'),
('102', 'Electronics Lab 2', 'Laboratory', 40, 4, 'AVAILABLE'),
('103', 'Electronics Faculty Room', 'Faculty Room', 15, 4, 'OCCUPIED'),

('201', 'Mechanical Workshop', 'Workshop', 50, 5, 'AVAILABLE'),
('202', 'Mechanical Drawing Room', 'Classroom', 40, 5, 'AVAILABLE'),

('301', 'Civil Drawing Lab', 'Laboratory', 45, 6, 'AVAILABLE'),
('302', 'Civil Faculty Room', 'Faculty Room', 15, 6, 'OCCUPIED'),

-- Academic Block C
('101', 'Electrical Laboratory', 'Laboratory', 40, 7, 'AVAILABLE'),
('102', 'Electrical Project Room', 'Project Room', 30, 7, 'AVAILABLE'),

('201', 'IT Classroom', 'Classroom', 60, 8, 'AVAILABLE'),
('202', 'IT Project Laboratory', 'Laboratory', 45, 8, 'AVAILABLE'),

-- Science Block
('101', 'Physics Laboratory', 'Laboratory', 40, 9, 'AVAILABLE'),
('102', 'Chemistry Laboratory', 'Laboratory', 40, 9, 'AVAILABLE'),

('201', 'Applied Science Classroom', 'Classroom', 60, 10, 'AVAILABLE'),
('202', 'Science Faculty Room', 'Faculty Room', 15, 10, 'OCCUPIED'),

-- Technology Laboratory Block
('101', 'Network Laboratory', 'Laboratory', 45, 11, 'AVAILABLE'),
('102', 'Cyber Security Laboratory', 'Laboratory', 40, 11, 'AVAILABLE'),

('201', 'Cloud Computing Laboratory', 'Laboratory', 45, 12, 'AVAILABLE'),
('202', 'IoT Laboratory', 'Laboratory', 40, 12, 'AVAILABLE'),

-- Advanced Computing Block
('101', 'Advanced Computing Lab', 'Laboratory', 50, 13, 'AVAILABLE'),
('102', 'AI Research Lab', 'Research Laboratory', 35, 13, 'AVAILABLE'),

('201', 'Data Science Lab', 'Laboratory', 40, 14, 'AVAILABLE'),
('202', 'Robotics Laboratory', 'Laboratory', 35, 14, 'AVAILABLE'),

-- Science Research Block
('101', 'Research Laboratory 1', 'Research Laboratory', 30, 15, 'AVAILABLE'),
('102', 'Research Laboratory 2', 'Research Laboratory', 30, 15, 'AVAILABLE'),

('201', 'Research Seminar Room', 'Seminar Hall', 80, 16, 'AVAILABLE'),
('202', 'Research Faculty Room', 'Faculty Room', 15, 16, 'OCCUPIED'),

-- Applied Science Laboratory Block
('101', 'Biology Laboratory', 'Laboratory', 40, 17, 'AVAILABLE'),
('102', 'Environmental Science Lab', 'Laboratory', 35, 17, 'AVAILABLE'),

('201', 'Materials Science Lab', 'Laboratory', 35, 18, 'AVAILABLE'),
('202', 'Innovation Project Room', 'Project Room', 30, 18, 'AVAILABLE');