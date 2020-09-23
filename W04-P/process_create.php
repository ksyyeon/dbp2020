<?php
  $link = mysqli_connect("localhost", "root","20172026", "dbp" );
  $filtered = array(
    'code' => mysqli_real_escape_string($link, $_POST['code']),
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'wheel_id' => mysqli_real_escape_string($link, $_POST['wheel_id'])
  );

  $query = "
    INSERT INTO palette
      (code, name, wheel_id)
      VALUES (
        '{$filtered['code']}',
        '{$filtered['name']}',
        '{$filtered['wheel_id']}'
        )";

  $result = mysqli_query($link, $query);

  if($result == false){
    echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
      header('Location:index.php?id='.mysqli_insert_id($link));
  }

 ?>
