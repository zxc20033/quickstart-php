<?php
$json_event = $_POST['json'];
$test = json_decode(str_replace('\n', '', $json_event), true);

$schedules = "BEGIN:VCALENDAR
VERSION:2.0
METHOD:PUBLISH
PRODID:";    
$schedules .= "-//Drupal iCal API//EN";
error_reporting(0);
ini_set('display_errors', 0);
foreach($test as $event)
{	
	$description = explode('講師：', $event['description']);
    $schedules .= "\nBEGIN:VEVENT";
    $schedules .= "\nUID:" . time().rand(11111, 99999);
    $schedules .= "\nDTSTAMP:" . date("Y-m-d H:i:s");
    $schedules .= "\nDTSTART:" . str_replace('-', '', str_replace(':', '', $event['start']));
    $schedules .= "\nLOCATION:".$event['location'];
    $schedules .= "\nDTEND:". str_replace('-', '', str_replace(':', '', $event['end']));
    $schedules .= "\nSUMMARY:".$description[0];
    $schedules .= "\n";
    //$schedules .= "URL;VALUE=URI:http://alsonstudio.com";
	//$schedules .= "\n";
    $schedules .= "\nDESCRIPTION:講師 ".$description[1];
    $schedules .= "\nEND:VEVENT"; 

}
/*
for($i=1;$i<=10;$i++){
    $strDate = strtotime("+$i day");
    $endDate = strtotime("+".($i + 1)." day");
    $schedules .= "\nBEGIN:VEVENT";
    $schedules .= "\nUID:" . time().rand(11111, 99999);
    $schedules .= "\nDTSTAMP:" . date("Y-m-d H:i:s");
    $schedules .= "\nDTSTART:" . date("Ymd", $strDate)."T".date("His")."Z";
    $schedules .= "\nLOCATION: New baneshwor, Kathmandu, Nepal";
    $schedules .= "\nDTEND:". date("Ymd",$endDate)."T".date("His")."Z";
    $schedules .= "\nSUMMARY: Title for event - $i on ".date("Y-m-d H:i:s", $strDate);
    $schedules .= "\n";
    $schedules .= "URL;VALUE=URI:http://rajanmaharjan.com.np";
    $schedules .= "\n";
    $schedules .= "\nDESCRIPTION: This is the test description for event - $i added on ".date("Y-m-d H:i:s", $strDate)." by Rajan Maharjan, a PHP programmer and a web developer";
    $schedules .= "\nEND:VEVENT";    
}
*/ 
$schedules .= "\nEND:VCALENDAR";
ob_start();
header( "Content-type: text/calendar");
header("Content-Disposition: attachment; filename=\"VTC_calendar.ics\"");
header("Expires: 0");
ob_end_flush();
echo $schedules;
exit;

?>
