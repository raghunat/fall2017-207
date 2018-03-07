<?php // db.php

function getAllDogsFromDB() {
  // fill the array from the DB
  // make a connection
  $connection = getConnection();
  // run a query
  $rawResult = $connection->query("SELECT * FROM dogs");
  // get the results
  $dogs = getAllResults($rawResult);
  // close the connection
  $connection->close();
  // return the results
  return $dogs;
}

function getConnection() {
  $connection = new mysqli(
    'localhost',
    'root',
    'root',
    'dogblog2018spring'
  );

  if ($connection->connect_error) {
    die('Connection error: ' . $connection->connect_error);
  }

  // no error? return the connection
  return $connection;
}

function getAllResults($rawResult) {
  $rows = [];

  // the result->fetch_assoc() call, returns either a row associative array
  // or FALSE when there are no more rows to fetch
  while ($row = $rawResult->fetch_assoc()) {
    $rows[] = $row;
  }

  return $rows;
}
