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
//Create the SQL Statement 
$sql = "INSERT INTO Test (name, email) VALUES ('John', 'Johnald@yahoo.com')";
//Run the sql statement
if ($connection->query($sql) === true) {
  echo "The Insert Worked";
} else {
  echo "Error occured in the insert: " . $connection->error;
}




 $connection->close();
 ?>