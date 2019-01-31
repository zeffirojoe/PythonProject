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
//recieves all question info for DB insertion
$question = $_POST['question'];
$difficulty = $_POST['difficulty'];
$topic = $_POST['topic'];
$name = $_POST['functionName'];
$expected_result1 = $expected_result2 = $expected_result3 = $expected_result4 = $expected_result5 = $expected_result6 = NULL;
$constraint = $_POST['constraint'];
$expected_result1 = $_POST['result1'];
$expected_result2 = $_POST['result2'];
$expected_result3 = $_POST['result3'];
$expected_result4 = $_POST['result4'];
$expected_result5 = $_POST['result5'];
$expected_result6 = $_POST['result6'];

$test_case1 = $test_case2 = $test_case3 = $test_case4 = $test_case5 = $test_case6 = NULL;
$test_case1 = $_POST['testCase1'];
$test_case2 = $_POST['testCase2'];
$test_case3 = $_POST['testCase3'];
$test_case4 = $_POST['testCase4'];
$test_case5 = $_POST['testCase5'];
$test_case6 = $_POST['testCase6'];

$arr = array($test_case1,$test_case2,$test_case3,$test_case4,$test_case5,$test_case6);
$arr2 = array($expected_result1,$expected_result2,$expected_result3,$expected_result4,$expected_result5,$expected_result6);

//iteration through all possible test cases and expected results

$values = "";
$count = 0;
foreach ($arr as $value){

	if($value == NULL || empty($value))break;
	$count++;
}
$count2 = 0;
for ($x = 0; $x<6; $x++){
	if($count2 >= $count) $values = $values.",NULL,NULL";
	else $values = $values.",'".$arr[$x]."','".$arr2[$x]."'";

	$count2++;
}

$query = "INSERT INTO `questions`(`question`, `difficulty`, `constraints`, `topic`, `function_name`, `test_case1`, `expected_result1`, `test_case2`, `expected_result2`, `test_case3`, `expected_result3`, `test_case4`, `expected_result4`, `test_case5`, `expected_result5`, `test_case6`, `expected_result6`) VALUES ('$question','$difficulty','$constraint','$topic','$name'".$values.")";//GET INSERT STATEMENT FROM PHPMYADMIN AND REPLACE VALUES WITH PROPER VARIABLES

$results = mysql_query($query,$conn);
echo $query;
if($results){
echo "done";
}
else{
echo "Error";
}
mysql_close($conn);

//echo "done";



