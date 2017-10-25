<?php
// Check that they field all the information
if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
  (empty($_POST['username']) ||
  empty($_POST['password']) ||
  empty($_POST['confirmPassword']) ||
  empty($_POST['firstName']) ||
  empty($_POST['lastName']) ||
  empty($_POST['image']))
) {
  die("You need to fill in all the fields");
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
  $_POST['password'] != $_POST['confirmPassword']) {
  die("Your passwords don't match");
} else if($_SERVER['REQUEST_METHOD'] === 'POST') {
  // it passes all validations, so save the user and redirect to login

  $connection = new mysqli(
    "dogblog.caokxintrssz.us-east-1.rds.amazonaws.com",
    "fredonia",
    "Fall2017!!!",
    "dogblog"
  );

  if ($connection->connect_error) {
    die("Connect error:" . $connection->connect_error);
  }

  $_POST['password'] = md5($_POST['password']);

  $post = $connection->query("
    INSERT INTO users (
      username,
      password,
      first_name,
      last_name,
      image
    ) VALUES (
        '$_POST[username]',
        '$_POST[password]',
        '$_POST[firstName]',
        '$_POST[lastName]',
        '$_POST[image]'
    )
  ");

  if ($connection->error) {
    die("Error occured: " . $connection->error);
  }

  header("Location: login.php");
}



 ?>
<?php require "header.php" ?>
<?php require "navbar.php" ?>

<h2>Register Your Account</h2>
<hr>
<form method="post">
  <label for="username">Username:</label>
  <input type="text" name="username" id="username">
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  <br>
  <label for="confirmPassword">Confirm Password:</label>
  <input type="password" name="confirmPassword" id="confirmPassword">
  <br>
  <label for="firstName">First Name:</label>
  <input type="text" name="firstName" id="firstName">
  <br>
  <label for="lastName">Last Name:</label>
  <input type="text" name="lastName" id="lastName">
  <br>
  <label for="image">Avatar Image:</label>
  <input type="text" name="image" id="image">
  <br>
  <button>Register</button>
</form>

<?php require "footer.php" ?>
