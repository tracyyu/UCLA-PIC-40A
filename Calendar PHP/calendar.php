#!/usr/local/bin/php
<?xml version = "1.0" encoding="utf-8"?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<title>Calendar</title> 
<?php echo '<link rel="stylesheet" type="text/css" href="calendar.css"></head>'; ?>
</head>
<body>
<div class="container" >
    <p>
        <?php
            $timestamp = time();        //get current timestamp
            $year = date("Y", $timestamp);
            $month = date("m", $timestamp);
            $day = date("d", $timestamp);
            $day_txt = date("D", $timestamp);
            
            $hour = date("h", $timestamp);
            $minute = date("i", $timestamp);
            $second = date("s", $timestamp);
            $meridian = date("a", $timestamp);
            echo "<h1> BRUIN SCHEDULE for $day_txt, $month/$day/$year, $hour:$minute $meridian</h1>"; // set title of the page 
        
            $hours_to_show = "12";
        
            function get_hour_string(&$time)    // function to return the hour
            {
                $hour = date("h", $time);
                $meridian = date("a", $time);
                return("$hour:00$meridian");
            }
            if( $hours_to_show > 0)
            {
                $cur_timestamp = time();
                echo "<table class='event_table'>";
                echo "<tr> 
                        <th class='hr_td_'> &nbsp; </th> <th class='table_header'>Tracy</th><th class='table_header'>David</th>
                    </tr>";
                $i = 0;
                while( $i < $hours_to_show )
                {
                    if($i%2 == 0)
                        echo "<tr class='even_row'>";
                    else
                        echo "<tr class='odd_row'>";
                    echo "<td class='hr_td'>get_hour_string(cur_timestamp)</td> <td> </td> <td> </td> <td></td></tr>";
                    $cur_timestamp += 3600;
                    $i++;
                }
                echo "</table>";
            }
        ?>
    </p>
</div>
</body>
</html>
