<?php

require_once __DIR__ . '/../db/connection.php';

$search = $_GET['search'] ?? '';
$campus = $_GET['campus'] ?? '';
$type = $_GET['type'] ?? '';
$sort = $_GET['sort'] ?? 'name';

$sql = "
    SELECT
        b.building_id,
        b.building_code,
        b.building_name,
        b.building_type,
        c.campus_name,
        c.campus_code,
        COUNT(DISTINCT f.floor_id) AS total_floors,
        COUNT(DISTINCT r.room_id) AS total_rooms
    FROM BUILDING b
    JOIN CAMPUS c
        ON b.campus_id = c.campus_id
    LEFT JOIN FLOOR f
        ON b.building_id = f.building_id
    LEFT JOIN ROOM r
        ON f.floor_id = r.floor_id
    WHERE 1 = 1
";

$params = [];
$types = "";

/* Search */
if ($search !== '') {
    $sql .= "
        AND (
            b.building_name LIKE ?
            OR b.building_code LIKE ?
            OR c.campus_name LIKE ?
        )
    ";

    $searchValue = "%" . $search . "%";

    $params[] = $searchValue;
    $params[] = $searchValue;
    $params[] = $searchValue;

    $types .= "sss";
}

/* Campus filter */
if ($campus !== '') {
    $sql .= " AND c.campus_code = ?";
    $params[] = $campus;
    $types .= "s";
}

/* Building type filter */
if ($type !== '') {
    $sql .= " AND b.building_type = ?";
    $params[] = $type;
    $types .= "s";
}

$sql .= "
    GROUP BY
        b.building_id,
        b.building_code,
        b.building_name,
        b.building_type,
        c.campus_name,
        c.campus_code
";

/* Sorting */
$allowedSorts = [
    'name' => 'b.building_name ASC',
    'code' => 'b.building_code ASC',
    'campus' => 'c.campus_name ASC, b.building_name ASC',
    'floors' => 'total_floors DESC',
    'rooms' => 'total_rooms DESC'
];

$orderBy = $allowedSorts[$sort] ?? $allowedSorts['name'];

$sql .= " ORDER BY " . $orderBy;

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Database query preparation failed: " . htmlspecialchars($conn->error));
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();

$result = $stmt->get_result();

$buildings = [];

while ($row = $result->fetch_assoc()) {
    $buildings[] = $row;
}

$stmt->close();

/* Filter options */
$campuses = [];

$campusQuery = "
    SELECT campus_code, campus_name
    FROM CAMPUS
    ORDER BY campus_name
";

$campusResult = $conn->query($campusQuery);

if ($campusResult) {
    while ($row = $campusResult->fetch_assoc()) {
        $campuses[] = $row;
    }
}

$buildingTypes = [];

$typeQuery = "
    SELECT DISTINCT building_type
    FROM BUILDING
    WHERE building_type IS NOT NULL
      AND building_type <> ''
    ORDER BY building_type
";

$typeResult = $conn->query($typeQuery);

if ($typeResult) {
    while ($row = $typeResult->fetch_assoc()) {
        $buildingTypes[] = $row['building_type'];
    }
}

return [
    'buildings' => $buildings,
    'campuses' => $campuses,
    'building_types' => $buildingTypes
];