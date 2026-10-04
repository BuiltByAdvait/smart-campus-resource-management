<?php
require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
require_once __DIR__ . '/../../../CONTROL/db/connection.php';

$result = load_controller(__DIR__ . '/../../../CONTROL/controllers/equipment_controller.php');
$rows = $result['data'] ?? [];
$loadError = $result['error'];

$categoryOptions = [];
$conditionOptions = [];
$statusOptions = [];

if (isset($conn) && $conn instanceof mysqli) {
    $catRes = $conn->query("SELECT category_id, category_name FROM EQUIPMENT_CATEGORY ORDER BY category_name");
    if ($catRes) {
        while ($r = $catRes->fetch_assoc()) {
            $categoryOptions[$r['category_id']] = $r['category_name'];
        }
    }

    $condRes = $conn->query("SELECT DISTINCT condition_status FROM EQUIPMENT WHERE condition_status IS NOT NULL AND condition_status != '' ORDER BY condition_status");
    if ($condRes) {
        while ($r = $condRes->fetch_row()) {
            $conditionOptions[$r[0]] = ucwords(strtolower(str_replace('_', ' ', $r[0])));
        }
    }

    $statusRes = $conn->query("SELECT DISTINCT operational_status FROM EQUIPMENT WHERE operational_status IS NOT NULL AND operational_status != '' ORDER BY operational_status");
    if ($statusRes) {
        while ($r = $statusRes->fetch_row()) {
            $statusOptions[$r[0]] = ucwords(strtolower(str_replace('_', ' ', $r[0])));
        }
    }
}

$page = 'equipment';
$section = 'RESOURCES';
$title = 'Equipment';
$subtitle = 'View physical campus equipment, asset conditions and operational availability.';
$rowLabel = 'equipment items';
$searchPlaceholder = 'Search by equipment name, asset tag or serial...';

$filters = [
    [
        'name' => 'category',
        'label' => 'All Categories',
        'options' => $categoryOptions
    ],
    [
        'name' => 'condition',
        'label' => 'All Conditions',
        'options' => $conditionOptions
    ],
    [
        'name' => 'status',
        'label' => 'All Status',
        'options' => $statusOptions
    ]
];

$sorts = [
    'name' => 'Sort by Name',
    'asset' => 'Sort by Asset',
    'category' => 'Sort by Category',
    'condition' => 'Sort by Condition',
    'status' => 'Sort by Status'
];

$columns = [
    ['key' => 'asset_tag', 'label' => 'Asset Tag'],
    ['key' => 'equipment_name', 'label' => 'Equipment'],
    ['key' => 'category_name', 'label' => 'Category'],
    ['key' => 'serial_number', 'label' => 'Serial No.'],
    ['key' => 'room_number', 'label' => 'Room'],
    ['key' => 'department_name', 'label' => 'Department'],
    ['key' => 'condition_status', 'label' => 'Condition', 'type' => 'status'],
    ['key' => 'operational_status', 'label' => 'Availability', 'type' => 'status'],
    ['key' => 'warranty_expiry', 'label' => 'Warranty', 'type' => 'date']
];

require __DIR__ . '/../includes/resource_page.php';
