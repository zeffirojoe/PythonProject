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

$question = $_POST['question'];

$query = "SELECT points FROM exam WHERE question = '$question'";


$results = mysql_query($query,$conn);
while($result = mysql_fetch_object($results)){
$points = $result -> points;


}
if($results == NULL)echo"NUll";


echo $points;
mysql_close($conn);

//echo "done";



