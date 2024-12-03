<?php

// movieDB 데이터베이스 연결
$conn = mysqli_connect("localhost", "movie_user", "1234", "movieDB")
    or die("movieDB 데이터베이스 접속 실패!");

$title = $_POST['smovieTitle2'];

$sql = "SELECT * FROM MOVIE WHERE title='$title'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>alert('검색된 영화 정보가 없습니다.');location.replace('main.php');</script>";
    }
} else {
    $err = mysqli_error($conn);
    echo "<script>alert('SQL문 정보조회 오류\n오류내용: $err');</script>";
}

$row = mysqli_fetch_array($result);
$id = $row['id'];
$title = $row['title'];
$genre = $row['genre'];
$date = $row['date'];
$price = $row['price'];
$poster = $row['poster'];

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
    <!-- 영화 정보 갱신 화면 -->
    <div data-role="page" id="page2">
        <div data-role="header" data-position="fixed" data-theme="b">
            <a href="#" data-icon="back" data-rel="back">&larr; 뒤로 (Back)</a>
            <h1>영화 정보 수정</h1>
            <a href="main.php" data-icon="home" data-iconpos="notext" class="ui-btn-right">영화 목록 (Home)</a>
            <div data-role="navbar">
                <ul>
                    <li><a href="insert.php">입력</a></li>
                    <li><a href="update_select.php" class="ui-btn-active">수정</a></li>
                    <li><a href="delete_select.php">삭제</a></li>
                    <li><a href="selectAll.php">전체 검색</a></li>
                </ul>
            </div>
        </div>

        <div data-role="content">
            <h3>영화 내용 수정</h3>
            <form name="form2" method="POST" enctype="multipart/form-data" action="update_result.php" data-ajax="false">
                <div class="ui-body ui-body-a">
                    <label>영화명: </label>
                    <input type="text" name="title" id="title" value="<?php echo $title; ?>" data-mini="true" data-inline="true">
                    <label>장르: </label>
                    <select name="genre" data-native-menu="false" data-mini="true" data-inline="true" id="genre">
                        <option value="<?php echo $genre; ?>"><?php echo $genre; ?></option>
                        <option value="액션">액션</option>
                        <option value="코미디">코미디</option>
                        <option value="로맨스">로맨스</option>
                        <option value="스릴러">스릴러</option>
                        <option value="SF">SF</option>
                        <option value="판타지">판타지</option>
                        <option value="공포">공포</option>
                        <option value="드라마">드라마</option>
                        <option value="다큐멘터리">다큐멘터리</option>
                        <option value="애니메이션">애니메이션</option>
                        <option value="기타">기타</option>
                    </select>
                    <label>상영날짜 (yyyy-mm-dd): </label>
                    <input type="date" name="date" id="date" value="<?php echo $date; ?>" data-mini="true" data-inline="true">
                    <label>관람료: </label>
                    <input type="text" name="price" id="price" value="<?php echo $price; ?>" data-mini="true" data-inline="true">
                    <label>포스터: </label>
                    <input type="file" name="poster" id="poster" data-mini="true" data-inline="true">
                </div>
                <div class="ui-body">
                    <fieldset class="ui-grid-a">
                        <div class="ui-block-a">
                            <input type="submit" value="수정" data-mini="true">
                        </div>
                        <div class="ui-block-b">
                            <input type="reset" value="취소" data-mini="true">
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>

        <div data-role="footer" data-position="fixed" data-theme="b">
            <h4>&copy; 2024 Movie Web App</h4>
        </div>
    </div>
</body>
</html>