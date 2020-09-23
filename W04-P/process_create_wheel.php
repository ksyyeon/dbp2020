<?php
  $link = mysqli_connect("localhost", "root","20172026", "dbp" );
  $filtered = array(
    'code' => mysqli_real_escape_string($link, $_POST['code']),
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'type' => mysqli_real_escape_string($link, $_POST['type']),
    'temperature' => mysqli_real_escape_string($link, $_POST['temperature'])
  );

  $query = "
    INSERT INTO wheel
      (code2, name2, type, temperature)
      VALUES (
        '{$filtered['code']}',
        '{$filtered['name']}',
        '{$filtered['type']}',
        '{$filtered['temperature']}'
        )
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
      header('Location: wheel.php');
  }

 ?>
