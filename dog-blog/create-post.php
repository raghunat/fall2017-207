<?php //create-post.php
session_start();
if (!isset($_SESSION['userId'])) {
  header('Location: login.php');
}

require('db.php');

$action = 'create';

$post = [
  'title' => '',
  'content' => '',
  'dog_id' => '',
  'banner_pic' => ''
];

if (isset($_GET['update'])) {
  $action = 'update';

  $post = getPostById($_GET['update']);
}

if (isset($_POST['title'])) {
  // create-post.php?update=7
  if ($action == 'update') {
    updatePost([
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      'dog_id' => $_POST['dog_id'],
      'banner_pic' => $_POST['banner_pic'],
      'author_id' => $_SESSION['userId'],
      'id' => $_GET['update']
    ]);
  } else {
    createPost([
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      'dog_id' => $_POST['dog_id'],
      'banner_pic' => $_POST['banner_pic'],
      'author_id' => $_SESSION['userId']
    ]);
  }

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
  <input type="text" name="title" value="<?php echo $post['title'] ?>">
  <br>
  <label for="banner_pic">Banner URL: </label>
  <input type="text" name="banner_pic" value="<?php echo $post['banner_pic'] ?>">
  <br>
  <label for="dog_id">Dog ID: </label>
  <input type="number" name="dog_id" value="<?php echo $post['dog_id'] ?>">
  <br>
  <label for="content">Content: </label>
  <textarea name="content"><?php echo $post['content'] ?></textarea>
  <br>
  <button>Submit</button>
</form>

<?php require('footer.php') ?>
