<hr>
<?php
// checkbox.php

// If they submit the form, see what they sent
if (isset($_POST['submit'])) {
  echo "<pre>" . print_r($_POST) . "</pre>";

  foreach ($_POST as $key => $value) {
    if ($key != 'submit') {
      echo "They sent $key as $value <br>";
    }
  }
}

 ?>
<hr>
 <form action="checkbox.php" method="post">
   <label for="check1">Check1</label>
   <input type="checkbox" name="check1" value="1">
   <br>
   <label for="check2">Check2</label>
   <input type="checkbox" name="check2" value="2">
   <br>
   <label for="check3">Check3</label>
   <input type="checkbox" name="check3" value="3">
   <br>
   <button name="submit">SEND POST</button>
 </form>
