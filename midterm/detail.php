<?php
    $link = mysqli_connect("localhost", "admin", "admin", "steamgames");
    
    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);

    $query ="
        SELECT name, release_date,
        REPLACE(developer, ';', ', ') developer, publisher, platforms,
        REPLACE(categories, ';', ', ') categories, 
        REPLACE(genres, ';', ', ') genres, price, detailed, header_image
        FROM steam_description st
        INNER JOIN steam s on s.appid = st.steam_appid
        INNER JOIN steam_media sm on sm.steam_appid = st.steam_appid
        WHERE st.steam_appid=".$filtered_id;

    $result = mysqli_query($link, $query);

    $name= '';
    $article = '';
    while($row = mysqli_fetch_array($result)){
        $name .= $row['name'];
        $article .= '<h1>'.$row["name"].'</h1>';
        $article .= '<img src="'.$row["header_image"].'"><br>';
        $article .= '<p>Release Date: '.$row["release_date"].'<br>
                    Developer: '.$row["developer"].'<br>
                    Publisher: '.$row["publisher"].'<br>
                    Categories: '.$row["categories"].'<br>
                    Genres: '.$row["genres"].'<br>
                    Price: $'.$row["price"].'</p>';
                    
        $article .= '<p>'.$row["detailed"].'</p>';
    }
    mysqli_free_result($result);
    mysqli_close($link);
    
?>

<head>
    <meta charset="utf-8">
    <title><?= $name ?></title>
    <style>
    body {
        margin: 0 auto;
        width: 600px;
        padding-top: 20px;
        background-color: #163850
    }

    h1{
        color: #A0D8F8;
    }

    p{
        color: white;
    }
    a:link {text-decoration: none; color: white;}
    a:visited {text-decoration: none; color: white;}
    a:active {text-decoration: none; color: white;}
    a:hover {text-decoration: none; color: #A0D8F8;}
    </style>
</head>

<body>
    <p><a href="index.php">Home</a> | <a href="javascript:history.go(-1)">Back</a> </p>
    <?= $article ?>
</body>

</html>