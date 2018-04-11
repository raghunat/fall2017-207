<?php //create-post.php
session_start();
require('db.php');

if (!isset($_SESSION['userId'])) {
  header('Location: login.php');
}

if (isset($_POST['title'])) {
  createPost([
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'dog_id' => $_POST['dog_id'],
    'banner_pic' => $_POST['banner_pic'],
    'author_id' => $_SESSION['userId']
  ]);

  header('Location: posts.php');
}

// This page shows a form,
// or saves a post

// Must get the author_id from $_SESSION

$page = 'Post';
require('header.php');
require('navbar.php');
?>

<form class="" method="post">
  <label for="title">Title: </label>
  <input type="text" name="title">
  <br>
  <label for="banner_pic">Banner URL: </label>
  <input type="text" name="banner_pic">
  <br>
  <label for="dog_id">Dog ID: </label>
  <input type="number" name="dog_id">
  <br>
  <label for="content">Content: </label>
  <textarea name="content"></textarea>
  <br>
  <button>Submit</button>
</form>

<?php require('footer.php') ?>
