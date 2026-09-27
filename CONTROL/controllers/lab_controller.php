<?php
require_once __DIR__ . '/../db/connection.php';

$search = trim($_GET['search'] ?? '');
$department = $_GET['department'] ?? '';
$type = $_GET['type'] ?? '';
$status = $_GET['status'] ?? '';
$sort = $_GET['sort'] ?? 'name';

$allowedSorts = [
    'name' => 'l.lab_name',
    'code' => 'l.lab_code',
    'department' => 'd.department_name',
    'capacity' => 'l.capacity',
    'status' => 'l.status'
];

$orderBy = $allowedSorts[$sort] ?? 'l.lab_name';

$sql = "SELECT
            l.lab_id,
            l.lab_code,
            l.lab_name,
            l.lab_type,
            l.capacity,
            l.status,
            d.department_name,
            r.room_number,
            r.room_name,
            b.building_name,
            c.campus_name
        FROM LAB l
        LEFT JOIN DEPARTMENT d ON l.department_id = d.department_id
        JOIN ROOM r ON l.room_id = r.room_id
        JOIN FLOOR f ON r.floor_id = f.floor_id
        JOIN BUILDING b ON f.building_id = b.building_id
        JOIN CAMPUS c ON b.campus_id = c.campus_id
        WHERE 1=1";

$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND (
        l.lab_code LIKE ?
        OR l.lab_name LIKE ?
        OR l.lab_type LIKE ?
    )";
    $term = "%{$search}%";
    array_push($params, $term, $term, $term);
    $types .= 'sss';
}

if ($department !== '' && ctype_digit($department)) {
    $sql .= " AND l.department_id = ?";
    $params[] = (int)$department;
    $types .= 'i';
}

if ($type !== '') {
    $sql .= " AND l.lab_type = ?";
    $params[] = $type;
    $types .= 's';
}

if ($status !== '') {
    $sql .= " AND l.status = ?";
    $params[] = $status;
    $types .= 's';
}

$sql .= " ORDER BY {$orderBy} ASC";

$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$labs = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

return $labs;
