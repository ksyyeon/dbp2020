<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    
    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $filtered_state = mysqli_real_escape_string($link, $_GET['state']);

    $to_date ='';
    if($filtered_state=='in'){
        $to_date .= "WHERE to_date = '9999-01-01'";
    }else{
        $to_date .= '';
    }

    $query = "
        SELECT concat(first_name, ' ', last_name) as emp_name, dept_name, from_date, to_date
        FROM dept_manager dm
        INNER JOIN employees e on e.emp_no = dm.emp_no
        INNER JOIN departments d on d.dept_no = dm.dept_no ".$to_date
        ;

    $result = mysqli_query($link, $query);
    
    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row["emp_name"];
        $article .= '</td><td>';
        $article .= $row["dept_name"];
        $article .= '</td><td>';
        $article .= $row["from_date"];
        $article .= '</td><td>';
        $article .= $row["to_date"];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>연봉 정보</title>
    <style>
        body {
            margin: 0 auto;
            width: 1000px;
        }
        table {
            width: 1000px;
            text-align: center;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
</style>
</head>
<body>
        <h2> <a href="index.php">직원 관리 시스템</a> | 매니저 정보 조회</h2>
        <table>
        <tr>
            <th>emp_name</th>
            <th>dept_name</th>
            <th>from_date</th>
            <th>to_date</th>
        </tr>
        <tr>
            <?= $article ?>
        </tr>
            
        </table>
</body>
</html>