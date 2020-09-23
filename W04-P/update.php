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

  if( isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "select * from palette where id={$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
        'code' => $row['code'],
        'name' => $row['name'],
        'wheel_id' => $row['wheel_id']
    );
  }

  $query = "select * from wheel";
  $result = mysqli_query($link, $query);
  $select_form = '<select name="wheel_id">';
  while($row = mysqli_fetch_array($result)){
    $selected = '';
    if($article['wheel_id']===$row['id']){
      $selected = ' selected';
    }
    $select_form .= '<option value="'.$row['id'].'"'.$selected.'>'.$row['name2'].'</option>';
  }
  $select_form .= '</select>';
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
      padding: 20px;
      width: 200px;
      background-color: #<?=$article['code']?>;
    }
   </style>
 </head>
 <body>
   <h1> <a href = "index.php"> Color Palette </a> </h1>
   <h3> click the name and take a look at color you like! </h3>
   <ol> <?= $list ?> </ol>
   <div>
     <form action="process_update.php" method ="post">
       <input type="hidden" name="id" value="<?= $filtered_id ?>">
       <p> HEX: <input type="text" name ="code" placeholder="code"
         value="<?= $article['code'] ?>"></p>
       <p> Name: <input type="text" name ="name" placeholder="name"
         value="<?= $article['name'] ?>"></p>
         <p> Wheel Color: <?= $select_form ?> </p>
       <p><input type="submit"></p>
   </div>
</body>
</html>
