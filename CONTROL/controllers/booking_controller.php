<?php
require_once __DIR__ . '/../db/connection.php';

$search = trim($_GET['search'] ?? '');
$date = $_GET['date'] ?? '';
$status = $_GET['status'] ?? '';
$room = $_GET['room'] ?? '';
$sort = $_GET['sort'] ?? 'date';

$allowedSorts = [
    'date' => 'b.booking_date DESC, b.start_time ASC',
    'room' => 'r.room_number ASC, b.booking_date DESC',
    'status' => 'b.booking_status ASC, b.booking_date DESC',
    'booker' => 'booked_by ASC, b.booking_date DESC',
];
$orderBy = $allowedSorts[$sort] ?? $allowedSorts['date'];

$sql = "SELECT b.booking_id, b.booking_date, b.start_time, b.end_time, b.purpose, b.booking_status,
        r.room_number, r.room_name, b.room_id,
        COALESCE(CONCAT(s.first_name, ' ', s.last_name), CONCAT(f.first_name, ' ', f.last_name)) AS booked_by,
        CASE WHEN b.booked_by_student_id IS NOT NULL THEN 'STUDENT' ELSE 'FACULTY' END AS booker_type,
        COUNT(br.booking_resource_id) AS resource_count
    FROM BOOKING b
    JOIN ROOM r ON r.room_id = b.room_id
    LEFT JOIN STUDENT s ON s.student_id = b.booked_by_student_id
    LEFT JOIN FACULTY f ON f.faculty_id = b.booked_by_faculty_id
    LEFT JOIN BOOKING_RESOURCE br ON br.booking_id = b.booking_id
    WHERE 1 = 1";
$params = [];
$types = '';
if ($search !== '') {
    $sql .= " AND (r.room_number LIKE ? OR r.room_name LIKE ? OR b.purpose LIKE ? OR CONCAT(s.first_name, ' ', s.last_name) LIKE ? OR CONCAT(f.first_name, ' ', f.last_name) LIKE ?)";
    $term = "%{$search}%";
    $params = [$term, $term, $term, $term, $term];
    $types = 'sssss';
}
if ($date !== '' && preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) { $sql .= ' AND b.booking_date = ?'; $params[] = $date; $types .= 's'; }
if ($status !== '') { $sql .= ' AND b.booking_status = ?'; $params[] = $status; $types .= 's'; }
if ($room !== '' && ctype_digit($room)) { $sql .= ' AND b.room_id = ?'; $params[] = (int) $room; $types .= 'i'; }
$sql .= " GROUP BY b.booking_id, b.booking_date, b.start_time, b.end_time, b.purpose, b.booking_status, r.room_number, r.room_name, b.room_id, booked_by, booker_type ORDER BY {$orderBy}";

$stmt = $conn->prepare($sql);
if ($params) { $stmt->bind_param($types, ...$params); }
$stmt->execute();
$bookings = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
return $bookings;
