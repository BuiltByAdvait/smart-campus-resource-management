<?php
require_once __DIR__ . '/../db/connection.php';

$dashboard = [
    'students' => 0,
    'faculty' => 0,
    'rooms' => 0,
    'labs' => 0,
    'computers' => 0,
    'equipment' => 0,
    'inventory' => 0,
    'bookings' => 0,
    'events' => 0,
    'maintenance' => 0,
    'complaints' => 0,
    'buildings' => 0,
];

$queries = [
    'students' => "SELECT COUNT(*) AS total FROM STUDENT",
    'faculty' => "SELECT COUNT(*) AS total FROM FACULTY",
    'rooms' => "SELECT COUNT(*) AS total FROM ROOM",
    'labs' => "SELECT COUNT(*) AS total FROM LAB",
    'computers' => "SELECT COUNT(*) AS total FROM COMPUTER",
    'equipment' => "SELECT COUNT(*) AS total FROM EQUIPMENT",
    'inventory' => "SELECT COUNT(*) AS total FROM INVENTORY_ITEM",
    'bookings' => "SELECT COUNT(*) AS total FROM BOOKING WHERE booking_status IN ('PENDING', 'CONFIRMED')",
    'events' => "SELECT COUNT(*) AS total FROM EVENT WHERE event_date >= CURDATE() AND status IN ('PLANNED', 'ONGOING')",
    'maintenance' => "SELECT COUNT(*) AS total FROM MAINTENANCE_REQUEST",
    'complaints' => "SELECT COUNT(*) AS total FROM COMPLAINT",
    'buildings' => "SELECT COUNT(*) AS total FROM BUILDING",
];

foreach ($queries as $key => $sql) {
    $result = $conn->query($sql);
    if ($result) {
        $dashboard[$key] = (int)$result->fetch_assoc()['total'];
    }
}

return $dashboard;
