<!DOCTYPE>
<html>

<head>
    <meta charset="utf-8">
    <title> Steam Store Games </title>
    <style>
    body {
        margin: 0 auto;
        width: 600px;
        padding-top: 20px;
        background-color: #171A21
    }

    table {
        margin-top: 5px;
        border-collapse: collapse;
        width: 600px;
    }

    td {
        padding: 7px;
        text-align: left;
    }
    a:link {text-decoration: none; color: #66C0F4;}
    a:visited {text-decoration: none; color: #66C0F4;}
    a:active {text-decoration: none; color: #66C0F4;}
    a:hover {text-decoration: none; color: white;}
    </style>
</head>

<body>
    <form action="search_process.php" method="POST">
        <input type="text" name="name" placeholder="Name" style="width:300px">
        <input type="submit" value="Search">
    </form>
    <img src="https://store.cloudflare.steamstatic.com/public/shared/images/header/globalheader_logo.png?t=962016">
    <table>
        <tr>
            <td style="color:white"> Browse by Categories </td>
            <td style="color:white"> Browse by Genres </td>
            <td style="color:white"> Browse by Price ($) </td>
        </tr>
        <tr>
            <td><a href="browse_category.php?id=1">Top Sellers</a></td>
            <td><a href="browse_genre.php?id=1">Free to Play</a></td>
            <td><a href="browse_price.php?id=1">0 ~ 5</a></td>
        </tr>
        <tr>
            <td><a href="browse_category.php?id=2">New Releases</a></td>
            <td><a href="browse_genre.php?id=2">Early Access</a></td>
            <td><a href="browse_price.php?id=2">10 ~ 20</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=3">Action</a></td>
            <td><a href="browse_price.php?id=3">20 ~ 50</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=4">Adventure</a></td>
            <td><a href="browse_price.php?id=4">50 ~ 100</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=5">Casual</a></td>
            <td><a href="browse_price.php?id=5">100 ~</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=6">Indie</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=7">Massively Multiplayer</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=8">Racing</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=9">RPG</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=10">Simulation</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=11">Sports</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="browse_genre.php?id=12">Strategy</a></td>
        </tr>

    </table>


</body>

</html>
