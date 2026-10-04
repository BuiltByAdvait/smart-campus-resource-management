<?php
require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
$result = load_controller(__DIR__ . '/../../../CONTROL/controllers/complaint_controller.php'); $rows = $result['data']; $loadError = $result['error'];
$page='complaints'; $section='OPERATIONS'; $title='Complaints'; $subtitle='Review campus concerns, progress and resolution details.'; $rowLabel='complaints'; $searchPlaceholder='Search subject, type, description or reporter...';
$filters=[['name'=>'priority','label'=>'All Priorities','options'=>['LOW'=>'Low','MEDIUM'=>'Medium','HIGH'=>'High','CRITICAL'=>'Critical']],['name'=>'status','label'=>'All Status','options'=>['OPEN'=>'Open','IN_PROGRESS'=>'In progress','RESOLVED'=>'Resolved','CLOSED'=>'Closed','REJECTED'=>'Rejected']]];
$sorts=['date'=>'Sort by Date','priority'=>'Sort by Priority','status'=>'Sort by Status','subject'=>'Sort by Subject'];
$columns=[['key'=>'complaint_id','label'=>'ID'],['key'=>'complaint_type','label'=>'Type'],['key'=>'subject','label'=>'Subject'],['key'=>'reported_by','label'=>'Reported By'],['key'=>'complaint_date','label'=>'Date','type'=>'date'],['key'=>'priority','label'=>'Priority','type'=>'status'],['key'=>'complaint_status','label'=>'Status','type'=>'status'],['key'=>'resolution_date','label'=>'Resolved','type'=>'date']]; require __DIR__ . '/../includes/resource_page.php';
