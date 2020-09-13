<?php
  $link = mysqli_connect("localhost", "root","20172026", "dbp" );

  $query = "
    INSERT INTO color(
      code, name
      ) VALUE (
        '{$_POST['code']}',
        '{$_POST['name']}'
        )
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
    echo 'SUCCESS! <a href = "index.php"> HOME </a>';
  }

 ?>
