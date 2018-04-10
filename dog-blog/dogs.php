<?php $page = 'Dogs'; require('header.php') ?>
<?php require('navbar.php') ?>

<?php

require('db.php');
$dogs = getAllDogsFromDB();

 ?>

<a href="create-dog.php">NEW DOG</a>

<?php foreach ($dogs as $dog) { ?>

  <blockquote class="dog">
    <h3><?php echo $dog['name'] ?></h3>
    <h4><?php echo $dog['breed'] ?></h4>
    <img width="200" src="<?php echo $dog['image'] ?>" alt="">
    <a href="dog.php?id=<?php echo $dog['id'] ?>">View Details</a>
    <a href="delete-dog.php?id=<?php echo $dog['id'] ?>">Delete Dog</a>
    <a href="create-dog.php?id=<?php echo $dog['id'] ?>">Update Dog</a>
  </blockquote>

<?php } ?>




<?php require('footer.php') ?>
