<?php
// new-post.php

$tags = [];

// get tags
require "utilities.php";
$conn = getConnection();

$result = $conn->query("SELECT * FROM tags");

while ($row = $result->fetch_assoc()) {
  $tags[] = $row;
}

?>
<h2>New Post</h2>
<a href="index.php">Back Home</a>

<ul>
  <?php foreach($tags as $tag) { ?>
    <li>
      <input type="checkbox">
      <span><?php echo $tag['label'] ?></span>
    </li>
  <?php } ?>
</ul>
