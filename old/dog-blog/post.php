<?php
require 'session.php';

if (isset($_SESSION['userID']) == false) {
  header('Location: login.php');
}
 ?>

<?php require "header.php" ?>

<?php require "navbar.php" ?>

<?php
require "utilities.php";

$connection = getConnection();

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

// get the tags associated to this post
$tags = [];

$stmt = $connection->prepare("
  SELECT label FROM tags
  JOIN tags_posts on tags.id = tags_posts.tag_id
  WHERE tags_posts.post_id = ?
");

$stmt->bind_param("i", $_GET['id']);

$stmt->execute();

$stmt->bind_result($label);

while ($stmt->fetch()) {
  $tags[] = $label;
}








?>

<article>
    <h2><?php echo $post['title'] ?></h2>
    <img src="<?php echo $post['image'] ?>" alt="">
    <p><?php echo $post['content'] ?></p>
    <ul>
      <?php foreach($tags as $tag) { ?>
      <li><?php echo $tag ?></li>
      <?php } ?>
    </ul>
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
