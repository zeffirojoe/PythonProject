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

//returns list of all questions in proper JSON format

$query = "SELECT * FROM questions";

$questions = '{ "questions": [ ';
//$difficulties = "";
//$keywords = "";
//$test_case = "";
//$expected_result = "";

$results = mysql_query($query,$conn);
while($row = mysql_fetch_assoc($results)){
$questions = $questions.'{"question":"'.$row['question'].'", ';
$questions = $questions.'"difficulty":"'.$row['difficulty'].'", ';
$questions = $questions.'"keywords":"'.$row['keywords'].'", ';
$questions = $questions.'"test_case":"'.$row['test_case'].'", ';
$questions = $questions.'"expected_result":"'.$row['expected_result'].'"';
$questions = $questions.' },';


}
$json = substr($questions,0,-1);
$json = $json.']}';
echo $json;
mysql_close($conn);

//echo "done";



