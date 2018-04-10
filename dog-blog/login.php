<?php
session_start();
if (isset($_POST['email'])) {

  require('db.php');

  $user = checkUserLogin($_POST['email'], $_POST['password']);

  if ($user) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['userId'] = $user['id'];
    header('Location: index.php');
  } else {
    echo "INVALID CREDS";
  }
}

$page = 'Login';
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
