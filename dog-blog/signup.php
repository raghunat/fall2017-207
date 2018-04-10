<?php
if (isset($_POST['email'])) {
  if ($_POST['password'] != $_POST['confirm']) {
    header('signup.php');
  }

  // Save the user
  require('db.php');
  saveUser($_POST['email'], $_POST['password']);
  // Redirect if it is successful
  header('Location: login.php');
}


 ?>
<form method="post">
  <label for="email">Email:</label>
  <input type="text" name="email" >
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" >
  <br>
  <label for="confirm">Confirm Password:</label>
  <input type="password" name="confirm" >
  <br>
  <button>Sign Up</button>
</form>
