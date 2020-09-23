<?php
  $link = mysqli_connect('localhost', 'root', '20172026', 'dbp');
  $query = "SELECT * FROM wheel";
  $result = mysqli_query($link, $query);
  $wheel_info ='';

  while($row = mysqli_fetch_array($result)){
    $filtered = array(
      'id' => htmlspecialchars($row['id']),
      'code' => htmlspecialchars($row['code2']),
      'name' => htmlspecialchars($row['name2']),
      'type' => htmlspecialchars($row['type']),
      'temperature' => htmlspecialchars($row['temperature'])
    );
    $wheel_info .= '<tr>';
    $wheel_info .= '<td>'.$filtered['id'].'</td>';
    $wheel_info .= '<td>#'.$filtered['code'].'</td>';
    $wheel_info .= '<td bgcolor="'.$filtered['code'].'" style="color:white">'.$filtered['name'].'</td>';
    $wheel_info .= '<td>'.$filtered['type'].'</td>';
    $wheel_info .= '<td>'.$filtered['temperature'].'</td>';
    $wheel_info .= '<td><a href="wheel.php?id='.$filtered['id'].'">edit</a></td>';
    $wheel_info .= '
      <td>
        <form action = "process_delete_wheel.php" method="post">
          <input type="hidden" name="id" value="'.$filtered['id'].'">
          <input type="submit" value="delete">
        </form>
      </td>
      ';
    $wheel_info .= '</tr>';
  }

  $escaped = array(
    'code' => '',
    'name' => '',
    'type' => '',
    'temperature' => ''
  );

  $form_action = 'process_create_wheel.php';
  $label_submit = 'add';
  $form_id = '';

  if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link,$_GET['id']);
    settype($filtered_id, 'integer');
    $query = "SELECT * FROM wheel WHERE id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $escaped['code'] = htmlspecialchars($row['code2']);
    $escaped['name'] = htmlspecialchars($row['name2']);
    $escaped['type'] = htmlspecialchars($row['type']);
    $escaped['temperature'] = htmlspecialchars($row['temperature']);

    $form_action = 'process_update_wheel.php';
    $label_submit = 'edit';
    $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
  }



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Color Wheel</title>
  <style>
    body{
      margin: 0 auto;
      width: 500px;
    }
    table{
      border-collapse: collapse;
      text-align: center;
    }
    th,td{
      border: 1px solid black;
      padding: 10px;
    }
  </style>
</head>
<body>
  <h1> <a href = "wheel.php">Color Wheel</a> </h1>
  <p> <a href="index.php">Color Palette</a></p>
  <table border="1">
    <tr>
      <th>id</th>
      <th>code</th>
      <th>name</th>
      <th>type</th>
      <th>temperature</th>
      <th>edit</th>
      <th>delete</th>
    </tr>
    <?=$wheel_info?>
  </table>
  <br>
  <form action="<?= $form_action ?>" method="post">
    <?= $form_id ?>
    <label for="code">HEX:</label><br>
    <input type="text" id="code" name="code" placeholder="ex) FF0000"
    value="<?=$escaped['code']?>"><br>
    <label for="name">name:</label><br>
    <input type="text" id="name" name="name" placeholder="ex) Red"
    value="<?=$escaped['name']?>"><br>
    <label for="type">type:</label><br>
    <input type="text" id="type" name="type" placeholder="ex) Primary"
    value="<?=$escaped['type']?>"><br>
    <label for="temperature">temperature:</label><br>
    <input type="text" id="temperature" name="temperature" placeholder="ex) Warm"
    value="<?=$escaped['temperature']?>"><br><br>
    <input type="submit" value="<?= $label_submit ?>">
</body>
</html>
