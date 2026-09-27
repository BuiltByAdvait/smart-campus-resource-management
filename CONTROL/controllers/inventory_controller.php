<?php
require_once __DIR__ . '/../db/connection.php';

$search = trim($_GET['search'] ?? '');
$category = $_GET['category'] ?? '';
$stock = $_GET['stock'] ?? '';
$sort = $_GET['sort'] ?? 'name';

$allowedSorts = [
    'name' => 'i.item_name',
    'code' => 'i.item_code',
    'category' => 'i.category',
    'stock' => 'i.current_stock',
    'minimum' => 'i.minimum_stock'
];

$orderBy = $allowedSorts[$sort] ?? 'i.item_name';

$sql = "SELECT
            i.item_id,
            i.item_code,
            i.item_name,
            i.category,
            i.unit,
            i.minimum_stock,
            i.current_stock,
            i.storage_location,
            i.status,
            CASE
                WHEN i.current_stock = 0 THEN 'OUT_OF_STOCK'
                WHEN i.current_stock <= i.minimum_stock THEN 'LOW_STOCK'
                ELSE 'IN_STOCK'
            END AS stock_status
        FROM INVENTORY_ITEM i
        WHERE 1=1";

$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND (
        i.item_code LIKE ?
        OR i.item_name LIKE ?
        OR i.category LIKE ?
        OR i.storage_location LIKE ?
    )";
    $term = "%{$search}%";
    array_push($params, $term, $term, $term, $term);
    $types .= 'ssss';
}

if ($category !== '') {
    $sql .= " AND i.category = ?";
    $params[] = $category;
    $types .= 's';
}

if ($stock === 'LOW') {
    $sql .= " AND i.current_stock <= i.minimum_stock AND i.current_stock > 0";
} elseif ($stock === 'OUT') {
    $sql .= " AND i.current_stock = 0";
} elseif ($stock === 'OK') {
    $sql .= " AND i.current_stock > i.minimum_stock";
}

$sql .= " ORDER BY {$orderBy} ASC";

$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$inventory = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

return $inventory;
