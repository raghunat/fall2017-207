<?php 
$servername = "141.238.139.24";
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

$sql = "SELECT * FROM Test";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "
    id: $row[id] <br>
    name: $row[name] <br>
    email: $row[email] <br>
    <hr>
    ";
  }
} else {
  echo "No Results";
}
$connection->close();
 ?>