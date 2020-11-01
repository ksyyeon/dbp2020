<?php
    $link = mysqli_connect("localhost", "admin", "admin", "steamgames");
    
    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);

    $price = "";
    $title = "";
    switch($filtered_id){
        case 1:
            $price .= "0 < price && price <= 10";
            $title .= "0 ~ 10";
        break;
        case 2:
            $price .= "10 <= price && price <= 20";
            $title .= "10 ~ 20";
        break;
        case 3:
            $price .= "20 <= price && price <= 50";
            $title .= "20 ~ 50";
        break;
        case 4:
            $price .= "50 <= price && price <= 100";
            $title .= "50 ~ 100";
        break;
        case 5:
            $price .= "100 <= price";
            $title .= "100 ~";
        break;
    }

    $query = "select appid, name, price from steam where ".$price." order by positive_ratings desc limit 15";
    $result = mysqli_query($link, $query);
   
    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= '<a href="detail.php?id='.$row["appid"].'">';
        $article .= $row["name"];
        $article .= '</a>';
        $article .= '</td><td>$';
        $article .= $row["price"];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
    body {
        margin: 0 auto;
        width: 600px;
        padding-top: 20px;
        background-color: #163850
    }

    table {
        width: 600px;
        text-align: center;
    }

    th {
        padding: 10px;
        color: #66C0F4;
    }
    td {
        padding: 10px;
        color: white;
    }

    a:link {text-decoration: none; color: white;}
    a:visited {text-decoration: none; color: white;}
    a:active {text-decoration: none; color: white;}
    a:hover {text-decoration: none; color: #A0D8F8;}
    </style>
</head>

<body>
    <p><a href="index.php">Home</a></p>
    <table>
        <tr>
            <th>title</th>
            <th>price</th>
        </tr>
        <tr>
            <?= $article ?>
        </tr>

    </table>
</body>

</html>