USE smart_campus_db;

INSERT INTO CAMPUS (
    campus_code,
    campus_name,
    address,
    city,
    contact_no
) VALUES
(
    'MAIN',
    'Main Campus',
    'University Road, Central Campus',
    'Mumbai',
    '02240001001'
),
(
    'TECH',
    'Technology Campus',
    'Innovation Park, Technology Campus',
    'Mumbai',
    '02240001002'
),
(
    'SCI',
    'Science Campus',
    'Science Avenue, Research Campus',
    'Mumbai',
    '02240001003'
);

SELECT
    campus_id,
    campus_code,
    campus_name,
    city
FROM CAMPUS
ORDER BY campus_id;