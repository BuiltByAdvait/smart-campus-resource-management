<?php
require_once __DIR__ . '/../db/connection.php';

$search = trim($_GET['search'] ?? '');
$type = $_GET['type'] ?? '';
$status = $_GET['status'] ?? '';
$sort = $_GET['sort'] ?? 'date';

$allowedSorts = [
    'date' => 'e.event_date',
    'name' => 'e.event_name',
    'type' => 'e.event_type',
    'status' => 'e.status',
    'participants' => 'e.max_participants'
];

$orderBy = $allowedSorts[$sort] ?? 'e.event_date';

$sql = "SELECT
            e.event_id,
            e.event_name,
            e.event_type,
            e.description,
            e.event_date,
            e.start_time,
            e.end_time,
            e.max_participants,
            e.status,
            r.room_number,
            r.room_name,
            d.department_name,
            CONCAT(f.first_name, ' ', f.last_name) AS coordinator_name
        FROM EVENT e
        LEFT JOIN ROOM r ON e.room_id = r.room_id
        LEFT JOIN DEPARTMENT d ON e.organizing_department_id = d.department_id
        LEFT JOIN FACULTY f ON e.coordinator_faculty_id = f.faculty_id
        WHERE 1=1";

$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND (
        e.event_name LIKE ?
        OR e.event_type LIKE ?
        OR e.description LIKE ?
        OR d.department_name LIKE ?
        OR f.first_name LIKE ?
        OR f.last_name LIKE ?
    )";
    $term = "%{$search}%";
    for ($i = 0; $i < 6; $i++) {
        $params[] = $term;
    }
    $types .= 'ssssss';
}

if ($type !== '') {
    $sql .= " AND e.event_type = ?";
    $params[] = $type;
    $types .= 's';
}

if ($status !== '') {
    $sql .= " AND e.status = ?";
    $params[] = $status;
    $types .= 's';
}

$sql .= " ORDER BY {$orderBy} ASC, e.start_time ASC";

$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$events = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

return $events;
