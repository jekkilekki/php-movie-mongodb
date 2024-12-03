<?php

// movieDB 데이터베이스 연결
$conn = mysqli_connect("localhost", "movie_user", "1234", "movieDB")
    or die("movieDB 데이터베이스 접속 실패!");

$title = $_POST['stitle'];

$sql = "SELECT * FROM MOVIE WHERE title='$title'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
unlink($row['poster']);

$sql = "DELETE FROM MOVIE WHERE title='$title'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('$title' 정보 삭제 성공!);</script>";
} else {
    $err = mysqli_error($conn);
    echo "<script>alert('SQL문 정보 삭제 오류 \\n오류 내용: $err');</script>";
}

mysqli_close($conn);

echo "<script>location.href='main.php';</script>"; // p. 512 edit

?>