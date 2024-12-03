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
    <!-- 삭제 영화정보 검색 다이알로그 -->
    <div data-role="dialog" id="page3">
        <div data-role="header" data-theme="b">
            <h1>영화 검색</h1>
        </div>

        <div data-role="content">
            <h3>삭제할 영화 검색</h3>
            <form name="form3" method="POST" action="delete.php" data-ajax="false">
                <div class="ui-body ui-body-a">
                    <label>영화명: </label>
                    <input type="search" name="stitle" id="stitle" data-mini="true" data-inline="true">
                </div>

                <input type="submit" value="검색" data-mini="true">
                <input type="reset" value="취소" data-mini="true">
            </form>
        </div>
    </div>
</body>
</html>