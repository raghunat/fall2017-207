<?php
function ReadArrayFromFile($FileName) {
  $masterArray = [];
  $file = fopen($FileName, "r");
  if ($file) {
    while (($line = fgets($file)) !== false) {
      $lineArray = explode(" ", $line);
      $masterArray[] = $lineArray;
    }
    fclose($file);
  } else {
    echo "Could not open $FileName";
  }

  //ALL DONE!
  return $masterArray;
}

function ReadSingleItemFromFile($FileName, $Query) {
  $file = fopen($FileName, "r");
  if ($file) {
    while (($line = fgets($file)) !== false) {
      //Here we have each individual item in a loop as $line
      //Check for if this row is the one we are looking for
      if (strpos($line, $Query) !== false) {
        $array = explode(" ", $line);
        return $array;
      }
    }
    //While loop is over, nothing was returned/found
    return "ItemNotFound";
  } else {
    return "ErrorReadingFile";
  }
}

 ?>
