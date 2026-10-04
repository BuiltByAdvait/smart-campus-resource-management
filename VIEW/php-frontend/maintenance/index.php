<?php
require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
$result = load_controller(__DIR__ . '/../../../CONTROL/controllers/maintenance_controller.php'); $rows = $result['data']; $loadError = $result['error'];
$page='maintenance'; $section='OPERATIONS'; $title='Maintenance'; $subtitle='Track reported asset issues and technician assignments.'; $rowLabel='requests'; $searchPlaceholder='Search issue, asset or technician...';
$filters=[['name'=>'priority','label'=>'All Priorities','options'=>['LOW'=>'Low','MEDIUM'=>'Medium','HIGH'=>'High','CRITICAL'=>'Critical']],['name'=>'status','label'=>'All Status','options'=>['OPEN'=>'Open','IN_PROGRESS'=>'In progress','RESOLVED'=>'Resolved','CLOSED'=>'Closed','CANCELLED'=>'Cancelled']]];
$sorts=['date'=>'Sort by Date','priority'=>'Sort by Priority','status'=>'Sort by Status','resource'=>'Sort by Resource'];
$columns=[['key'=>'request_id','label'=>'ID'],['key'=>'resource_name','label'=>'Resource'],['key'=>'asset_tag','label'=>'Asset Tag'],['key'=>'issue_description','label'=>'Issue'],['key'=>'priority','label'=>'Priority','type'=>'status'],['key'=>'reported_by','label'=>'Reported By'],['key'=>'technician_name','label'=>'Technician'],['key'=>'request_date','label'=>'Requested','type'=>'date'],['key'=>'request_status','label'=>'Status','type'=>'status']]; require __DIR__ . '/../includes/resource_page.php';
