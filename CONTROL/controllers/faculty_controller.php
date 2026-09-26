<?php

require_once __DIR__ . '/../db/connection.php';

/*
|--------------------------------------------------------------------------
| Faculty Controller
|--------------------------------------------------------------------------
| Handles faculty-related database operations.
| VIEW sends search/filter/sort parameters here.
| This controller executes the SQL query.
|--------------------------------------------------------------------------
*/

$search = $_GET['search'] ?? '';
$department = $_GET['department'] ?? '';
$designation = $_GET['designation'] ?? '';
$sort = $_GET['sort'] ?? 'name';


/*
|--------------------------------------------------------------------------
| Allowed sorting columns
|--------------------------------------------------------------------------
| Never directly trust a column name coming from GET.
|--------------------------------------------------------------------------
*/

$allowedSorts = [
    'name' => "CONCAT(f.first_name, ' ', f.last_name)",
    'employee' => 'f.employee_code',
    'department' => 'd.department_name',
    'designation' => 'f.designation',
    'joining_date' => 'f.joining_date'
];

$orderBy = $allowedSorts[$sort] ?? $allowedSorts['name'];


/*
|--------------------------------------------------------------------------
| Base Query
|--------------------------------------------------------------------------
*/

$sql = "
    SELECT
        f.faculty_id,
        f.employee_code,
        CONCAT(f.first_name, ' ', f.last_name) AS faculty_name,
        f.designation,
        f.email,
        f.phone,
        f.joining_date,
        d.department_code,
        d.department_name
    FROM FACULTY f
    JOIN DEPARTMENT d
        ON f.department_id = d.department_id
    WHERE 1 = 1
";


$params = [];
$types = '';


/*
|--------------------------------------------------------------------------
| Search
|--------------------------------------------------------------------------
*/

if ($search !== '') {

    $sql .= "
        AND (
            CONCAT(f.first_name, ' ', f.last_name) LIKE ?
            OR f.employee_code LIKE ?
            OR f.email LIKE ?
        )
    ";

    $searchValue = '%' . $search . '%';

    $params[] = $searchValue;
    $params[] = $searchValue;
    $params[] = $searchValue;

    $types .= 'sss';
}


/*
|--------------------------------------------------------------------------
| Department Filter
|--------------------------------------------------------------------------
*/

if ($department !== '') {

    $sql .= "
        AND d.department_code = ?
    ";

    $params[] = $department;

    $types .= 's';
}


/*
|--------------------------------------------------------------------------
| Designation Filter
|--------------------------------------------------------------------------
*/

if ($designation !== '') {

    $sql .= "
        AND f.designation = ?
    ";

    $params[] = $designation;

    $types .= 's';
}


/*
|--------------------------------------------------------------------------
| Sorting
|--------------------------------------------------------------------------
*/

$sql .= "
    ORDER BY {$orderBy} ASC
";


/*
|--------------------------------------------------------------------------
| Execute Query
|--------------------------------------------------------------------------
*/

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Database query preparation failed.");
}


if (!empty($params)) {

    $stmt->bind_param($types, ...$params);

}


$stmt->execute();

$result = $stmt->get_result();


/*
|--------------------------------------------------------------------------
| Convert result to array
|--------------------------------------------------------------------------
*/

$faculty = [];

while ($row = $result->fetch_assoc()) {

    $faculty[] = $row;

}


$stmt->close();


return $faculty;