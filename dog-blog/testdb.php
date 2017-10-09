<?php
// testdb.php

// 1. Open a connection to MYSQL
// 2. Run some queries
// 3. Close the Connection

$connection = new mysqli(
  "dogblog.caokxintrssz.us-east-1.rds.amazonaws.com",
  "fredonia",
  "Fall2017!!!",
  "dogblog"
);

if ($connection->connect_error) {
  die("Could not connect: " . $connection->connect_error);
}

$result = $connection->query("SELECT * FROM new_table");

// for each row in the table, make a paragraph tag
while($row = $result->fetch_assoc()) {
  echo "<p>$row[something]</p>";
}


$connection->close();



 ?>
