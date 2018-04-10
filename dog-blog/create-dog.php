<?php
// create-dog.php

// If it is an update, there will be id query parameter
// If it is an update, get the information for that dog
// If it is an update, prefill the form with the dog info
// If it is an update, The POST request should use updateDogById
// else, create a dog

// Defaults
$formType = 'CREATE';
$name = '';
$breed = '';
$color = '';
$image = '';
$ownerId = '';

// Toggle Update Mode
if (isset($_GET['id'])) {
  $formType = 'UPDATE';
}


if (isset($_POST['name'])) {
  // This is a POST request, and therefore create the dog
  require('db.php');
  if ($formType == 'CREATE') {
    createDogFromPost($_POST);
  } else {
    updateDogById(
      $_GET['id'],
      $_POST['name'],
      $_POST['breed'],
      $_POST['color'],
      $_POST['owner_id'],
      $_POST['image']
    );
  }

  header('Location: dogs.php');
}


// If an update, get the dog information
if ($formType == 'UPDATE') {
  require('db.php');
  $dog = getDogById($_GET['id']);
  $name = $dog['name'];
  $breed = $dog['breed'];
  $color = $dog['color'];
  $ownerId = $dog['owner_id'];
  $image = $dog['image'];
}
 ?>

 <form method="post">
   <label for="name">Dog Name:</label>
   <input type="text" name="name" id="name" value="<?php echo $name ?>">
   <br>
   <label for="breed">Dog Breed:</label>
   <input type="text" name="breed" id="breed" value="<?php echo $breed ?>">
   <br>
   <label for="color">Dog Color:</label>
   <input type="text" name="color" id="color" value="<?php echo $color ?>">
   <br>
   <label for="image">Dog Image URL:</label>
   <input type="text" name="image" id="image" value="<?php echo $image ?>">
   <br>
   <label for="owner_id">Dog Owners ID:</label>
   <input type="number" name="owner_id" id="owner_id" value="<?php echo $ownerId ?>">
   <br>
   <button><?php echo $formType ?></button>
 </form>
