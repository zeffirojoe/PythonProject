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

//notes whether or not the students exam has been completely graded by an admin

$query = "UPDATE Users SET grade_status = 3 WHERE user = '$username'";


$results = mysql_query($query,$conn);

mysql_close($conn);

//echo $json;



