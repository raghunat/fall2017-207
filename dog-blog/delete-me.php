<?php // delete-me.php
session_start();

if (isset($_POST['yes'])) {
  require('db.php');
  deleteUserById($_SESSION['userId']);
  header('Location: logout.php');
}

require('header.php');
require('navbar.php');
 ?>

 <h1>Are you sure?</h1>
 <a href="profile.php">No Go Back</a>
 <br>
 <br>
 <br>
 <form method="post">
   <button name='yes'>Yes Delete my Account</button>
 </form>
