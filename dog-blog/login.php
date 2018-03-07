<?php
session_start();
if (isset($_POST['email'])) {
  if ($_POST['email'] == 'something' && $_POST['password'] == 'secret') {
    $_SESSION['loggedIn'] = true;
    header('Location: index.php');
  } else {
    echo "INVALID CREDS";
  }
}

$page = 'Dogs';
require('header.php');

 ?>
<?php require('navbar.php') ?>

<form  action="login.php" method="post">
  <input type="text" name="email" placeholder="Email">
  <br>
  <input type="password" name="password" placeholder="Password">
  <br>
  <input type="submit" name="login" value="Login">
</form>


<?php require('footer.php') ?>
