<?php
$servername = "localhost";
$username = "class";
$password = "test";
$dbname = "first";
//create a connection
$connection = new mysqli($servername,
                         $username,
                         $password);
//check the connection
if ($connection->connect_error) {
  die("Conenction Failed: " . $connection->connect_error);
} else {
  echo "Connected Successfully";
}
?>