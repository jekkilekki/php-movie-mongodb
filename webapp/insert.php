<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <title>Movie Web App</title>
</head>
<body>
    <!-- 영화 정보 추가 화면 -->
    <div data-role="page" id="page1">
        <div data-role="header" data-position="fixed" data-theme="b">
            <a href="#" data-icon="back" data-rel="back">&larr; 뒤로 (Back)</a>
            <h1>영화 정보 입력</h1>
            <a href="main.php" data-icon="home" data-iconpos="notext" class="ui-btn-right">영화 목록 (Home)</a>

            <div data-role="navbar">
                <ul>
                    <li><a href="insert.php" class="ui-btn-active">입력</a></li>
                    <li><a href="update_select.php">수정</a></li>
                    <li><a href="delete_select.php">삭제</a></li>
                    <li><a href="selectAll.php">전체 검색</a></li>
                </ul>
            </div>
        </div>

        <div data-role="content">
            <form name="form1" method="POST" enctype="multipart/form-data" action="insert_result.php" data-ajax="false">
                <h3>영화 정보 입력</h3>    
                <div class="ui-body ui-body-a">
                    <label>장르: </label>
                    <select name="genre" data-native-menu="false" data-mini="true" data-inline="true" id="genre">
                        <option value="미정">미정</option>
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
                    <label>영화명: </label>
                    <input type="text" name="title" id="title" data-mini="true" data-inline="true">
                    <label>상영날짜 (yyyy-mm-dd): </label>
                    <input type="date" name="date" id="date" data-mini="true" data-inline="true">
                    <label>관람료: </label>
                    <input type="text" name="price" id="price" data-mini="true" data-inline="true">
                    <label>포스터: </label>
                    <input type="file" name="poster" id="poster" data-mini="true" data-inline="true">
                </div>

                <div class="ui-body">
                    <fieldset class="ui-grid-a">
                        <div class="ui-block-a">
                            <input type="reset" value="취소" data-mini="true">
                        </div>
                        <div class="ui-block-b">
                            <input type="submit" value="추가" data-mini="true">
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