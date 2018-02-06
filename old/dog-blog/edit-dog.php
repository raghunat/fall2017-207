<?php
// Present a prefilled form to edit
// On post, update the dog

$id = $_GET["id"];

// TODO: HANDLE ERRORS WITH PBE

require "utilities.php";

$conn = getConnection();

// IF POST, update and redirect to dogs.php
if (isset($_POST['submit'])) {
  $stmt = $conn->prepare("
    UPDATE dogs SET
      name=?,
      breed=?,
      owner_id=?,
      color=?,
      toy=?
    WHERE id = ?
  ");

  $stmt->bind_param(
    "ssissi",
    $_POST['name'],
    $_POST['breed'],
    $_POST['owner_id'],
    $_POST['color'],
    $_POST['toy'],
    $id
  );

  $stmt->execute();

  header("Location: dogs.php");
}
// ELSE show prefilled



$stmt = $conn->prepare("SELECT
  name,
  breed,
  owner_id,
  color,
  id,
  toy
  FROM dogs WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

// SINCE SELECT, BIND RESULT.
$stmt->bind_result(
  $name,
  $breed,
  $owner_id,
  $color,
  $id,
  $toy
);

// Populate the variables (only once needed here,
// because we are only looking at one dog)
$stmt->fetch();


require "header.php";
require "navbar.php";
 ?>


<form action="edit-dog.php?id=<?php echo $id ?>" method="post">
  <label for="name">Name:</label>
  <input type="text" name="name" value="<?php echo $name ?>">
  <br>
  <label for="color">Color:</label>
  <input type="text" name="color" value="<?php echo $color ?>">
  <br>
  <label for="breed">Breed:</label>
  <input type="text" name="breed" value="<?php echo $breed ?>">
  <br>
  <label for="owner_id">Owner Id:</label>
  <input type="text" name="owner_id" value="<?php echo $owner_id ?>">
  <br>
  <label for="toy">Toy:</label>
  <input type="text" name="toy" value="<?php echo $toy ?>">
  <br>
  <label for="img">Image:</label>
  <input type="text" name="img" value="<?php echo $image ?>">
  <br>
  <button name="submit">UPDATE</button>
</form>



<?php require "footer.php" ?>
