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

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// prepare and bind
$stmt = $connection->prepare("INSERT INTO Test (name, email) VALUES (?, ?)");
$stmt->bind_param("ss",$name, $email);

$name = $_POST["name"];
$email = $_POST["email"];
// set parameters and execute
$stmt->execute();

echo "done";

 ?>