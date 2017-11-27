<?php

// TODO
// Go to the database, and get the latest post
// Send it back in a way that javascript can understand

require "utilities.php";

$connection = getConnection();

$result = $connection->query("SELECT * FROM posts ORDER BY id DESC LIMIT 1");

// Return the first row in Javascript Object Notation
echo json_encode($result->fetch_assoc());
