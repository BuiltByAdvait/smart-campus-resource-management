<?php
require_once __DIR__ . '/../db/connection.php';

$search = trim($_GET['search'] ?? '');
$lab = $_GET['lab'] ?? '';
$status = $_GET['status'] ?? '';
$storageType = $_GET['storage_type'] ?? '';
$sort = $_GET['sort'] ?? 'asset';

$allowedSorts = [
    'asset' => 'c.asset_tag',
    'processor' => 'c.processor',
    'ram' => 'c.ram_gb',
    'storage' => 'c.storage_gb',
    'lab' => 'l.lab_name',
    'status' => 'c.status'
];

$orderBy = $allowedSorts[$sort] ?? 'c.asset_tag';

$sql = "SELECT
            c.computer_id,
            c.asset_tag,
            c.serial_number,
            c.processor,
            c.ram_gb,
            c.storage_gb,
            c.storage_type,
            c.operating_system,
            c.purchase_date,
            c.warranty_expiry,
            c.status,
            l.lab_name,
            l.lab_code,
            r.room_number,
            b.building_name
        FROM COMPUTER c
        JOIN LAB l ON c.lab_id = l.lab_id
        JOIN ROOM r ON l.room_id = r.room_id
        JOIN FLOOR f ON r.floor_id = f.floor_id
        JOIN BUILDING b ON f.building_id = b.building_id
        WHERE 1=1";

$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND (
        c.asset_tag LIKE ?
        OR c.serial_number LIKE ?
        OR c.processor LIKE ?
        OR c.operating_system LIKE ?
        OR l.lab_name LIKE ?
    )";
    $term = "%{$search}%";
    array_push($params, $term, $term, $term, $term, $term);
    $types .= 'sssss';
}

if ($lab !== '' && ctype_digit($lab)) {
    $sql .= " AND c.lab_id = ?";
    $params[] = (int)$lab;
    $types .= 'i';
}

if ($status !== '') {
    $sql .= " AND c.status = ?";
    $params[] = $status;
    $types .= 's';
}

if ($storageType !== '') {
    $sql .= " AND c.storage_type = ?";
    $params[] = $storageType;
    $types .= 's';
}

$sql .= " ORDER BY {$orderBy} ASC";

$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$computers = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

return $computers;
