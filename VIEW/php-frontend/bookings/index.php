<?php
require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
$result = load_controller(__DIR__ . '/../../../CONTROL/controllers/booking_controller.php'); $rows = $result['data']; $loadError = $result['error'];
$page='bookings'; $section='OPERATIONS'; $title='Bookings'; $subtitle='Review room reservations and allocated equipment.'; $rowLabel='bookings'; $searchPlaceholder='Search by room, purpose or booked by...';
$filters=[['name'=>'date','label'=>'Booking Date','type'=>'date'],['name'=>'status','label'=>'All Status','options'=>['PENDING'=>'Pending','CONFIRMED'=>'Confirmed','CANCELLED'=>'Cancelled','COMPLETED'=>'Completed']]];
$sorts=['date'=>'Sort by Date','room'=>'Sort by Room','status'=>'Sort by Status','booker'=>'Sort by Booker'];
$columns=[['key'=>'booking_id','label'=>'ID'],['key'=>'room_number','label'=>'Room'],['key'=>'booking_date','label'=>'Date','type'=>'date'],['key'=>'start_time','label'=>'Start'],['key'=>'end_time','label'=>'End'],['key'=>'purpose','label'=>'Purpose'],['key'=>'booked_by','label'=>'Booked By'],['key'=>'booker_type','label'=>'Type','type'=>'status'],['key'=>'booking_status','label'=>'Status','type'=>'status']]; require __DIR__ . '/../includes/resource_page.php';
