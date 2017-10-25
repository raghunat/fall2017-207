<?php 
$servername = "141.238.138.133";
$username = "class14";
$password = "test";
$db = "raghunath";
//create a connection
$connection = new mysqli($servername,
                         $username,
                         $password,
                         $db);
//check the connection
if ($connection->connect_error) {
  die("Conenction Failed: " . $connection->connect_error);
} else {
  echo "Connected Successfully";
}

$sql = "CREATE TABLE Test (
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30),
  email VARCHAR(30)
  )";


if ($connection->query($sql) === true) {
  echo "The Table Was Created";
} else {
  echo "Error creating table: " . $connection->error;
}

$connection->close();







 ?>