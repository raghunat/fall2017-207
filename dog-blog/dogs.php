<?php require 'header.php'?>

<?php $page = 'dogs' ?>

<?php
// List all dogs
require "utilities.php";
$connection = getConnection();

$result = $connection->query("SELECT * FROM dogs");

$dogs = [];

while ($row = $result->fetch_assoc()) {
  $dogs[] = $row;
}
 ?>

<?php require 'navbar.php'?>

<a href="new-dog.php">CREATE NEW DOG</a>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>PIC</th>
      <th>OWNER ID</th>
      <th>BREED</th>
      <th>TOY</th>
      <th>COLOR</th>
      <th>ACTIONS</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($dogs as $dog) { ?>
      <tr>
        <td><?php echo $dog["id"] ?></td>
        <td><?php echo $dog["name"] ?></td>
        <td><img width="50" src="<?php echo $dog["img"] ?>" alt=""></td>
        <td><?php echo $dog["owner_id"] ?></td>
        <td><?php echo $dog["breed"] ?></td>
        <td><?php echo $dog["toy"] ?></td>
        <td><?php echo $dog["color"] ?></td>
        <td>
          <a href="edit-dog.php?id=<?php echo $dog['id'] ?>">EDIT</a>
          <a href="delete-dog.php?id=<?php echo $dog['id'] ?>">DELETE</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>












<?php require 'footer.php'?>
