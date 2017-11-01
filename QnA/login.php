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
$sql = "SELECT * FROM user_inpo";
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

<!-- 로그인입력부분 -->
 <form class="form-horizontal" method='post' action='process.php?id=login'>
   <h3 style="padding-left: 30px;">로그인</h3><hr>
   <div class="form-group">
        <label class="col-sm-2 control-label" for="user_id">아이디</label>
      <div class="col-sm-3">
         <input class="form-control" type='text' name='user_id' placeholder="아이디를 입력하세요" tabindex='1'>
      </div>
  </div>
   <div class="form-group">
       <label class="col-sm-2 control-label" for="user_pw">비밀번호</label>
     <div class="col-sm-3">
         <input class="form-control" type='password' name='user_pw' placeholder="암호를 입력하세요" tabindex='2'>
      </div>
    </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
     <button class="btn btn-success" type="submit" name="button" style="color:white;margin-left:10px;" tabindex='3'>로그인</button>
 </div>
</form>
