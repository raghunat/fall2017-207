<?php

// get the dog id from the url
// make a connection
// delete the dog using BPE
// return to dogs.php

// TODO: ADD ERROR HANDLING FOR P.B.E.

$id = $_GET['id'];

require "utilities.php";

$connection = getConnection();

$stmt = $connection->prepare("DELETE FROM dogs WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: dogs.php");
