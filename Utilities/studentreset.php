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

//$username = $_POST['user'];
$username = 'student1';
$username = hash('md5',$username);

$query = "UPDATE Users SET grade_status = 0 WHERE user = '$username'";
//resets students ability to take exam, only necessary after full reset of grades.

$results = mysql_query($query,$conn);

mysql_close($conn);

//echo $json;



