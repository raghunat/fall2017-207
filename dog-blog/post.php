<?php
require 'session.php';

if (isset($_SESSION['userID']) == false) {
  header('Location: login.php');
}
 ?>

<?php require "header.php" ?>

<?php require "navbar.php" ?>

<?php
$connection = new mysqli(
  "dogblog.caokxintrssz.us-east-1.rds.amazonaws.com",
  "fredonia",
  "Fall2017!!!",
  "dogblog"
);

if ($connection->connect_error) {
  die("Connect error:" . $connection->connect_error);
}

$post = $connection->query("
  SELECT
    posts.title,
    posts.image,
    posts.content,
    users.username as author_name,
    dogs.img as dog_image,
    dogs.name as dog_name
  FROM posts
  JOIN dogs on dogs.id = posts.dog_id
  JOIN users on users.id = posts.author_id
  WHERE posts.id = $_GET[id]
")->fetch_assoc();
?>

<article>
    <h2><?php echo $post['title'] ?></h2>
    <img src="<?php echo $post['image'] ?>" alt="">
    <p><?php echo $post['content'] ?></p>
    <center>
      Written by <?php echo $post['author_name'] ?>
      <br>
      for
      <br>
      <img src="<?php echo $post['dog_image'] ?>" alt="">
      <br>
      <?php echo $post['dog_name'] ?>
    </center>
</article>

<?php require "footer.php" ?>
