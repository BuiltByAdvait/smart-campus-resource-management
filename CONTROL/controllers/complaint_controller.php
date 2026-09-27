<?php
require_once __DIR__ . '/../db/connection.php';

$search = trim($_GET['search'] ?? '');
$type = $_GET['type'] ?? '';
$priority = $_GET['priority'] ?? '';
$status = $_GET['status'] ?? '';
$sort = $_GET['sort'] ?? 'date';

$allowedSorts = [
    'date' => 'c.complaint_date',
    'priority' => 'c.priority',
    'status' => 'c.complaint_status',
    'subject' => 'c.subject'
];

$orderBy = $allowedSorts[$sort] ?? 'c.complaint_date';

$sql = "SELECT
            c.complaint_id,
            c.complaint_date,
            c.complaint_type,
            c.subject,
            c.description,
            c.priority,
            c.complaint_status,
            c.resolution_date,
            c.resolution_remarks,
            COALESCE(
                CONCAT(s.first_name, ' ', s.last_name),
                CONCAT(f.first_name, ' ', f.last_name)
            ) AS reported_by,
            CASE
                WHEN c.student_id IS NOT NULL THEN 'STUDENT'
                WHEN c.faculty_id IS NOT NULL THEN 'FACULTY'
                ELSE NULL
            END AS reporter_type
        FROM COMPLAINT c
        LEFT JOIN STUDENT s ON c.student_id = s.student_id
        LEFT JOIN FACULTY f ON c.faculty_id = f.faculty_id
        WHERE 1=1";

$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND (
        c.complaint_type LIKE ?
        OR c.subject LIKE ?
        OR c.description LIKE ?
        OR s.first_name LIKE ?
        OR s.last_name LIKE ?
        OR f.first_name LIKE ?
        OR f.last_name LIKE ?
    )";
    $term = "%{$search}%";
    for ($i = 0; $i < 7; $i++) {
        $params[] = $term;
    }
    $types .= 'sssssss';
}

if ($type !== '') {
    $sql .= " AND c.complaint_type = ?";
    $params[] = $type;
    $types .= 's';
}

if ($priority !== '') {
    $sql .= " AND c.priority = ?";
    $params[] = $priority;
    $types .= 's';
}

if ($status !== '') {
    $sql .= " AND c.complaint_status = ?";
    $params[] = $status;
    $types .= 's';
}

$sql .= " ORDER BY {$orderBy} DESC";

$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$complaints = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

return $complaints;
