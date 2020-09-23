<?php
  $link = mysqli_connect("localhost", "root","20172026", "dbp" );
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'code' => mysqli_real_escape_string($link, $_POST['code']),
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'wheel_id' => mysqli_real_escape_string($link, $_POST['wheel_id'])
  );

  $query = "
    UPDATE palette
      SET
        code = '{$filtered['code']}',
        name = '{$filtered['name']}',
        wheel_id = '{$filtered['wheel_id']}'
      WHERE
        id = '{$filtered['id']}'
  ";

  $result = mysqli_multi_query($link, $query);
  if($result == false){
    echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
    header('Location:index.php?id='.$filtered['id']);
  }

 ?>
