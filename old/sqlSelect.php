  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>SQL Tutorial</title>
    <style>
    .scroll {
      height: 200px;
      overflow: auto;
    }
    </style>
  </head>
  <body>
    <?php 
    // Connect to DB/Table
    $servername = "141.238.136.24";
    $username = "class14";
    $password = "test";
    $db = "raghunath";
    //create a connection
    $connection = new mysqli($servername,
                                   $username,
                                   $password,
                                   $db);
    function QueryDB($Sql, $connection) {
      //check the connection
      if ($connection->connect_error) {
        die("Conenction Failed: " . $connection->connect_error);
      } 
      echo $Sql;
      $result = $connection->query($Sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo var_dump($row) + "<br>";
        }
      } else {
        echo "No Results";
      }
    }
    // $sql = "SELECT * FROM Test";
    // $result = $connection->query($sql);

    // if ($result->num_rows > 0) {
    //   while ($row = $result->fetch_assoc()) {
    //     echo "
    //     id: $row[id] <br>
    //     name: $row[name] <br>
    //     email: $row[email] <br>
    //     <hr>
    //     ";
    //   }
    // } else {
    //   echo "No Results";
    // }
    ?>

    <h1>SQL Syntax</h1>
    <hr>

    <h2>SELECT</h2>
    <h3>SELECT <i>column_name</i>, <i>column_name</i> FROM <i>table_name</i>;</h3>
    <pre>
      Selects data from a Database->Table
      Ex: <b>SELECT * FROM Products</b>
          <b>SELECT price FROM Products</b>
          <b>SELECT id, price FROM Products</b>
    </pre>
    <pre class="scroll">Return in php:
      <?php 
        QueryDB("SELECT * FROM Test", $connection);
      ?>
    </pre>

    <hr>

    <h2>DISTINCT</h2>
    <h3>SELECT DISTINCT <i>column_name</i>, <i>column_name</i> FROM <i>table_name</i></h3>
    <pre>
      Selects unique data from a Database->Table
      EX: <b>SELECT DISTINCT price FROM Products</b>
    </pre>
    <pre class="scroll">
      <?php 
      QueryDB("SELECT DISTINCT id FROM Test", $connection);
       ?>
    </pre>

    <hr>

    <h2>WHERE</h2>
    <h3>SELECT <i>column_name</i>, <i>column_name</i> FROM <i>table_name</i> WHERE <i>column_name</i> <i>operator</i> <i>value</i></h3>
    <pre>
      Selects data from the database->table where columns match the condition supplied.
      EX: <b>SELECT * FROM Products WHERE Price > 10</b>
    </pre>
    <pre class="scroll">
      <?php 
      QueryDB("SELECT * FROM Test WHERE id > 7", $connection);
       ?>
    </pre>

    <hr>

    <h2>AND/OR</h2>
    <h3>SELECT <i>column_name</i>, <i>column_name</i> FROM <i>table_name</i> WHERE <i>column_name</i> <i>operator</i> <i>value</i> AND/OR <i>table_name</i> <i>operator</i> <i>value</i></h3>
    <pre>
      Selects data from the database->table matching multiple conditions
    </pre>
    <pre class="scroll">
      <?php 
      QueryDB("SELECT * FROM Test WHERE id > 7 AND id < 10", $connection);
       ?>
    </pre>




















    <?php
      $connection->close();
     ?>
  </body>
  </html>