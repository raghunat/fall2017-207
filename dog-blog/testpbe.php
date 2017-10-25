<?php // testpbe.php

require "utilities.php";

$conn = getConnection();

// Prepare
if (
  !$stmt = $conn->prepare(
    "INSERT INTO pbeandjelly (name, status, bread) VALUES (?,?,?)"
  )
) {
  die("Prepare failed: " . $conn->error);
}

// Bind
$name = "Abe";
$status = "Active";
$bread = "Whole Wheat";

if (
  !$stmt->bind_param("sss", $name, $status, $bread)
) {
  die("Bind failed: " . $stmt->error);
}


// Execute
if (
  !$stmt->execute()
) {
  die("Execute failed: " . $stmt->error);
}

/// WORKS FOR ALL CASES, EXCEPT SELECT STATEMENTS
/// which need an extra step

//TODO check for error like above
$stmt = $conn->prepare("SELECT * FROM pbeandjelly ORDER BY id DESC");


// No parameters to bind, because the query has no ?s

// TODO check for error like above
$stmt->execute();

// TODO check for error like above
$stmt->bind_result($id, $name, $status, $bread);

while ($stmt->fetch()) {
  echo "$id $name $status $bread<br>";
}


// TODO try a delete statement
// TODO try an update statement
