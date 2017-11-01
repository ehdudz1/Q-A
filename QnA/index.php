<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap-3.3.2-dist/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>
</head>

<div>
<a class="btn btn-default" style="margin-left: 10px;" href="index.php">메인으로</a>
<?php
 $conn = mysqli_connect("localhost","root","qaz1wsx21","Q&A");
 $sql = "SELECT * FROM board ORDER BY `time` desc";
 $result = mysqli_query($conn,$sql);
 session_start();

//로그인세션확인
if($_SESSION['user_name'] != NULL){
  echo '<a class="btn btn-default" href="#">"'.$_SESSION['user_name'].'"님</a>';
  echo '<a class="btn btn-default" href="logout.php ">로그아웃</a></div><hr>';
}else {
  echo '<a class="btn btn-default" href="signup.php">회원가입</a>';
  echo '<a class="btn btn-default" href="login.php ">로그인</a></div><hr>';
}
?>

<!-- 게시판글목록부분 -->
<table class="table">
  <thead>
    <tr>
      <th>답변상태</th><th>문의유형</th><th>문의내용</th><th>작성자</th><th>등록일자</th>
    </tr>
  </thead>
<?php
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tbody>";
  echo "<tr>";
  if ($row['answer']=="답변완료") {
    echo '<td class="bg-success">'.$row['answer'].'</td>';
  }else {
    echo '<td class="bg-warning">'.$row['answer'].'</td>';
  }
  echo '<td>'.$row['Qtype'].'</td>';
  echo '<td>'.'<a href="descript.php?number='.$row['id'].'">'.$row['title'].'</a>'.'</td>';
  echo '<td>'.$row['author'].'</td>';
  echo '<td>'.$row['time'].'</td>';
  echo "</tr>";
  echo "</tbody>";
}
?>
</table>
<a class="btn btn-primary" style="margin-left: 10px;" href="write.php?id=write" style="color:white">문의하기</a>
