<?php
require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
$result = load_controller(__DIR__ . '/../../../CONTROL/controllers/event_controller.php'); $rows = $result['data']; $loadError = $result['error'];
$page='events'; $section='OPERATIONS'; $title='Events'; $subtitle='Browse campus events, coordinators and venues.'; $rowLabel='events'; $searchPlaceholder='Search events, descriptions, departments or coordinators...';
$filters=[['name'=>'status','label'=>'All Status','options'=>['PLANNED'=>'Planned','ONGOING'=>'Ongoing','COMPLETED'=>'Completed','CANCELLED'=>'Cancelled']]];
$sorts=['date'=>'Sort by Date','name'=>'Sort by Name','type'=>'Sort by Type','status'=>'Sort by Status','participants'=>'Sort by Capacity'];
$columns=[['key'=>'event_name','label'=>'Event'],['key'=>'event_type','label'=>'Type'],['key'=>'event_date','label'=>'Date','type'=>'date'],['key'=>'start_time','label'=>'Time'],['key'=>'room_number','label'=>'Room'],['key'=>'department_name','label'=>'Department'],['key'=>'coordinator_name','label'=>'Coordinator'],['key'=>'max_participants','label'=>'Capacity'],['key'=>'status','label'=>'Status','type'=>'status']]; require __DIR__ . '/../includes/resource_page.php';
