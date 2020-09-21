<?php
  $link = mysqli_connect("localhost", "root","20172026", "dbp" );
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'code' => mysqli_real_escape_string($link, $_POST['code']),
    'name' => mysqli_real_escape_string($link, $_POST['name'])
  );

  $query = "
    UPDATE color
      SET
        code = '{$filtered['code']}',
        name = '{$filtered['name']}'
      WHERE
        id = '{$filtered['id']}'
  ";

  $result = mysqli_multi_query($link, $query);
  if($result == false){
    echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
    echo 'SUCCESS! <a href = "index.php"> HOME </a>';
  }

 ?>
