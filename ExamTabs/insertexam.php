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

$question = $_POST['question'];
$points = $_POST['points'];
//$tests = $_POST['test_case'];
//$expected_nums = $_POST['expected_result'];

$query = "SELECT * FROM questions WHERE question = '$question'";
$results = mysql_query($query,$conn);


$row = mysql_fetch_assoc($results);

$expected_result1 = $expected_result2 = $expected_result3 = $expected_result4 = $expected_result5 = $expected_result6 = NULL;
$expected_result1 = $row['expected_result1'];
$expected_result2 = $row['expected_result2'];
$expected_result3 = $row['expected_result3'];
$expected_result4 = $row['expected_result4'];
$expected_result5 = $row['expected_result5'];
$expected_result6 = $row['expected_result6'];

$test_case1 = $test_case2 = $test_case3 = $test_case4 = $test_case5 = $test_case6 = NULL;
$test_case1 = $row['test_case1'];
$test_case2 = $row['test_case2'];
$test_case3 = $row['test_case3'];
$test_case4 = $row['test_case4'];
$test_case5 = $row['test_case5'];
$test_case6 = $row['test_case6'];


$query = "INSERT INTO exam (question, points) VALUES ('$question','$points')";//GET INSERT STATEMENT FROM PHPMYADMIN AND REPLACE VALUES WITH PROPER VARIABLES
$result = mysql_query($query,$conn);
if($result)echo "done";
else echo "Error";

mysql_close($conn);

//echo "done";



