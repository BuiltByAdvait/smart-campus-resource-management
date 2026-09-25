<?php

require_once __DIR__ . '/../db/connection.php';

echo "<h1>CONTROL Layer Working!</h1>";

$result = $conn->query("SELECT COUNT(*) AS total FROM STUDENT");

$row = $result->fetch_assoc();

echo "<p>Database: smart_campus_db</p>";
echo "<p>Total Students: " . $row['total'] . "</p>";

$conn->close();