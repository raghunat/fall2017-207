<!-- If the user is logged in, show the new-post button -->

<?php if (isset($_SESSION['userID'])) { ?>

  <a id="new-post" href="new-post.php"> + </a>

<?php } ?>

<footer>Woof.com &copy; 2017</footer>


</body>
</html>
