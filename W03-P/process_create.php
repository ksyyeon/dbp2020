<?php
  $link = mysqli_connect("localhost", "root","20172026", "dbp" );
  $filtered = array(
    'code' => mysqli_real_escape_string($link, $_POST['code']),
    'name' => mysqli_real_escape_string($link, $_POST['name'])
  );

  $query = "
    INSERT INTO color
      (code, name)
      VALUES (
        '{$filtered['code']}',
        '{$filtered['name']}'
        )";

  $result = mysqli_multi_query($link, $query);
  if($result == false){
    echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
    echo 'SUCCESS! <a href = "index.php"> HOME </a>';
  }

 ?>
