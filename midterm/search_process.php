<?php 
    $link = mysqli_connect("localhost", "admin", "admin", "steamgames");
    $filtered_name =  mysqli_real_escape_string($link, $_POST['name']);

    $query='
        SELECT appid
        FROM steam
        WHERE name="'.$filtered_name.'"';
    ;

    $result = mysqli_query($link, $query);
    
    if($result == false){
        echo '검색 결과가 없습니다.';
        error_log(mysqli_error($link));
    } else {
        $appid = '';
        while($row = mysqli_fetch_array($result)){
            $appid .= $row[appid];
        }
        header('Location: detail.php?id='.$appid);
    }
    
?>