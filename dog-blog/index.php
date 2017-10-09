<?php require "header.php" ?>
<?php

$connection = new mysqli(
  "dogblog.caokxintrssz.us-east-1.rds.amazonaws.com",
  "fredonia",
  "Fall2017!!!",
  "dogblog"
);

if ($connection->connect_error) {
  die("Connection error: " . $connection->connect_error);
}

$result = $connection->query("SELECT * FROM posts");

$posts = [];

while ($row = $result->fetch_assoc()) {
  $posts[] = $row;
}

$result = $connection->query("SELECT * FROM dogs");

$dogs = [];

while ($row = $result->fetch_assoc()) {
  $dogs[] = $row;
}

?>

<?php $page = 'index' ?>

<?php require "navbar.php" ?>

<section>

    <?php foreach ($posts as $post) { ?>
        <article>
            <h2><a href="post.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h2>
            <p><?php echo $post['content'] ?></p>
        </article>
    <?php } ?>

</section>


<aside>

    <?php foreach ($dogs as $dog) { ?>
        <div>
            <h3><?php echo $dog['name'] ?></h3>
            <img src="<?php echo $dog['img'] ?>">
            <p><?php echo $dog['toy'] ?></p>
        </div>
    <?php } ?>

</aside>

<?php require "footer.php" ?>
