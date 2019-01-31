<?php
//DB info
$host = "*****";
$dbuser = "*****";
$dbpwd = "*****";
$table = "*****";

$conn = mysql_connect($host, $dbuser, $dbpwd);
if (!$conn) {
    die(mysqli_connect_error());
    echo "connection error";}
mysql_select_db($dbuser,$conn);


//Empties exam table to allow creation of new exams
$query = "DELETE FROM exam";
$results = mysql_query($query,$conn);


if($results)echo "done";
else echo "Error";

mysql_close($conn);

//echo "done";



