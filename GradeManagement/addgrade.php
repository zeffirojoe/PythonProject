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

//adds overall grade and test case info for a single student


//$username = $_POST['user'];
$username = 'student1';
$username = hash('md5',$username);
$username = "5e5545d38a68148a2d5bd5ec9a89e327";

$question = $_POST['question'];
$answer = $_POST['answer'];
$test_case1 = $test_case2 = $test_case3 = $test_case4 = $test_case5 = $test_case6 = NULL;
$grade = $_POST['grade'];
$test_case1 = $_POST['result1'];
$test_case2 = $_POST['result2'];
$test_case3 = $_POST['result3'];
$test_case4 = $_POST['result4'];
$test_case5 = $_POST['result5'];
$test_case6 = $_POST['result6'];
$print = $_POST['print'];
$name = $_POST['function_name'];
$constraints = $_POST['constraint'];
$colon = $_POST['colon'];

$query = "INSERT INTO `5e5545d38a68148a2d5bd5ec9a89e327`(`question`, `answer`, `grade`, `comments`, `name`, `constraints`, `print`, `colon`, `result1`, `result2`, `result3`, `result4`, `result5`,
`result6`) VALUES ('$question','$answer','$grade','','$name','$constraints','$print','$colon', '$test_case1','$test_case2','$test_case3','$test_case4','$test_case5','$test_case6')";

echo $query.'\n';

$results = mysql_query($query,$conn);
if(!$results)echo"Error";
mysql_close($conn);

//echo $json;



