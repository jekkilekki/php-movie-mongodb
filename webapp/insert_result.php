<?php
// movieDB 데이터베이스 접속
$conn = mysqli_connect("localhost", "movie_user", "1234", "movieDB")
    or die("movieDB 데이터베이스 접속 실패!");

$title = $_POST['title'];
$genre = $_POST['genre'];
$date = $_POST['date'];
$price = $_POST['price'];
$file = $_FILES['poster'];

$upload_dir = './uploads/';
$upload_file = $upload_dir . basename($file['name']);

if(isset($FILES['poster'])) {
    if(move_uploaded_file($file['tmp_name'], $upload_file)) {
        $sql = "INSERT INTO MOVIE(id, title, genre, date, price, poster)
            VALUES (null, '$title', '$genre', '$date', '$price', '$file')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('$title' 정보 추가 성공!);</script>";
        } else {
            echo "<script>alert('SQL문 정보 추가 오류 \\n오류 내용: $err_msg');</script>";
        }
    } else {
        echo "<script>alert('파일 업로드 실패!');</script>";
    }
} else {
    echo "<script>alert('파일 업로드 오류 발생!');</script>";
}

mysqli_close($conn);

echo "<script>location.href='main.php';</script>"; // p. 512 edit
?>