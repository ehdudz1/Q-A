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
$sql = "SELECT * FROM board WHERE id = ".$_GET['number'];
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

//게시판내용출력
while($row = mysqli_fetch_assoc($result)){
  echo "<div class='row bg-info' style='padding:20px;margin:20px;'>";
  echo "<h4>Q . ".$row['title']."</h4>";
  echo "<h5>".$row['descript']."</h5>";
  echo "<div style='text-align: right;'>작성자 : ".$row['author']."&nbsp;&nbsp;&nbsp;작성시간 : ".$row['time']."</div>";
  echo "</div><hr>";
}
echo '<a class="btn btn-primary" style="margin-left: 10px;color:white" href="descript.php?id=reply&number='.$_GET['number'].'">댓글달기</a>';
echo '<a class="btn btn-danger" style="margin-left: 5px;color:white" href="process.php?id=del&number='.$_GET['number'].'">글삭제</a><br>';

//댓글내용출력
$sql = "SELECT * FROM reply WHERE b_number = ".$_GET['number']." ORDER BY `time` asc";
$result = mysqli_query($conn,$sql);
//관리자 댓글
while($row = mysqli_fetch_assoc($result)){
  switch ($row['author']) {
    case '관리자(admin)':
//echo "<div class='row' align='right'><div class='col-md-6 bg-warning' style='padding:20px;margin:20px;'>";
    echo "<div class='row'><div class='col-md-6 bg-warning' style='padding:20px;margin:20px;'>";
    echo "<h4>".$row['descript']."</h4>";
    echo "<div style='text-align: right;'>작성자 : ".$row['author']."&nbsp;&nbsp;&nbsp;작성시간 : ".$row['time']."</div></div>";
    echo "<div class='col-md-6'></div></div>";
      break;
//사용자 댓글
    default:
    echo "<div class='row'><div class='col-md-6 bg-info' style='padding:20px;margin:20px;'>";
    echo "<h4>".$row['descript']."</h4>";
    echo "<div style='text-align: right;'>작성자 : ".$row['author']."&nbsp;&nbsp;&nbsp;작성시간 : ".$row['time']."</div></div>";
    echo "<div class='col-md-6'></div></div>";
      break;
  }
}


//댓글작성부분
switch ($_GET['id']) {
  case 'reply':
  echo "<hr><h3 style='padding-left: 30px;'>댓글달기</h3><hr>";
  echo '<form class="form-horizontal" action="process.php?id=reply&number='.$_GET['number'].'" method="post">';

  echo '<div class="form-group"><label class="col-sm-2 control-label" for="author">작성자</label>';
  echo '<div class="col-sm-3"><input class="form-control" type="text"  id="author" disabled value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')님'.'">';
  echo '<input type="hidden" name="author" value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')'.'"></div></div>';

  echo '<div class="form-group"><label class="col-sm-2 control-label" for="descript">댓글내용</label>';
  echo '<div class="col-sm-3"><textarea class="form-control" rows="5" cols="50" name="descript" id="descript" placeholder="내용을 적어주세요."></textarea></div></div>';

  echo '<button class="btn btn-primary" style="margin-left: 10px;color:white" type="submit" name="button">작성</button>';

  echo '</form>';
    break;

}
 ?>
