<!DOCTYPE>
<html>

<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
    <style>
        body{
            margin: 0 auto;
            width: 1000px;
        }
    </style>
</head>

<body>
    <h1> 직원 관리 시스템 </h1>
    <a href="emp_select.php">(1) 직원 정보 조회</a><br>
    <a href="emp_insert.php">(2) 신규 직원 등록 </a> <br>
    <form action="emp_update.php" method="POST">
        (3) 직원 정보 수정:
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Search">
    </form>
    <form action="emp_delete.php" method="POST">
    (4) 직원 정보 삭제:
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Delete">
    </form>
    <form action ="salary_info.php" method="GET">
        (5) 연봉 정보:
        <input type="text" name="number" placeholder="number">
        <input type="submit" value="Search">
    </form>
    <form action ="manager_info.php" method="GET">
        (5) 매니저 정보 조회:
        <select name="state">
            <option value="all" selected>전체</option>
            <option value="in">근무 중</option>
        </select>
        <input type="submit" value="Search">
    </form>
</body>

</html>