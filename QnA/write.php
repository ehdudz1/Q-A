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
session_start();

//로그인세션확인
if($_SESSION['user_name'] != NULL){
  echo '<a class="btn btn-default" href="#">"'.$_SESSION['user_name'].'"님</a>';
  echo '<a class="btn btn-default" href="logout.php ">로그아웃</a></div><hr>';
}else {
  echo '<a class="btn btn-default" href="signup.php">회원가입</a>';
  echo '<a class="btn btn-default" href="login.php ">로그인</a></div><hr>';
}

//QnA 게시판 글작성부분
 switch($_GET['id']){
    case 'write':
      echo "<h3 style='padding-left: 30px;'>문의하기</h3><hr>";
      echo '<form class="form-horizontal" id="write" action="process.php?id=write" method="post">';
      echo '<div class="form-group"><label class="col-sm-2 control-label" for="select">문의유형선택</label>';
      echo '<div class="col-sm-3"><select class="form-control" id="select" name="Qtype">';
         echo '<option value="문의유형(전체)" selected>문의유형(전체)</option>';
         echo '<option value="상품(성능/사이즈)">상품(성능/사이즈)</option>';
         echo '<option value="배송">배송</option>';
         echo '<option value="교환">교환</option>';
         echo '<option value="반품/취소/환불">반품/취소/환불</option>';
         echo '<option value="기타">기타</option>';
      echo '</select></div></div>';

      echo '<div class="form-group"><label class="col-sm-2 control-label" for="author">작성자</label>';
      echo '<div class="col-sm-3"><input class="form-control" type="text"  id="author" disabled value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')님'.'"></div></div>';
      echo '<input type="hidden" name="author" value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')'.'">';

      echo '<div class="form-group"><label class="col-sm-2 control-label" for="title">문의제목</label>';
      echo '<div class="col-sm-3"><input class="form-control" type="text" name="title" id="title" placeholder="제목을 입력해주세요."></div></div>';

      echo '<div class="form-group"><label class="col-sm-2 control-label" for="descript">문의내용</label>';
      echo '<div class="col-sm-3"><textarea class="form-control" rows="5" cols="50" name="descript" id="descript" placeholder="내용을 적어주세요."></textarea></div></div>';

      echo '<button class="btn btn-primary" style="margin-left: 10px;color:white"  type="button" id="wbtn" name="button" onclick="w_chk()">글쓰기</button>';

      echo '</form>';
    break;

       }

?>

<!-- 글작성 공백체크 -->
<script>
  function w_chk() {
      var write = document.getElementById('write');

      if(!write.title.value){
        alert('제목을 입력해주세요.');
        write.title.focus();
        return false;
      }else if (!write.descript.value) {
        alert('내용을 입력해주세요.');
        write.descript.focus();
        return false;
      }else {
        document.getElementById('wbtn').type = "submit";
      }
  }
</script>
