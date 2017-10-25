<?php 
$servername = "141.238.139.24";
$username = "class14";
$password = "test";
$db = "raghunath";
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
echo "$_POST[name], $_POST[email], $_POST[id]";
$stmt = $connection->prepare("UPDATE Test SET name=?, email = ? WHERE id = ?");
$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $_POST["id"]);

$stmt->execute();

echo "Updated";


 ?>