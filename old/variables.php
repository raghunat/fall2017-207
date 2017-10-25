<!DOCTYPE html>
<html>
  <head>
    <title>Basic Template For PHP Class</title>
  </head>
  <body>
      <?php

      //Variables hold references to values
      $airtonSSN = 1111111112;
      echo 1 + $airtonSSN;
      echo "<br>";

      //Use variables when the value is dynamic or "unfriendly"

      //$4BadVar = BADDDDD
      //$_thihifcd don't use unless you know how
      //$specialç = 1234; try not to useas

      $first = "First sentance goes here";
      $second = "Second sentance goes here";
      $third = "Third statement goes here";

      $master = "This is the master string (Double Quotes) $first";
      $fakeMaster = 'This is the master string $first';

      //add 2 strings using concatenation
      echo $first . $second;
      echo "<br>";

      //Use variables within a string using interpolation
      echo $master;
      echo "<br>";
      echo $fakeMaster;

       ?>
  </body>
</html>
