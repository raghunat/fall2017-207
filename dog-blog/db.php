<?php // db.ph

function deletePostById($id) {
  runSafeQuery(
    "DELETE FROM posts WHERE id = ?",
    ['i', $id]
  );
}

function updatePost($params) {
  runSafeQuery(
    "UPDATE posts SET
      title=?,
      content=?,
      author_id=?,
      dog_id=?,
      banner_pic=?
    WHERE id=?
    ",
    [
      'ssiisi',
      $params['title'],
      $params['content'],
      $params['dog_id'],
      $params['banner_pic'],
      $params['author_id'],
      $params['id']
    ]
  );
}


function createPost($params) {
  runSafeQuery(
    "INSERT INTO posts (title, content, author_id, dog_id, banner_pic) VALUES (?,?,?,?,?)",
    [
      "ssiis",
      $params['title'],
      $params['content'],
      $params['author_id'],
      $params['dog_id'],
      $params['banner_pic']
    ]
  );
}

function getAllPosts() {
  $rawResult = runSafeQuery(
    "SELECT * FROM posts",
    []
  );

  $result = getAllResults($rawResult);

  return $result;
}

function deleteUserById($id) {
  runSafeQuery(
    "DELETE FROM users WHERE id = ?",
    ['i', $id]
  );
}

function getPostById($id) {
  $rawResult = runSafeQuery(
    "SELECT * FROM posts WHERE id = ?",
    ['i', $id]
  );

  $result = getAllResults($rawResult);

  $post = reset($result);

  return $post;
}

function getUserById($id) {
  $rawResult = runSafeQuery(
    "SELECT * FROM users WHERE id = ?",
    ['i', $id]
  );

  $result = getAllResults($rawResult);

  $user = reset($result);

  return $user;
}

function getDogsByOwnerId($id) {
  $rawResult = runSafeQuery(
    "SELECT * FROM dogs WHERE owner_id = ?",
    ['i', $id]
  );

  $result = getAllResults($rawResult);

  return $result;
}


function checkUserLogin($email, $password) {
  $hashedPassword = md5($password);
  $rawResult = runSafeQuery(
    "SELECT * FROM users WHERE email = ?",
    ["s", $email]
  );
  $result = getAllResults($rawResult);
  $user = reset($result);

  if (!$user) {
    die('User could not be found');
  } else if($user['password'] != $hashedPassword) {
    die("Passwords don't match");
  } else {
    return $user;
  }
}

function saveUser($email, $password) {
  $hashedPassword = md5($password);
  runSafeQuery(
    "INSERT INTO users (email, password) VALUES (?, ?)",
    ["ss", $email, $hashedPassword]
  );
}

function getDogById($id) {
  $rawResult = runSafeQuery(
    "SELECT * FROM dogs WHERE id = ?",
    ["i", $id]
  );

  $results = getAllResults($rawResult);

  // reset pulls out the first item
  return reset($results);
}

function deleteDogById($dogId) {
  runSafeQuery(
    "DELETE FROM dogs WHERE id = ?",
    ["i", $dogId]
  );
}

function updateDogById($dogId, $name, $breed, $color, $ownerId, $img) {
  runSafeQuery(
    "
      UPDATE dogs
      SET name=?, breed=?, color=?, owner_id=?, image=?
      WHERE id=?
    ",
    [
      "sssisi",
      $name, $breed, $color, $ownerId, $img, $dogId
    ]
  );
}

function createDogFromPost($post) {
  runSafeQuery(
    "
    INSERT INTO dogs (name, breed, color, owner_id, image)
    VALUES (?, ?, ?, ?, ?)
    ",
    [
      "sssis",
      $post['name'],
      $post['breed'],
      $post['color'],
      $post['owner_id'],
      $post['image']
    ]
  );
}

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

function runSafeQuery($query, $params) {
  $connection = getConnection();

  // PREPARE
  $statement = $connection->prepare($query);
  // check if prepare failed

  if ($statement == false) {
    die('Prepare failed: ' . $connection->error);
  }

  // BIND PARAMETERS
  // ex SELECT * FROM dogs WHERE id = ? AND name = ?
  // $statement->bind_param('is', 1, 'spot');
  // s = string, i = int, b = blob/binary
  if (count($params) > 0) {
    $statement->bind_param(...$params);
  }

  if ($statement->error) {
    die('Bind failed: ' . $statement->error);
  }

  $success = $statement->execute();

  if ($success == false) {
    die('Execute failed: ' . $statement->error);
  }

  $result = $statement->get_result();
  $connection->close();
  return $result;
}
