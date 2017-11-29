<?php require 'header.php'?>

<?php $page = 'breeds' ?>

<?php

require "utilities.php";

$conn = getConnection();

$result = $conn->query("SELECT * FROM users");

$users = [];

while ($row = $result->fetch_assoc()) {
  $users[] = $row;
}
 ?>

<?php require 'navbar.php'?>

<div id="all-users">
  <?php foreach ($users as $user) { ?>
    <div class="user">
      <img src="<?php echo $user['image'] ?>" alt="">
      <h2><?php echo $user['first_name'] . " " . $user['last_name'] ?></h2>
      <h3>Password: <?php echo $user['password'] ?></h3>
    </div>
  <?php } ?>
</div>





<?php require 'footer.php'?>
