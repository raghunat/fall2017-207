<?php

//EMBEDS A PHP FILE INTO THIS ONE
include('readArrayFromFile.php');

//var_dump(ReadArrayFromFile("data2.txt"));
$people = ReadArrayFromFile("data2.txt");
 ?>
<style>
  .left {
    float:left;
  }
</style>
<?php
foreach($people as $person){
  //Do stuff with $person
  echo "
  <article>
    <ul class='left'>
      <li>$person[0] $person[1]</li>
      <li><a href='mailto:$person[2]'>Email Me</a></li>
    </ul>
    <blockquote class='left'>
      Some Comment they wrote
    </blockquote>
  </article>";
}

 ?>
