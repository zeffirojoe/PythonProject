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
//username = $_POST['username'];
$username = 'student1';
$username = md5($username);

//erases current grade info for student

$username = '5e5545d38a68148a2d5bd5ec9a89e327';
echo $username;
$query = "DELETE FROM `$username` WHERE 1";
$results = mysql_query($query,$conn);


if(!$result) echo "done";
mysql_close($conn);




