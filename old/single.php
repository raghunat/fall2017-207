<?php 
$servername = "141.238.137.235";
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
  //echo "Connected Successfully";
}

$sql = "SELECT * FROM Test WHERE id='$_GET[item]' ";
$result = $connection->query($sql);

$item = null;

if ($result->num_rows > 0) {
  $item = $result->fetch_assoc();
} 
?>

<h1>Last Name: <?php echo $item == null ? "Not Found" : $item["name"] ?></h1>
<h2>id <?php echo $item == null ? "Not Found" : $item["id"] ?></h2>
<h3>Email: <?php echo $item == null ? "Not Found" : $item["email"] ?></h3>

<h1>Id: </h1>
<h2>Name: </h2>
<h3>Price: </h3>
<h4>Description: </h4>
<h5>Tags: </h5>