<?php //view-post.php
// make sure the user is logged in
session_start();
if (!isset($_SESSION['userId'])) {
  header('Location: login.php');
}

// get the post by id
require 'db.php';
$post = getPostById($_GET['id']);

require 'header.php';
require 'navbar.php';

if (!$post) {
  die('Could not find that post');
}

$dog = getDogById($post['dog_id']);
 ?>

 <section id="post-banner"
    style="background-image: url(<?php echo $post['banner_pic'] ?>);">
   <h2><?php echo $post['title'] ?></h2>
 </section>

 <img id="post-dog-image" src="<?php echo $dog['image'] ?>" alt="">

 <section id="post-content">
   <h3><?php echo $post['author_id'] ?></h3>
   <div>
      <?php echo $post['content'] ?>
   </div>
 </section>


 <?php require 'footer.php'; ?>
