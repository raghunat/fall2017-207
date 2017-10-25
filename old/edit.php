<?php 
$id = $_GET["id"];

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
} 
$sql = "SELECT * FROM Test WHERE id=$id";
$result = $connection->query($sql);




 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Create Form</title>
  </head>
  <body>
    <?php 
    $resultId = "";
    $resultName = "";
    $resultEmail = "";
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $resultId = $row["id"];
        $resultName = $row["name"];
        $resultEmail = $row["email"];
      }
    } else {
      echo "No Results";
    }
     ?>
    <form action="update.php" method="POST">
      <label for="name">Name:</label>
      <input id="name" type="text" name="name" value="<?php echo $resultName; ?>">
      <br>
      <label for="email">Email:</label>
      <input id="email" type="text" name="email" value="<?php echo $resultEmail; ?>">
      <br>
      <input id="id" type="text" name="id" value="<?php echo $resultId; ?>" style="display:none;">
      <input type="submit" value="Update My Record">
    </form>
  </body>
</html>