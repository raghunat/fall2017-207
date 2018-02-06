<?php
require 'session.php';

if (isset($page) === false) {
    $page = '';
}

if (isset($_SESSION['userID'])) {
  $sessionPage = 'logout.php';
  $sessionPageLink = 'Log Out';
} else {
  $sessionPage = 'login.php';
  $sessionPageLink = 'Login';
}


?>

<nav id="main-nav">
    <ul>
        <li><a class="<?php echo ($page === 'index' ? 'active-link' : '') ?>" href="index.php">Home</a></li>
        <li><a class="<?php echo ($page === 'breeds' ? 'active-link' : '') ?>" href="breeds.php">Breeds</a></li>
        <li><a class="<?php echo ($page === 'news' ? 'active-link' : '') ?>" href="news.php">News</a></li>
        <li><a class="<?php echo ($page === 'dogs' ? 'active-link' : '') ?>" href="dogs.php">Dogs</a></li>
        <li><a href="<?php echo $sessionPage ?>"><?php echo $sessionPageLink ?></a></li>
    </ul>
</nav>
