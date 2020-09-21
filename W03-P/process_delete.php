<?php
  $link = mysqli_connect("localhost", "root","20172026", "dbp" );
  settype($_POST['id'], 'ins');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id'])
  );

  $query = "
    DELETE from color
      WHERE id = '{$filtered['id']}'
  ";

  $result = mysqli_multi_query($link, $query);
  if($result == false){
    echo '삭제하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
    echo 'DELETE SUCCESS! <a href = "index.php"> HOME </a>';
  }

 ?>
