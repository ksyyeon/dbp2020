<?php
  $link = mysqli_connect('localhost', 'root', '20172026', 'dbp');
  $query = "SELECT * FROM palette";
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
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "select * from palette left join wheel on palette.wheel_id = wheel.id where palette.id={$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article['code'] = htmlspecialchars($row['code']);
    $article['name'] = htmlspecialchars($row['name']);
    $article['wheel color'] = htmlspecialchars($row['name2']);

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
   <style>
    body{
      margin: 0 auto;
      width: 500px;
    }
    div{
      border: 0px solid black;
      margin-top: 10px;
      padding: 30px;
      width: 200px;
      background-color: #<?=$article['code']?>;
    }
   </style>
 </head>
 <body>
   <h1> <a href = "index.php"> Color Palette </a> </h1>
   <a href="wheel.php"> Color Wheel </a>
   <h3> click the name and take a look at color you like! </h3>
   <ol> <?= $list ?> </ol>
  <a href="create.php"> add </a>
  <?= $update_link ?>
  <?= $delete_link ?>
  <div>
    <h4> Name: <?=$article['name'] ?> </h4>
    <h4> HEX: #<?=$article['code'] ?> </h4>
    <h4> Wheel Color: <?=$article['wheel color'] ?> </h4>
  </div>
</body>
</html>
