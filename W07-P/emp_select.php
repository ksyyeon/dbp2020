<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    $query = "select * from employees order by emp_no desc limit 10";
    $result = mysqli_query($link, $query);
    $emp_info = '';
    while($row = mysqli_fetch_array($result)) {
        $emp_info .= '<tr>';
        $emp_info .= '<td>'.$row['emp_no'].'</td>';
        $emp_info .= '<td>'.$row['birth_date'].'</td>';
        $emp_info .= '<td>'.$row['first_name'].'</td>';
        $emp_info .= '<td>'.$row['last_name'].'</td>';
        $emp_info .= '<td>'.$row['gender'].'</td>';
        $emp_info .= '<td>'.$row['hire_date'].'</td>';
        $emp_info .= '<td><a href="emp_update.php?emp_no='.$row['emp_no'].'">update</a></td>';
        $emp_info .= '
            <td>
                <form action = "emp_delete_process.php" method="POST">
                    <input type="hidden" name="emp_no" value="'.$row['emp_no'].'">
                    <input type="submit" value="delete">
                </form>
            </td>';
        $emp_info .= '</tr>';
    }
   
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
    <style>
        body{
            margin: 0 auto;
            width: 1000px;
        }
        table{
            width: 1000px;
            border-collapse: collapse;
            text-align: center;
        }
        th,td{
            padding: 7px;
        }
    </style>
</head>

<body>
    <h2><a href="index.php"> 직원 관리 시스템</a> | 직원 정보 조회</h2>
    <table border="1">
        <tr>
            <th>emp_no</th>
            <th>birth_date</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>gender</th>
            <th>hire_date</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?=$emp_info?>
    </table>
</body>

</html>