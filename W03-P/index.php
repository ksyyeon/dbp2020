<?php
  $link = mysqli_connect('localhost', 'root', '20172026', 'dbp');
  $query = "SELECT * FROM color";
  $result = mysqli_query($link, $query);
  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href =\"index.php?id={$row['id']}\">{$row['name']}</a></li>";
  }

  $article = array (
    'code' => 'FFFFFF',
    'name' => 'White'
  );
  $update_link = '';
  $delete_link = '';

  if( isset($_GET['id']) ){
    $query = "SELECT * FROM color WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
        'code' => $row['code'],
        'name' => $row['name']
    );
    $update_link = '<a href="update.php?id='.$_GET['id'].'"> edit </a>';
    $delete_link = '
      <form action="process_delete.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
    ';
  }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <title> Color Palette </title>
 </head>
 <body bgcolor = <?= $article['code'] ?>>
   <h1> <a href = "index.php"> Color Palette </a> </h1>
   <h3> click the name and take a look at color you like! </h3>
   <ol> <?= $list ?> </ol>
  <a href="create.php"> add </a>
  <?= $update_link ?>
  <?= $delete_link ?>
  <h2> Name: <?=$article['name'] ?> </h2>
  <h2> HEX: <?=$article['code'] ?> </h2>
</body>
</html>
