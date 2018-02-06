<!-- If the user is logged in, show the new-post button -->

<?php if (isset($_SESSION['userID'])) { ?>

  <a id="new-post" href="new-post.php"> + </a>

<?php } ?>

<footer onclick="winMillionDollars()">Woof.com &copy; 2017</footer>

<div id="notification">
  <h5>Message</h5>
  <p>Title</p>
  <a href="#">Check it out &gt;&gt;</a>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>

  function winMillionDollars() {
    var message = "You have won a million doll hairs";

    alert(message);
  }

  function changeTitleColor() {
    document.querySelector('#main-header h1').style.color = 'red';
    document.querySelector('#main-header h1').innerHTML = 'CAT BLOG MWAHAHAHA';
  }


  // We need to know when a new post happens
  // get the latest post, and save a reference for it (latest post === last id value)
  // Ask the website server, if there is a new post every 3 seconds
    // "new post" === A post with a higher id value than the one we save a ref to
  // If there is a new post, alert the user, and update the saved ref to the new post
  // IF there isn't a new post, do nothing.

  var latestPostId = undefined;

  function getLatestPost() {
    // make a GET call to the server
    // get the latest post id
    // compare it
    // alert if new
    // nothing if not
    $.getJSON('latest-post.php') //$ is the jquery library
      .done(function(post) {
        if (latestPostId == undefined) {
          latestPostId = post.id;
        } else if(latestPostId < post.id) {
          // populate the notification div with details
          $('#notification p').html(post.title);
          $('#notification a').attr('href', 'post.php?id=' + post.id);
          // show the notification
          $('#notification').fadeIn();
          // hide it after 5 seconds
          setTimeout(function() {
            $('#notification').fadeOut();
          }, 5000);
          latestPostId = post.id;
        } else {
          // Do nothing.
        }
      })
      .fail(function(err) {
        console.error(err);
      });
  }

  // Start asking the server for updates every 3000 milliseconds
  setInterval(getLatestPost, 3000);





</script>



</body>
</html>
