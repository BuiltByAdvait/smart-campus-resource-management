<?php

require_once __DIR__ . '/../db/connection.php';

$search = trim($_GET['search'] ?? '');
$building = $_GET['building'] ?? '';
$type = $_GET['type'] ?? '';
$status = $_GET['status'] ?? '';
$sort = $_GET['sort'] ?? 'room';

$allowedSorts = [
    'room' => 'r.room_number',
    'capacity' => 'r.capacity',
    'building' => 'b.building_name',
    'type' => 'r.room_type',
    'status' => 'r.status'
];

$orderBy = $allowedSorts[$sort] ?? 'r.room_number';

$sql = "SELECT
            r.room_id,
            r.room_number,
            r.room_name,
            r.room_type,
            r.capacity,
            r.status,
            f.floor_number,
            f.floor_name,
            b.building_id,
            b.building_name,
            c.campus_name
        FROM ROOM r
        JOIN FLOOR f ON r.floor_id = f.floor_id
        JOIN BUILDING b ON f.building_id = b.building_id
        JOIN CAMPUS c ON b.campus_id = c.campus_id
        WHERE 1 = 1";

$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND (
        r.room_number LIKE ?
        OR r.room_name LIKE ?
        OR r.room_type LIKE ?
        OR b.building_name LIKE ?
        OR c.campus_name LIKE ?
    )";

    $term = "%{$search}%";

    array_push(
        $params,
        $term,
        $term,
        $term,
        $term,
        $term
    );

    $types .= 'sssss';
}

if ($building !== '' && ctype_digit($building)) {
    $sql .= " AND b.building_id = ?";

    $params[] = (int) $building;
    $types .= 'i';
}

if ($type !== '') {
    $sql .= " AND r.room_type = ?";

    $params[] = $type;
    $types .= 's';
}

if ($status !== '') {
    $sql .= " AND r.status = ?";

    $params[] = $status;
    $types .= 's';
}

$sql .= " ORDER BY {$orderBy} ASC";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Room query preparation failed: " . $conn->error);
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

if (!$stmt->execute()) {
    die("Room query execution failed: " . $stmt->error);
}

$result = $stmt->get_result();

$rooms = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();


// Buildings for filter
$buildings = [];

$buildingResult = $conn->query("
    SELECT
        building_id,
        building_code,
        building_name
    FROM BUILDING
    ORDER BY building_name
");

if ($buildingResult) {
    while ($row = $buildingResult->fetch_assoc()) {
        $buildings[] = $row;
    }
}


// Room types for filter
$roomTypes = [];

$typeResult = $conn->query("
    SELECT DISTINCT room_type
    FROM ROOM
    WHERE room_type IS NOT NULL
      AND room_type <> ''
    ORDER BY room_type
");

if ($typeResult) {
    while ($row = $typeResult->fetch_assoc()) {
        $roomTypes[] = $row['room_type'];
    }
}


// Room statuses for filter
$statuses = [];

$statusResult = $conn->query("
    SELECT DISTINCT status
    FROM ROOM
    WHERE status IS NOT NULL
      AND status <> ''
    ORDER BY status
");

if ($statusResult) {
    while ($row = $statusResult->fetch_assoc()) {
        $statuses[] = $row['status'];
    }
}


return [
    'rooms' => $rooms,
    'buildings' => $buildings,
    'room_types' => $roomTypes,
    'statuses' => $statuses
];