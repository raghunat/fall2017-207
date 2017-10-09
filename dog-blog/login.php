<?php
require 'session.php';
// If coming from the form POST:
if (isset($_POST['username'])) {
    if ($_POST['username'] == 'bob' && $_POST['password'] == 'builder') {
        $_SESSION['userID'] = 12345;
        header("Location: index.php");
    }
}
?>

<?php require "header.php" ?>

<?php require "navbar.php" ?>

<form method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <br>
    <button>Log In</button>
</form>






<?php require "footer.php" ?>
