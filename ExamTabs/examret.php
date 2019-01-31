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


$query = "SELECT * FROM exam";
//returns all exam info in proper JSON format
$questions = '{ "questions": [ ';

$results = mysql_query($query,$conn);
while($row = mysql_fetch_assoc($results)){
$questions = $questions.'{"question":"'.$row['question'].'", ';
$questions = $questions.'"points":"'.$row['points'].'"';
$questions = $questions.' },';


}
$json = substr($questions,0,-1);
$json = $json.']}';
echo $json;
mysql_close($conn);

//echo "done";



