<?php
require_once __DIR__ . '/../db/connection.php';

$search = trim($_GET['search'] ?? '');
$category = $_GET['category'] ?? '';
$status = $_GET['status'] ?? '';
$condition = $_GET['condition'] ?? '';
$sort = $_GET['sort'] ?? 'name';

$allowedSorts = [
    'name' => 'e.equipment_name',
    'asset' => 'e.asset_tag',
    'category' => 'ec.category_name',
    'condition' => 'e.condition_status',
    'status' => 'e.operational_status'
];

$orderBy = $allowedSorts[$sort] ?? 'e.equipment_name';

$sql = "SELECT
            e.equipment_id,
            e.asset_tag,
            e.equipment_name,
            e.serial_number,
            e.purchase_date,
            e.warranty_expiry,
            e.condition_status,
            e.operational_status,
            ec.category_name,
            r.room_number,
            r.room_name,
            d.department_name
        FROM EQUIPMENT e
        JOIN EQUIPMENT_CATEGORY ec ON e.category_id = ec.category_id
        LEFT JOIN ROOM r ON e.room_id = r.room_id
        LEFT JOIN DEPARTMENT d ON e.department_id = d.department_id
        WHERE 1=1";

$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND (
        e.asset_tag LIKE ?
        OR e.equipment_name LIKE ?
        OR e.serial_number LIKE ?
        OR ec.category_name LIKE ?
    )";
    $term = "%{$search}%";
    array_push($params, $term, $term, $term, $term);
    $types .= 'ssss';
}

if ($category !== '' && ctype_digit($category)) {
    $sql .= " AND e.category_id = ?";
    $params[] = (int)$category;
    $types .= 'i';
}

if ($status !== '') {
    $sql .= " AND e.operational_status = ?";
    $params[] = $status;
    $types .= 's';
}

if ($condition !== '') {
    $sql .= " AND e.condition_status = ?";
    $params[] = $condition;
    $types .= 's';
}

$sql .= " ORDER BY {$orderBy} ASC";

$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$equipment = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

return $equipment;
