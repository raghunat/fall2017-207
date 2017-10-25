<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} else {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Page</title>
</head>
<body>
  <h1>Welcome Administrator</h1>
  <ul>
    <li>Product 1 <a href="edit?id=1">edit</a> <a href="delete?id=1">x</a></li>
    <li>Product 2 <a href="edit?id=2">edit</a> <a href="delete?id=2">x</a></li>
    <li>Product 3 <a href="edit?id=3">edit</a> <a href="delete?id=3">x</a></li>
  </ul>
  <ul>
    <li><a href="new">Add New Product</a></li>
  </ul>
</body>
</html>