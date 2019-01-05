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

$query = "SELECT expected_result1, expected_result2, expected_result3, expected_result4, expected_result5, expected_result6 FROM questions WHERE question = '$question'";


$results = mysql_query($query,$conn);
while($result = mysql_fetch_object($results)){
$expected1 = $result -> expected_result1;
$expected2 = $result -> expected_result2;
$expected3 = $result -> expected_result3;
$expected4 = $result -> expected_result4;
$expected5 = $result -> expected_result5;
$expected6 = $result -> expected_result6;
$expected = "expected1=$expected1&expected2=$expected2&expected3=$expected3&expected4=$expected4&expected5=$expected5&expected6=$expected6";

}
if($results == NULL)echo"NUll";

//tell middle to use parse_str to iterate


echo $expected;
mysql_close($conn);

//echo "done";



