<?php //posts.php
$page = 'Posts';
require('header.php');
require('navbar.php');
require('db.php');

$posts = getAllPosts();
?>

<a href="create-post.php">+ CREATE NEW</a>

<table border="1" width="100%">
  <caption>All Posts</caption>
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Author</th>
      <th>Dog</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($posts as $post) { ?>
      <tr>
        <td><?php echo $post['id'] ?></td>
        <td><?php echo $post['title'] ?></td>
        <td><?php echo $post['author_id'] ?></td>
        <td><?php echo $post['dog_id'] ?></td>
        <td>
          <a href="view-post.php?id=<?php echo $post['id'] ?>">VIEW</a>
          <a href="create-post.php?update=<?php echo $post['id'] ?>">UPDATE</a>
          <a href="delete-post.php?id=<?php echo $post['id'] ?>">DELETE</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>


<?php require('footer.php') ?>
