<?php
require_once __DIR__ . '/../db/connection.php';

$search = trim($_GET['search'] ?? '');
$priority = $_GET['priority'] ?? '';
$status = $_GET['status'] ?? '';
$sort = $_GET['sort'] ?? 'date';

$allowedSorts = [
    'date' => 'mr.request_date',
    'priority' => 'mr.priority',
    'status' => 'mr.request_status',
    'type' => 'mr.request_type'
];

$orderBy = $allowedSorts[$sort] ?? 'mr.request_date';

$sql = "SELECT
            mr.maintenance_request_id,
            mr.request_type,
            mr.description,
            mr.priority,
            mr.request_date,
            mr.request_status,
            CASE
                WHEN mr.computer_id IS NOT NULL THEN c.asset_tag
                WHEN mr.equipment_id IS NOT NULL THEN e.asset_tag
                ELSE NULL
            END AS asset_tag,
            CASE
                WHEN mr.computer_id IS NOT NULL THEN c.asset_tag
                WHEN mr.equipment_id IS NOT NULL THEN e.equipment_name
                ELSE 'Campus Resource'
            END AS resource_name,
            CASE
                WHEN mr.computer_id IS NOT NULL THEN 'COMPUTER'
                WHEN mr.equipment_id IS NOT NULL THEN 'EQUIPMENT'
                ELSE NULL
            END AS resource_type,
            COALESCE(
                CONCAT(s.first_name, ' ', s.last_name),
                CONCAT(f.first_name, ' ', f.last_name)
            ) AS reported_by,
            CASE
                WHEN mr.student_id IS NOT NULL THEN 'STUDENT'
                WHEN mr.faculty_id IS NOT NULL THEN 'FACULTY'
                ELSE NULL
            END AS reporter_type,
            ma.technician_id,
            CONCAT(t.first_name, ' ', t.last_name) AS technician_name,
            t.specialization AS technician_specialization,
            ma.assigned_date,
            ma.completed_date,
            ma.remarks AS assignment_remarks
        FROM MAINTENANCE_REQUEST mr
        LEFT JOIN COMPUTER c ON mr.computer_id = c.computer_id
        LEFT JOIN EQUIPMENT e ON mr.equipment_id = e.equipment_id
        LEFT JOIN STUDENT s ON mr.student_id = s.student_id
        LEFT JOIN FACULTY f ON mr.faculty_id = f.faculty_id
        LEFT JOIN MAINTENANCE_ASSIGNMENT ma
            ON mr.maintenance_request_id = ma.maintenance_request_id
        LEFT JOIN TECHNICIAN t ON ma.technician_id = t.technician_id
        WHERE 1=1";

$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND (
        mr.request_type LIKE ?
        OR mr.description LIKE ?
        OR c.asset_tag LIKE ?
        OR e.asset_tag LIKE ?
        OR e.equipment_name LIKE ?
        OR t.first_name LIKE ?
        OR t.last_name LIKE ?
    )";
    $term = "%{$search}%";
    for ($i = 0; $i < 7; $i++) {
        $params[] = $term;
    }
    $types .= 'sssssss';
}

if ($priority !== '') {
    $sql .= " AND mr.priority = ?";
    $params[] = $priority;
    $types .= 's';
}

if ($status !== '') {
    $sql .= " AND mr.request_status = ?";
    $params[] = $status;
    $types .= 's';
}

$sql .= " ORDER BY {$orderBy} DESC";

$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$maintenance = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

return $maintenance;
