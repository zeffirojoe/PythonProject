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

$constraint = $difficulty = $keyword = $topic = NULL;
$difficulty = $_POST['difficulty'];
$keyword = $_POST['keywords'];
$topic = $_POST['topic'];

//returns list of questions based on criteria recieved through initial POST
$query = "SELECT * FROM questions WHERE difficulty LIKE '%$difficulty%' AND topic LIKE '%$topic%' AND question LIKE '%$keyword%'";
if($difficulty === NULL || empty($difficulty)) $query = str_replace("difficulty LIKE '%$difficulty%' AND", "", $query);
if($topic === NULL || empty($topic)) $query = str_replace("AND topic LIKE '%$topic%'", "", $query);
if($keyword === NULL || empty($keyword)) $query = str_replace("AND question LIKE '%$keyword%'", "", $query);
if($difficulty === NULL && $topic === NULL && $keyword === NULL) $query = "SELECT * FROM questions";

//returns list of question in proper JSON format

$questions = '{ "questions": [ ';
$results = mysql_query($query,$conn);
while($row = mysql_fetch_assoc($results)){
$questions = $questions.'{"question":"'.$row['question'].'", ';
$questions = $questions.'"difficulty":"'.$row['difficulty'].'", ';
$questions = $questions.'"topic":"'.$row['topic'].'" ';
//$questions = $questions.'"constraint":"'.$row['constraints'].'" ';
$questions = $questions.' },';


}
$json = substr($questions,0,-1);
$json = $json.']}';
echo $json;
mysql_close($conn);

//echo "done";


