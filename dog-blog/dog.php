<?php $page = 'Dog'; require('header.php') ?>
<?php require('navbar.php') ?>

 <a href="dogs.php">Go Back to Dogs</a>

<?php

// get the dog from the query parameter on the page
require('db.php');
$dog = getDogById($_GET['id']);

 ?>



 <blockquote>
   <h3><?php echo $dog['name'] ?></h3>
   <h4><?php echo $dog['breed'] ?></h4>
   <h4>Owner: <?php echo $dog['owner_id'] ?></h4>
   <img width="200" src="<?php echo $dog['image'] ?>" alt="">
 </blockquote>

<?php require('footer.php') ?>
