<?php
//dotvik server db credentials//

$serverName = "localhost";
$username = "dotvik";
$password = "Modiji#456";
$dbName = "dotvik_site";

//local server db credentials//

// $serverName = "localhost";
// $username = "pradeep";  
// $password = "pradeep";
// $dbName = "ais_site";

// Create connection
// $conn = new mysqli($serverName, $username, $password , $dbName);
$mysqli = new mysqli($serverName, $username, $password , $dbName);
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
  }else{
   echo "Connected successfully";
  }

?>