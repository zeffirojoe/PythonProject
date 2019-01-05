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



//ONLY WORKS FOR ONE QUESTION SO FAR, NEED TO CHANGE IMPLEMENTATION TO WORK FOR ALL QUESTIONS IN EXAM

//$question = $_POST['question'];
//$tests = $_POST['test_case'];
//$expected_nums = $_POST['expected_result'];


$query = "DELETE FROM exam";
$results = mysql_query($query,$conn);


if($results)echo "done";
else echo "Error";

mysql_close($conn);

//echo "done";



