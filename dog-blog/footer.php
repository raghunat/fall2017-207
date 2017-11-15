<!-- If the user is logged in, show the new-post button -->

<?php if (isset($_SESSION['userID'])) { ?>

  <a id="new-post" href="new-post.php"> + </a>

<?php } ?>

<footer onclick="winMillionDollars()">Woof.com &copy; 2017</footer>

<script>

  function winMillionDollars() {
    var message = "You have won a million doll hairs";

    alert(message);
  }

  function changeTitleColor() {
    document.querySelector('#main-header h1').style.color = 'red';
    document.querySelector('#main-header h1').innerHTML = 'CAT BLOG MWAHAHAHA';
  }


</script>



</body>
</html>
