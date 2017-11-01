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
$sql = "SELECT * FROM board";
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
<!-- 회원가입 입력부분 -->
 <form class="form-horizontal" id="signup" action="process.php?id=signup" method="post">
   <h3 style="padding-left: 30px;">회원가입</h3><hr>
  <div class="form-group">
       <label class="col-sm-2 control-label" for="id">아이디</label>
    <div class="col-sm-3">
       <input class="form-control" type="text" name="id" id="idchk" placeholder="아이디를 입력하세요">
       <input type="hidden" id="chk" name="use" value="0">
    </div>
    <button class="btn btn-warning" type="button" name="button" onclick="idcheck()">중복체크</button>
  </div>

  <div class="form-group">
       <label class="col-sm-2 control-label" for="pw">암호</label>
    <div class="col-sm-3">
       <input class="form-control" type="password" name="pw" id="pw" placeholder="암호를 입력하세요">
    </div>
  </div>

  <div class="form-group">
       <label class="col-sm-2 control-label" for="email">이메일 주소</label>
    <div class="col-sm-3">
       <input class="form-control" type="email" name="email" id="email" placeholder="example@example.com">
     </div>
  </div>

  <div class="form-group">
       <label class="col-sm-2 control-label" for="name">이름</label>
     <div class="col-sm-3">
       <input class="form-control" type="text" name="name" id="name" placeholder="이름을 입력하세요">
     </div>
  </div>

  <div class="form-group">
       <label class="col-sm-2 control-label" for="day">생년월일</label>
      <div class="col-sm-3">
       <input class="form-control" type="number" name="day" id="day" placeholder="19YYMMDD">
     </div>
     <button class="btn btn-success" style="color:white;" type="button" id="smbtn" onclick="signup_submit()">가입하기</button>
  </div>
 </form>

  <script>
//아이디 중복체크
    function idcheck() {
      var id = document.getElementById('idchk');
      var url = "signck.php?id="+id.value;
      if(!id.value){
          alert('아이디를 입력해주세요.');
          id.focus();
          return false;
      }else {
        window.open(url,'','width=290,height=140,left=500,location=no');
      }
    }

//회원가입 공백확인
    function signup_submit() {
        var form = document.getElementById('signup');
        if(!form.idchk.value){
          alert('아이디를 입력해주세요.');
          form.idchk.focus();
          return false;
        }else if(!form.pw.value){
          alert('패스워드를 입력해주세요.');
          form.pw.focus();
          return false;
        }else if(!form.email.value){
          alert('이메일을 입력해주세요.');
          form.email.focus();
          return false;
        }else if(!form.name.value){
          alert('이름을 입력해주세요.');
          form.name.focus();
          return false;
        }else if(!form.day.value){
          alert('생년월일을 입력해주세요.');
          form.dat.focus();
          return false;
        }else if(form.chk.value != 1){
          alert('아이디 중복체크를해주세요.');
          form.idchk.focus();
          return false;
        }
        else {
          document.getElementById('smbtn').type = "submit";
    }
  }
  </script>
