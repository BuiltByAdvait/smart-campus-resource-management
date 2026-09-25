<?php

require_once __DIR__ . '/../db/connection.php';

/*
|--------------------------------------------------------------------------
| Student Controller
|--------------------------------------------------------------------------
| Handles student-related database operations.
| VIEW sends the request here, and this controller executes SQL.
|--------------------------------------------------------------------------
*/

// Search value
$search = $_GET['search'] ?? '';

// Department filter
$department = $_GET['department'] ?? '';

// Sorting
$sort = $_GET['sort'] ?? 'name';

// Allowed sorting columns
$allowedSorts = [
    'name' => 'student_name',
    'enrollment' => 's.enrollment_no',
    'department' => 'd.department_name',
    'semester' => 's.semester'
];

$orderBy = $allowedSorts[$sort] ?? 'student_name';


// Base SQL
$sql = "
    SELECT
        s.student_id,
        s.enrollment_no,
        CONCAT(s.first_name, ' ', s.last_name) AS student_name,
        s.gender,
        s.semester,
        d.department_code,
        d.department_name
    FROM STUDENT s
    JOIN DEPARTMENT d
        ON s.department_id = d.department_id
    WHERE 1 = 1
";


// Search condition
if ($search !== '') {
    $sql .= "
        AND (
            CONCAT(s.first_name, ' ', s.last_name) LIKE ?
            OR s.enrollment_no LIKE ?
            OR d.department_name LIKE ?
        )
    ";
}


// Department filter
if ($department !== '') {
    $sql .= " AND d.department_code = ? ";
}


// Sorting
$sql .= " ORDER BY $orderBy ASC";


// Prepare statement
$stmt = $conn->prepare($sql);


// Bind parameters
if ($search !== '' && $department !== '') {

    $searchValue = "%{$search}%";

    $stmt->bind_param(
        "ssss",
        $searchValue,
        $searchValue,
        $searchValue,
        $department
    );

} elseif ($search !== '') {

    $searchValue = "%{$search}%";

    $stmt->bind_param(
        "sss",
        $searchValue,
        $searchValue,
        $searchValue
    );

} elseif ($department !== '') {

    $stmt->bind_param(
        "s",
        $department
    );
}


// Execute query
$stmt->execute();


// Get results
$result = $stmt->get_result();


// Store students
$students = [];

while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}


// Close statement
$stmt->close();


// Return data
return $students;