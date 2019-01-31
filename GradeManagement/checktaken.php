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

//checks if current student has taken the available exam
//$username = $_POST['user'];
$username = 'student1';
$username = hash('md5',$username);
$query = "SELECT grade_status FROM Users WHERE user = '$username'";


$results = mysql_query($query,$conn);

while($row = mysql_fetch_assoc($results)){
echo $row['grade_status'];
}

mysql_close($conn);

//echo $json;



