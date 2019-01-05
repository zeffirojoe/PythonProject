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

$query = "SELECT test_case1, test_case2, test_case3, test_case4, test_case5, test_case6 FROM questions WHERE question = '$question'";


$results = mysql_query($query,$conn);
while($result = mysql_fetch_object($results)){
$testcase1 = $result -> test_case1;
$testcase2 = $result -> test_case2;
$testcase3 = $result -> test_case3;
$testcase4 = $result -> test_case4;
$testcase5 = $result -> test_case5;
$testcase6 = $result -> test_case6;
$testcase = "testcase1=$testcase1&testcase2=$testcase2&testcase3=$testcase3&testcase4=$testcase4&testcase5=$testcase5&testcase6=$testcase6";

}
if($results == NULL)echo"NUll";

//tell middle to use parse_str to iterate

$testcase = str_replace('+', '%2B', $testcase);
echo $testcase;
mysql_close($conn);

//echo "done";



