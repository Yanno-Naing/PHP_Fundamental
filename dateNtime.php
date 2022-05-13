<?php 

#date()

$date = date("d + m + y");

echo $date . "<br>";

echo date("F d, Y h:i:s");

echo date_default_timezone_get();

date_default_timezone_set('Asia/Yangon');
echo date_default_timezone_get();

echo date("F d, Y h:i:s") . "<br>";



#time()

$timestamp = time();
$date = date("M d, Y h:i:s", $timestamp);
echo $date."<br>";

#mktime()

$timestamp = mktime(0,0,0,2,17,2015);   // h,i,s,m,d,y
echo "Specific Date: ".date("M d, Y h:i:s", $timestamp);

#manipulating date
$futureT = mktime(0,0,0,date("m")+1,date("d"),date("y"));   // h,i,s,m,d,y
echo "Specific Date: ".date("M d, Y h:i:s", $futureT);

