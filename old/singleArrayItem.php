<!DOCTYPE html>
<html lang="en">
<head>
  <title>Single Item</title>
</head>
<body>
  <?php 
  include("readArrayFromFile.php");
  ///check to see if the user provided a parameter
  if (isset($_GET["firstName"])) {
    //run the function
    $array = ReadSingleItemFromFile("data2.txt", $_GET["firstName"]);

    //check to see if the item was found
    if ($array == "ItemNotFound") {
      include("retrySearch.php");
    } elseif($array == "ErrorReadingFile") {
      include("errorContact.php");
    } else {
      include("singleItemTable.php");
    }
  } else {
    include("retrySearch.php");
  }

   ?>
</body>
</html>