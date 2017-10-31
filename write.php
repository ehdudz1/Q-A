<a href="index.php">메인으로</a><br>

<?php
session_start();
// $config = array(
// 'host' =>"localhost" ,
// 'duser' => 'root',
// 'dpw' => 'qaz1wsx21',
// 'dname' => 'travel'
// );
// function db_init($host,$duser,$dpw,$dname){
//  $conn = mysqli_connect($host,$duser,$dpw);
//  mysqli_select_db($conn,$dname);
//  return $conn;
//  }

// mysqli_select_db($conn,'Q&A');

 //$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
 // $conn = mysqli_connect("localhost","root","qaz1wsx21","Q&A");
 // $sql = "SELECT * FROM board";
 // $result = mysqli_query($conn,$sql);
 if($_SESSION['user_name'] != NULL){
   echo '<a href="#">"'.$_SESSION['user_name'].'"님</a><br>';
   echo "<a href='logout.php'>로그아웃</a><br>";
 }else {
   echo '<br><a href="signup.php">회원가입</a><br>';
   echo '<br><a href="login.php ">로그인</a><br>';
 }

 switch($_GET['id']){
    case 'write':
      echo "<h2>문의하기</h2>";
      echo '<form class="" action="process.php?id=write" method="post">';
      echo '<table><tr><td><label for="select">문의유형선택</label></td>';
      echo '<td><select id="select" name="Qtype">';
         echo '<option value="문의유형(전체)" selected>문의유형(전체)</option>';
         echo '<option value="상품(성능/사이즈)">상품(성능/사이즈)</option>';
         echo '<option value="배송">배송</option>';
         echo '<option value="교환">교환</option>';
         echo '<option value="반품/취소/환불">반품/취소/환불</option>';
         echo '<option value="기타">기타</option>';
      echo '</select></td></tr>';

      echo '<tr><td><label for="author">작성자</label></td>';
      echo '<td><input type="text"  id="author" disabled value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')님'.'"></td></tr>';
      echo '<input type="hidden" name="author" value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')'.'">';

      echo '<tr><td><label for="title">문의제목</label></td>';
      echo '<td><input type="text" name="title" id="title" placeholder="제목을 입력해주세요."></td></tr>';

      echo '<tr><td><label for="descript">문의내용</label></td>';
      echo '<td><textarea rows="5" cols="50" name="descript" id="descript" placeholder="내용을 적어주세요."></textarea></td></tr></table>';

      echo '<button type="submit" name="button">글쓰기</button>';

      echo '</form>';
    break;

    case 'reply':
      echo "<h2>댓글달기</h2>";
      echo '<form action="process.php?id=reply&number='.$_GET['number'].'" method="post">';
      //echo '<h4>문의유형 선택</h4>';
      // echo '<select class="" name="Qtype">';
      //    echo '<option value="문의유형(전체)" selected>문의유형(전체)</option>';
      //    echo '<option value="상품(성능/사이즈)">상품(성능/사이즈)</option>';
      //    echo '<option value="배송">배송</option>';
      //    echo '<option value="교환">교환</option>';
      //    echo '<option value="반품/취소/환불">반품/취소/환불</option>';
      //    echo '<option value="기타">기타</option>';
      // echo '</select>';

      // echo '<h4>문의제목</h4>';
      // echo '<input type="text" name="title" value="" placeholder="제목을 입력해주세요.">';
      echo '<table><tr><td><label for="author">작성자</label></td>';
      echo '<td><input type="text"  id="author" disabled value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')님'.'"></td></tr>';
      echo '<input type="hidden" name="author" value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')'.'">';

      echo '<tr><td><label for="descript">댓글내용</label></td>';
      echo '<td><textarea rows="5" cols="50" name="descript" id="descript" placeholder="내용을 적어주세요."></textarea></td></tr></table>';

      echo '<button type="submit" name="button">댓글달기</button>';

      echo '</form>';
    break;
       }

      //  echo '<form class="" action="process.php?id=write" method="post">';
      //  echo '<h4>문의유형 선택</h4>';
      //  echo '<select class="" name="Qtype">';
      //     echo '<option value="문의유형(전체)" selected>문의유형(전체)</option>';
      //     echo '<option value="상품(성능/사이즈)">상품(성능/사이즈)</option>';
      //     echo '<option value="배송">배송</option>';
      //     echo '<option value="교환">교환</option>';
      //     echo '<option value="반품/취소/환불">반품/취소/환불</option>';
      //     echo '<option value="기타">기타</option>';
      //  echo '</select>';
       //
      //  echo '<h4>문의제목</h4>';
      //  echo '<input type="text" name="title" value="" placeholder="제목을 입력해주세요.">';
       //
      //  echo '<h4>문의내용</h4>';
      //  echo '<textarea rows="5" cols="50" name="descript" placeholder="내용을 적어주세요."></textarea>';
       //
      //  echo '<button type="submit" name="button">글쓰기</button>';
       //
      //  echo '</form>';
?>
