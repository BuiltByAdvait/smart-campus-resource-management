<?php
require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
require_once __DIR__ . '/../../../CONTROL/db/connection.php';

$result = load_controller(__DIR__ . '/../../../CONTROL/controllers/computer_controller.php');
$rows = $result['data'] ?? [];
$loadError = $result['error'];

$labOptions = [];
$statusOptions = [];
$storageOptions = [];

if (isset($conn) && $conn instanceof mysqli) {
    $labRes = $conn->query("SELECT lab_id, CONCAT(lab_code, ' - ', lab_name) AS label FROM LAB ORDER BY lab_code");
    if ($labRes) {
        while ($r = $labRes->fetch_assoc()) {
            $labOptions[$r['lab_id']] = $r['label'];
        }
    }

    $statusRes = $conn->query("SELECT DISTINCT status FROM COMPUTER WHERE status IS NOT NULL AND status != '' ORDER BY status");
    if ($statusRes) {
        while ($r = $statusRes->fetch_row()) {
            $statusOptions[$r[0]] = ucwords(strtolower(str_replace('_', ' ', $r[0])));
        }
    }

    $storageRes = $conn->query("SELECT DISTINCT storage_type FROM COMPUTER WHERE storage_type IS NOT NULL AND storage_type != '' ORDER BY storage_type");
    if ($storageRes) {
        while ($r = $storageRes->fetch_row()) {
            $storageOptions[$r[0]] = $r[0];
        }
    }
}

$page = 'computers';
$section = 'RESOURCES';
$title = 'Computers';
$subtitle = 'Track campus computing assets, hardware specifications and technical status.';
$rowLabel = 'computers';
$searchPlaceholder = 'Search by asset tag, serial, processor or lab...';

$filters = [
    [
        'name' => 'lab',
        'label' => 'All Labs',
        'options' => $labOptions
    ],
    [
        'name' => 'status',
        'label' => 'All Status',
        'options' => $statusOptions
    ],
    [
        'name' => 'storage_type',
        'label' => 'All Storage',
        'options' => $storageOptions
    ]
];

$sorts = [
    'asset' => 'Sort by Asset',
    'lab' => 'Sort by Lab',
    'processor' => 'Sort by Processor',
    'ram' => 'Sort by RAM',
    'storage' => 'Sort by Storage',
    'status' => 'Sort by Status'
];

$columns = [
    ['key' => 'asset_tag', 'label' => 'Asset Tag'],
    ['key' => 'serial_number', 'label' => 'Serial No.'],
    ['key' => 'lab_name', 'label' => 'Lab'],
    ['key' => 'room_number', 'label' => 'Room'],
    ['key' => 'processor', 'label' => 'Processor'],
    ['key' => 'ram_gb', 'label' => 'RAM (GB)'],
    ['key' => 'storage_gb', 'label' => 'Storage (GB)'],
    ['key' => 'storage_type', 'label' => 'Drive Type'],
    ['key' => 'operating_system', 'label' => 'OS'],
    ['key' => 'status', 'label' => 'Status', 'type' => 'status']
];

require __DIR__ . '/../includes/resource_page.php';
