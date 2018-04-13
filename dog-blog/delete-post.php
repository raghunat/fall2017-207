<?php

// get the id from the url
$id = $_GET['id'];

// make sure the user logged in
session_start();
if (!isset($_SESSION['userId'])) {
  header('Location: login.php');
}

// run the deletePostById function
require('db.php');
deletePostById($id);

// redirect to the list of posts
header('Location: posts.php');
