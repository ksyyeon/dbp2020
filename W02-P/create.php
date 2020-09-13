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

  if( isset($_GET['id']) ){
    $query = "SELECT * FROM color WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
        'code' => $row['code'],
        'name' => $row['name']
    );
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
   <form action="process_create.php" method ="post">
     <p> code <input type="text" name ="code" placeholder="ex) FFFFFF"></p>
     <p> name <input type="text" name ="name" placeholder="ex) White"></p>
     <p><input type="submit"></p>
</body>
</html>
