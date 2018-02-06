<?php
// TODO: THIS CODE NEEDS ERROR HANDLING FOR PBE
if (isset($_POST['submit'])) {
  require "utilities.php";

  $conn = getConnection();

  $stmt = $conn->prepare("
    INSERT INTO dogs (name, breed, color, toy, img, owner_id) VALUES (?,?,?,?,?,?)
  ");

  $stmt->bind_param(
    "sssssi",
    $_POST['name'],
    $_POST['breed'],
    $_POST['color'],
    $_POST['toy'],
    $_POST['img'],
    $_POST['owner_id']
  );

  $stmt->execute();

  header('Location: dogs.php');
}

require 'header.php'; ?>

<?php require 'navbar.php'?>


<form action="new-dog.php" method="post">
  <label for="name">Name:</label>
  <input type="text" name="name" value="">
  <br>
  <label for="color">Color:</label>
  <input type="text" name="color" value="">
  <br>
  <label for="breed">Breed:</label>
  <input type="text" name="breed" value="">
  <br>
  <label for="owner_id">Owner Id:</label>
  <input type="text" name="owner_id" value="">
  <br>
  <label for="toy">Toy:</label>
  <input type="text" name="toy" value="">
  <br>
  <label for="img">Image:</label>
  <input type="text" name="img" value="">
  <br>
  <button name="submit">CREATE</button>
</form>

<a href="dogs.php"><< Back to List</a>



<?php require 'footer.php'?>
