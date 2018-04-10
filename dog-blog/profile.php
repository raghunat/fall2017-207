<?php
$page='Profile';
require('header.php');
require('navbar.php');

require('db.php');
$userId = $_SESSION['userId'];
$user = getUserById($userId); // get user id from session and get user record by id
$dogs = getDogsByOwnerId($userId); // get dogs from db by owner_id
?>

<h1>Welcome <?php echo $user['email'] ?></h1>
<a href="signup.php?action=update">Update My Info</a>
<a href="delete-me.php">Delete My Account</a>
<table>
  <caption>My Dogs</caption>
  <tr>
    <th>Name</th>
    <th>Image</th>
  </tr>
  <?php foreach ($dogs as $dog) { ?>
    <tr>
      <td><?php echo $dog['name'] ?></td>
      <td><img src="<?php echo $dog['image'] ?>"></td>
    </tr>
  <?php } ?>
</table>


<?php require('footer.php') ?>
