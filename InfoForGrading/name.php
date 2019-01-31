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

$query = "SELECT * FROM questions WHERE question = '$question'";

//returns all specific info for the current question
$results = mysql_query($query,$conn);
while($result = mysql_fetch_object($results)){
$name = $result -> function_name;
$constraint = $result -> constraints;
$final = "function_name=$name&constraint=$constraint";

}
if($results == NULL)echo"NUll";

//tell middle to use parse_str to iterate


echo $final;
mysql_close($conn);

//echo "done";



