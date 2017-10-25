<?php
try {
  if ($_POST["firstName"] == "ReservedFirstName") {
    throw new Exception("Cannot Use First Name = ReservedFirstName");
  }
  $file = fopen("data2.txt", "a");
  fwrite($file, "\n$_POST[firstName] $_POST[lastName] $_POST[email]");
  //echo "done";  
  //throw new Exception("hey");
} catch (Exception $e) {
  header("Location: error.php");
  exit;
} 

header('Location: testReadFunction.php');  

 ?>
