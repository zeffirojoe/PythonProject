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
//username = $_POST['username'];
$username = 'student1';
$username = md5($username);

$username = '5e5545d38a68148a2d5bd5ec9a89e327';
echo $username;
$query = "DELETE FROM `$username` WHERE 1";
$results = mysql_query($query,$conn);



/*$query = "CREATE TABLE $username (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	question VARCHAR(100) NOT NULL,
	answer VARCHAR(100) NOT NULL,
	grade VARCHAR(100) NOT NULL,
	comments VARCHAR(100) NOT NULL,
	name VARCHAR(100),
	constraints VARCHAR(100),
	print VARCHAR(100),
	test_case1 INT(6),
	test_case2 INT(6),
	test_case3 INT(6),
	test_case4 INT(6),
	test_case5 INT(6),
	test_case6 INT(6))";
$result = mysql_query($query,$conn);
*/
if(!$result) echo "done";
mysql_close($conn);

//echo $json;



