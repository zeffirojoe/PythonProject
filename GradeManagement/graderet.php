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

$username = 'student1';
$username = md5($username);

//returns all grade info in proper JSON format
$query = "SELECT * FROM `$username`";
$results = mysql_query($query,$conn);

if(!$results)echo "sql error";
$questions = '{ "answers": [ ';
while($row = mysql_fetch_assoc($results)){

$questions = $questions.'{"question":"'.$row['question'].'", ';
$query = "SELECT points FROM exam WHERE question = '".$row['question']."'";
//echo $query;
$result = mysql_query($query,$conn);
if(!$result) echo "ROW 2 ERORR";
while($row2 = mysql_fetch_assoc($result)) $questions = $questions.'"maxpoints":"'.$row2['points'].'", ';
$answer = str_replace('"','\"',$row['answer']); //escapes certain characters for cleaner display
$answer = str_replace(' ', '&nbsp;',$answer);
$questions = $questions.'"answer":"'.$answer.'", ';
$questions = $questions.'"grade":"'.$row['grade'].'", ';

$comments = str_replace('"','\"',$row['comments']);
$questions = $questions.'"comments":"'.$comments.'", ';
$questions = $questions.'"name":'.$row['name'].', ';
$questions = $questions.'"constraint":'.$row['constraints'].', ';
$questions = $questions.'"print":'.$row['print'].', ';
$questions = $questions.'"colon":'.$row['colon'].', ';
$query = "SELECT * FROM questions WHERE question = '".$row['question']."'";
//echo $query;
$result = mysql_query($query,$conn);
if(!$result) echo "ROW 2 ERORR";
while($row2 = mysql_fetch_assoc($result)) {
    //more escaping of characters which would interrupt JSON object
    $testcase = str_replace('"','\"',$row2['test_case1']);
    $questions = $questions.'"testcase1":"'.$testcase.'", ';
    $questions = $questions.'"expected1":"'.$row2['expected_result1'].'", ';
    $testcase = str_replace('"','\"',$row2['test_case2']);
    $questions = $questions.'"expected2":"'.$row2['expected_result2'].'", ';
    $questions = $questions.'"testcase2":"'.$testcase.'", ';
    $testcase = str_replace('"','\"',$row2['test_case3']);
    $questions = $questions.'"testcase3":"'.$testcase.'", ';
    $questions = $questions.'"expected3":"'.$row2['expected_result3'].'", ';
    $testcase = str_replace('"','\"',$row2['test_case4']);
    $questions = $questions.'"testcase4":"'.$testcase.'", ';
    $questions = $questions.'"expected4":"'.$row2['expected_result4'].'", ';
    $testcase = str_replace('"','\"',$row2['test_case5']);
    $questions = $questions.'"testcase5":"'.$testcase.'", ';
    $questions = $questions.'"expected5":"'.$row2['expected_result6'].'", ';
    $testcase = str_replace('"','\"',$row2['test_case6']);
    $questions = $questions.'"testcase6":"'.$testcase.'", ';
    $questions = $questions.'"expected6":"'.$row2['expected_result6'].'", ';

}
$questions = $questions.'"result1":"'.$row['result1'].'", ';
$questions = $questions.'"result2":"'.$row['result2'].'", ';
$questions = $questions.'"result3":"'.$row['result3'].'", ';
$questions = $questions.'"result4":"'.$row['result4'].'", ';
$questions = $questions.'"result5":"'.$row['result5'].'", ';
$questions = $questions.'"result6":"'.$row['result6'].'" ';

$questions = $questions.' },';


}
$json = substr($questions,0,-1);
$json = $json.']}';

$json = str_replace("\n","<br>",$json);

echo $json;


mysql_close($conn);

//echo $json;



