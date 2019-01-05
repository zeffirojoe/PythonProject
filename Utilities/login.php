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

$username = $_POST['username'];
$pwd = $_POST['password'];


$username = hash('md5',$username);
$pwd = hash('md5',$pwd);
$query = "SELECT status FROM Users WHERE user = '$username' AND password = '$pwd'";
$results = mysql_query($query,$conn);
$num = mysql_num_rows($results);
$id = mysql_fetch_object($results);

$status = $id -> status;

//Add functionalty to echo proper student or teacher access
if($num > 0 ){
 //$json = '{ "dbanswer":"yes"';
 if($status == 1) $json = '{ "dbanswer":"1"}';
 else $json = '{ "dbanswer":"2"}';
 }
else $json = '{ "dbanswer":"0"}';

mysql_close($conn);

echo $json;



