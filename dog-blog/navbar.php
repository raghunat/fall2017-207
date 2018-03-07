<nav>
  <ul>

    <?php if ($page == 'Dog Blog') { ?>
      <li class="active"><a href="index.php">Home</a></li>
    <?php } else { ?>
      <li class=""><a href="index.php">Home</a></li>
    <?php } ?>

    <?php if ($page == 'News') { ?>
      <li class="active"><a href="news.php">News</a></li>
    <?php } else {  ?>
      <li><a class="" href="news.php">News</a></li>
    <?php }  ?>

    <?php if ($page == 'Dogs') { ?>
      <li class="active"><a href="dogs.php">Dogs</a></li>
    <?php } else {  ?>
      <li><a class="" href="dogs.php">Dogs</a></li>
    <?php }  ?>

    <?php if (isset($_SESSION['loggedIn'])) { ?>
      <li class="right"><a href="logout.php">Logout</a></li>
    <?php } else { ?>
      <li class="right"><a href="login.php">Login</a></li>
    <?php } ?>
  </ul>
</nav>
