#!/usr/local/bin/php -d display_errors=STDOUT
<?php
  // begin this XHTML page
  print('<?xml version="1.0" encoding="utf-8"?>');
  print("\n");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; 
charset=utf-8" />
<title>PHP Example: Accessing a MySQL Database using PHP</title> 
</head>
<body>
<p>
<?php 

if( get_magic_quotes_gpc())
{
	foreach( $_POST as $label => $value)
	{
		$_POST[$key] = stripslashes($value);
	}
}

// Extract form submission
$person = (isset($_POST["person"]))?$_POST["person"]:"";
$date = (isset($_POST["date"]))?$_POST["date"]:"";
$time = (isset($_POST["time"]))?$_POST["time"]:"";
$event_name = (isset($_POST["event_name"]))?$_POST["event_name"]:"";
$event_message = (isset($_POST["event_message"]))?$_POST["event_message"]:"";

//Convert date and time into unix time
$date_arr = explode("-", $date);
$time_arr = explode(":", $time);
$month = date_arr[0];
$day = date_arr[1];
$year= date_arr[2];
$hr = $time_arr[0];
$min = $time_arr[1];
$time_len = count($time_arr);
if( time_len == 2)
	$sec == 0;
else
	$sec == $time_arr[2];
$time = mktime($hr,$min,$sec,$month,$day,$year);


/////////////////////////////////////////////////////////////////////////
	Access MySQL database
/////////////////////////////////////////////////////////////////////////
$hostname = "laguna.pic.ucla.edu";
$username = "tracyyu93";
$password = "Ty28464575";
$database = "tracyyu93";

$db = mysql_connect($hostname, $username, $password) or die ("Could not connect to database
		$database $hostname.");
mysql_select_db($database, $db);
// define tablename and field names for a MySQL query to create a table in a database
$event_table = "event_table";
$field_person = "person";
$field_date = "date";
$field_time = "time";
$field_event_name = "event_name";
$field_event_message = "event_message";
// convert time & date
$date 

//Create the table with specific field choices
$sql = "drop table $event_table;";
$result = mysql_query($sql);
$sql = "CREATE TABLE $event_table ( $field_person varchar(100), $field_date int(12), $field_time int(12),		
	$field_event_name varchar(300), $field_event_message varchar(300))";
$result = mysql_query($sql);

//Check if event already exists for that specific time and date
// if exists, update the event name and message
$sql = "UPDATE $table SET $field_event_name = '$event_name', $field_event_message = '$event_message' 
WHERE $field_person = '$person', $field_date = '$date', $field_time = '$time'";
$result = mysql_query($sql);

// If not, now want to insert from the create_event.html
$table = "event_table";
$field_person = $person;
$field_date = $date;
$field_time = $time;
$field_event_name = $event_name;
$field_event_message = $event_message;
$sql = "INSERT INTO $table( $field_person, $field_date, $field_time, $field_event_name, $field_event_message)
VALUES('$person','$date','$time','$event_name','$event_message')";
$result = mysql_query($sql);



?>
</body>
</html>