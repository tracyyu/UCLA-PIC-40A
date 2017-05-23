#!/usr/local/bin/php
<?php

$time_stamp = time();
$today = date("D, F j, Y, g:i a",$time_stamp);
$calendar_time = $today;
$start_hour_offset = -3;
$end_hour = 12; // How many hours to show total

function goPrevDay()
{
	global $calendar_time;
	$calendar_time -= (3600*24);
}

function goNextDay(()
{
	global $calendar_time;
	$calendar_time += (3600*24);
}

function get_hour_string($time_stamp){
$hour = date("g", $time_stamp);
$am_or_pm = date("a",$time_stamp);
return "$hour.00$am_or_pm";
}

function get_events($person, $timestamp){
$event_str="";
//access the database, select
$hostname = "laguna.pic.ucla.edu";
$username = "tracyyu93";
$password = "Ty28464575";
$database = "tracyyu93";

$db = mysql_connect($hostname, $username, $password) or die ("Could not connect to database
		$database $hostname.");
mysql_select_db($database, $db);
$sql = "SELECT * FROM $event_table WHERE $field_person = '$person' AND $field_time = '$timestamp'";
$result = mysql_query($sql);
while($record = mysql_fetch_array($result))
{
	$event_str.=";".$record[field_person].";".$record[$field_date].";".$reecord[$field_time].";".$record[$field_event_name].";".$record[field_event_message].";";
}
return $event_str;
}

print('<?xml version = "1.0" encoding="utf-8"?> ');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<title>Calendar</title> 
<link rel="stylesheet" type="text/css" href="calendar.css" />
</head>
<body>
<div class="container">
<h1>BRUIN Family Schedule for <?php print"$calendar_time" ?> </h1>
<table id="event_table">

<?php
// print the header
print "	<tr> \n";
print "		<th class='hr_td_'> &nbsp; </th> <th class='table_header'>Tracy</th><th class='table_header'>David</th><th class='table_header'>Joanna</th> \n";
print "	</tr> \n";

for ($i=0; $i<=$end_hour;++$i)
	{

	$hour_string = get_hour_string($time_stamp + $i*3600);
	
	
	if ($i%2 == 0){
	
			print "<tr class='even_row'> \n";

		print "<td class='hr_td'>$hour_string</td> <td> </td> <td> </td> <td></td>\n";
		print "	</tr> \n";
}
	if ($i%2 !=0){

		print "<tr class='odd_row'>\n";
		print "<td class='hr_td'>$hour_string</td> <td> </td> <td> </td> <td> </td>\n";
		print "</tr>\n";
	}
}
?>		
</table>


<div>
<form id="prev" method="get" action="<?php echo $_SERVER["PHP_SELF"] ?>">
	<p>
	<input type="hidden"name="time_stamp" value= <?php ; ?> />
	<input type="button" value="Previous 12 Hours" name="prev" />
	</p>
</form>

<form id="next" method="get" action="<?php echo $_SERVER["PHP_SELF"] ?>">
	<p>
	<input type="hidden"name="time_stamp" value= <?php ; ?> />
	<input type="button" value="Next 12 Hours" name="next"/>
	</p>
</form>

<form id="now" method="get" action="<?php echo $_SERVER["PHP_SELF"] ?>">
	<p>
	<input type="hidden"name="time_stamp" value= <?php $today; ?> />
	<input type="button" value="Now"/>
	</p>
</form>

<span id="quick_event_spot"></span>
</div>

</div>
</body>
</html>