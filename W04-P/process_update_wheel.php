<?php
  $link = mysqli_connect("localhost", "root","20172026", "dbp" );
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'code' => mysqli_real_escape_string($link, $_POST['code']),
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'type' => mysqli_real_escape_string($link, $_POST['type']),
    'temperature' => mysqli_real_escape_string($link, $_POST['temperature'])
  );

  $query = "
    UPDATE wheel
      SET
        code2 = '{$filtered['code']}',
        name2 = '{$filtered['name']}',
        type = '{$filtered['type']}',
        temperature = '{$filtered['temperature']}'
      WHERE
        id = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
      header('Location: wheel.php');
  }

 ?>
