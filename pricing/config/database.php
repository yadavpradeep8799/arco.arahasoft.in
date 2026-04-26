	<?php
//ais server db credentials//
<
 $serverName = "127.0.0.1";
 $username = "root";
 $password = "D0tv1k0pt1ma#123";
 $database = "ais_site";

//$serverName = "127.0.0.1";
//$username = "pradeepyadav";
//$password = "Yadav@987";
//$database = "ais_site";


// $serverName = "localhost:3306";
// $username = "root";
// $password = "root1234";
// $database = "ais_site";


$conn = new mysqli($serverName, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);


// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("Failed to connect to MySQL: " . mysqli_connect_error());

}

?>
