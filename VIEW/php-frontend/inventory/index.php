<?php
require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
$result = load_controller(__DIR__ . '/../../../CONTROL/controllers/inventory_controller.php'); $rows = $result['data']; $loadError = $result['error'];
$page='inventory'; $section='RESOURCES'; $title='Inventory'; $subtitle='Monitor consumable stock levels and storage locations.'; $rowLabel='inventory items'; $searchPlaceholder='Search by item code, name, category or location...';
$filters=[['name'=>'stock','label'=>'All Stock States','options'=>['LOW'=>'Low stock','OUT'=>'Out of stock','OK'=>'In stock']]];
$sorts=['name'=>'Sort by Name','code'=>'Sort by Code','category'=>'Sort by Category','stock'=>'Sort by Stock','minimum'=>'Sort by Minimum'];
$columns=[['key'=>'item_code','label'=>'Item Code'],['key'=>'item_name','label'=>'Item'],['key'=>'category','label'=>'Category'],['key'=>'current_stock','label'=>'Current'],['key'=>'minimum_stock','label'=>'Minimum'],['key'=>'unit','label'=>'Unit'],['key'=>'storage_location','label'=>'Storage'],['key'=>'stock_status','label'=>'Stock Status','type'=>'status']]; require __DIR__ . '/../includes/resource_page.php';
