<?php $page = 'Dogs'; require('header.php') ?>
<?php require('navbar.php') ?>

<?php
// An array is a list of things
// made in 2 ways:
// $letters = array('a', 'b', 'c');
// var_dump($letters);
//or
// $letters = ['a', 'b', 'c'];
// var_dump($letters[1]);

// Make a dogs array
$dogs = [];

// To append to an array (aka add to the end)
// $dogs[] = 1;
// $dogs[] = 0;
// $dogs[10] = 'Spot';

// add an associative array (aka a thing that doesnt have a class)
$dogs[] = [
  'name' => 'Spot',
  'breed' => 'Beagle',
  'img' => 'http://www.dogbreedslist.info/uploads/allimg/dog-pictures/Beagle-3.jpg'
];

$dogs[] = [
  'name' => 'Brooke',
  'breed' => 'Chi-Weiner',
  'img' => 'https://static1.squarespace.com/static/5a00fe44a9db0980376fc95a/5a02a6bf8165f56e6f2aa6b2/5a02a6c10d92976e481cc3c5/1510123204650/Dachshund-Chihuahua-mix-Melissa-Laggis-2.jpg'
];

$dogs[] = [
  'name' => 'Tino',
  'breed' => 'Yorkie-Poo',
  'img' => 'https://www.101dogbreeds.com/wp-content/uploads/2015/05/Yorkiepoo.jpg'
];

// var_dump($dogs);
 ?>


<?php foreach ($dogs as $dog) { ?>

  <blockquote class="dog">
    <h3><?php echo $dog['name'] ?></h3>
    <h4><?php echo $dog['breed'] ?></h4>
    <img width="200" src="<?php echo $dog['img'] ?>" alt="">
  </blockquote>

<?php } ?>




<?php require('footer.php') ?>
