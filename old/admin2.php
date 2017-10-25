<?php
if (!isset($_COOKIE['loggedIn'])) {
  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
  } else if($_SERVER['PHP_AUTH_USER'] == "user1" &&
    $_SERVER['PHP_AUTH_PW'] == "pass1") {
    //make the cookie
    setcookie("loggedIn", "user1/pass1", time() + 60);
  } else {
    header('HTTP/1.0 401 Unauthorized');
    echo "Invalid Credentials";
    exit;
  }
} else {
  if (isset($_COOKIE['loggedIn']) && $_COOKIE['loggedIn'] == "user1/pass1") {
   //YAY DO NOTHING ITS ME
   echo "here";
  } else {
    header('HTTP/1.0 401 Unauthorized');
    echo "Invalid Credentials";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Page</title>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
  <h1>Welcome Administrator</h1>
  <ul id="products">
    <li>Product 1 <a href="edit?id=1">edit</a> <a href="delete?id=1">x</a></li>
    <li>Product 2 <a href="edit?id=2">edit</a> <a href="delete?id=2">x</a></li>
    <li>Product 3 <a href="edit?id=3">edit</a> <a href="delete?id=3">x</a></li>
  </ul>
  <br>
  <button onclick="update()">Update</button>
  <ul>
    <li><a href="new">Add New Product</a></li>
  </ul>
  <script>
  function update () {
    $.ajax({
      url: '/update.php',
      type: 'POST',
      data: {
        name: $("#name").val(),
        email: $("#email").val(),
        id: $("#id").val()
      }
    })
    .success(function(data) {
      $("#products").append("<li>" + data + "</li>");
      console.log("success");
    })
    .fail(function(data) {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }
  







  </script>
</body>
</html>