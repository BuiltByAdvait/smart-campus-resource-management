<?php
require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
require_once __DIR__ . '/../../../CONTROL/db/connection.php';

$result = load_controller(__DIR__ . '/../../../CONTROL/controllers/lab_controller.php');
$rows = $result['data'] ?? [];
$loadError = $result['error'];

$labTypeOptions = [];
$deptOptions = [];

if (isset($conn) && $conn instanceof mysqli) {
    $typeRes = $conn->query("SELECT DISTINCT lab_type FROM LAB WHERE lab_type IS NOT NULL AND lab_type != '' ORDER BY lab_type");
    if ($typeRes) {
        while ($r = $typeRes->fetch_row()) {
            $labTypeOptions[$r[0]] = $r[0];
        }
    }

    $deptRes = $conn->query("SELECT department_id, department_name FROM DEPARTMENT ORDER BY department_name");
    if ($deptRes) {
        while ($r = $deptRes->fetch_assoc()) {
            $deptOptions[$r['department_id']] = $r['department_name'];
        }
    }
}

$page = 'labs';
$section = 'RESOURCES';
$title = 'Laboratories';
$subtitle = 'Explore campus laboratories, departmental ownership and current availability.';
$rowLabel = 'labs';
$searchPlaceholder = 'Search by lab code, name or type...';

$filters = [
    [
        'name' => 'type',
        'label' => 'All Lab Types',
        'options' => $labTypeOptions
    ],
    [
        'name' => 'department',
        'label' => 'All Departments',
        'options' => $deptOptions
    ],
    [
        'name' => 'status',
        'label' => 'All Status',
        'options' => ['ACTIVE' => 'Active', 'INACTIVE' => 'Inactive', 'MAINTENANCE' => 'Maintenance']
    ]
];

$sorts = [
    'name' => 'Sort by Name',
    'code' => 'Sort by Code',
    'department' => 'Sort by Department',
    'capacity' => 'Sort by Capacity',
    'status' => 'Sort by Status'
];

$columns = [
    ['key' => 'lab_code', 'label' => 'Code'],
    ['key' => 'lab_name', 'label' => 'Laboratory'],
    ['key' => 'lab_type', 'label' => 'Type'],
    ['key' => 'department_name', 'label' => 'Department'],
    ['key' => 'room_number', 'label' => 'Room'],
    ['key' => 'building_name', 'label' => 'Building'],
    ['key' => 'capacity', 'label' => 'Capacity'],
    ['key' => 'status', 'label' => 'Status', 'type' => 'status']
];

require __DIR__ . '/../includes/resource_page.php';
