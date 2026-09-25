USE smart_campus_db;

INSERT INTO LAB (
    lab_code,
    lab_name,
    lab_type,
    department_id,
    room_id,
    capacity,
    status
) VALUES
(
    'LAB-AI01',
    'Artificial Intelligence Laboratory',
    'AI/ML Laboratory',
    1,
    4,
    40,
    'ACTIVE'
),
(
    'LAB-COMP01',
    'Programming Laboratory',
    'Computer Laboratory',
    2,
    5,
    45,
    'ACTIVE'
),
(
    'LAB-ENTC01',
    'Electronics Laboratory 1',
    'Electronics Laboratory',
    3,
    9,
    40,
    'ACTIVE'
),
(
    'LAB-ENTC02',
    'Electronics Laboratory 2',
    'Electronics Laboratory',
    3,
    10,
    40,
    'ACTIVE'
),
(
    'LAB-MECH01',
    'Mechanical Workshop',
    'Mechanical Workshop',
    4,
    12,
    50,
    'ACTIVE'
),
(
    'LAB-CIVIL01',
    'Civil Drawing Laboratory',
    'Civil Laboratory',
    5,
    14,
    45,
    'ACTIVE'
),
(
    'LAB-ELEC01',
    'Electrical Laboratory',
    'Electrical Laboratory',
    6,
    16,
    40,
    'ACTIVE'
),
(
    'LAB-IT01',
    'IT Project Laboratory',
    'Information Technology Laboratory',
    7,
    19,
    45,
    'ACTIVE'
),
(
    'LAB-NET01',
    'Network Laboratory',
    'Networking Laboratory',
    7,
    25,
    45,
    'ACTIVE'
),
(
    'LAB-CYBER01',
    'Cyber Security Laboratory',
    'Cyber Security Laboratory',
    7,
    26,
    40,
    'ACTIVE'
),
(
    'LAB-CLOUD01',
    'Cloud Computing Laboratory',
    'Cloud Computing Laboratory',
    2,
    27,
    45,
    'ACTIVE'
),
(
    'LAB-IOT01',
    'IoT Laboratory',
    'IoT Laboratory',
    2,
    28,
    40,
    'ACTIVE'
),
(
    'LAB-AI02',
    'AI Research Laboratory',
    'AI Research Laboratory',
    1,
    30,
    35,
    'ACTIVE'
),
(
    'LAB-DS01',
    'Data Science Laboratory',
    'Data Science Laboratory',
    1,
    32,
    40,
    'ACTIVE'
),
(
    'LAB-ROBOT01',
    'Robotics Laboratory',
    'Robotics Laboratory',
    4,
    33,
    35,
    'ACTIVE'
),
(
    'LAB-PHY01',
    'Physics Laboratory',
    'Physics Laboratory',
    8,
    20,
    40,
    'ACTIVE'
),
(
    'LAB-CHEM01',
    'Chemistry Laboratory',
    'Chemistry Laboratory',
    8,
    21,
    40,
    'ACTIVE'
),
(
    'LAB-BIO01',
    'Biology Laboratory',
    'Biology Laboratory',
    8,
    35,
    40,
    'ACTIVE'
),
(
    'LAB-ENV01',
    'Environmental Science Laboratory',
    'Environmental Science Laboratory',
    8,
    36,
    35,
    'ACTIVE'
),
(
    'LAB-MAT01',
    'Materials Science Laboratory',
    'Materials Science Laboratory',
    8,
    37,
    35,
    'ACTIVE'
);