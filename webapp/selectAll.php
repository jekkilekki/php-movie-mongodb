<?php

// movieDB 데이터베이스 연결
$conn = mysqli_connect("localhost", "movie_user", "1234", "movieDB")
    or die("movieDB 데이터베이스 접속 실패!");

$sql = "SELECT * FROM MOVIE";
$result = mysqli_query($conn, $sql);

if ($result) {
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>alert('해당 정보가 없습니다.');location.replace('main.php');</script>";
    }
} else {
    $err = mysqli_error($conn);
    echo "<script>alert('SQL문 정보조회 오류\n오류내용: $err');</script>";
}

$taglist = '<li data-role="list-divider">영화 목록'.'<span style="float: right">'.$count.'건'.'</span></li>';

while ($row = mysqli_fetch_array($result)) {
    $taglist .= '<li><a href="select.php?id='.$row['id'].'">';
    $taglist .= '<img src="'.$row['poster'].'" style="width: 80px; height: 100px;">';
    $taglist .= '<h2>'.$row['title'].'</h2>';
    $taglist .= '<p>'.$row['genre'].'</p>';
    $taglist .= '<p>'.$row['date'].'</p>';
    $taglist .= '<p class="ui-li-aside">'.$row['price'].'원</p>';
    $taglist .= '</a></li>';
}

mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <title>영화 관리</title>
</head>
<body>
    <!-- 전체 영화조회 화면 -->
    <div data-role="page" id="page4">
        <div data-role="header" data-position="fixed" data-theme="b">
            <a href="#" data-icon="back" data-rel="back">&larr; 뒤로 (Back)</a>
            <h1>영화 정보 전체 조회</h1>
            <a href="main.php" data-icon="home" data-iconpos="notext" class="ui-btn-right">영화 목록 (Home)</a>
            <div data-role="navbar">
                <ul>
                    <li><a href="insert.php">입력</a></li>
                    <li><a href="update_select.php">수정</a></li>
                    <li><a href="delete_select.php">삭제</a></li>
                    <li><a href="selectAll.php" class="ui-btn-active">전체 검색</a></li>
                </ul>
            </div>
        </div>

        <div data-role="content">
            <ul data-role="listview" data-inset="true">
                <?php echo $taglist; ?>
            </ul>
        </div>

        <div data-role="footer" data-position="fixed" data-theme="b">
            <h4>&copy; 2024 Movie Web App</h4>
        </div>
    </div>
</body>
</html>