<?php 
$servername = "141.238.137.235";
$username = "class14";
$password = "test";
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

//CREATE DB
$sql = "CREATE DATABASE raghunath";
if ($connection->query($sql) === true) {
  echo "The Databse was created";
} else {
  echo "Error Creating Database " . $connection->error;
}


$connection->close();



 ?>