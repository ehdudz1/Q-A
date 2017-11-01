<?php
$conn = mysqli_connect("localhost","root","qaz1wsx21","Q&A");
session_start();


  switch($_GET['id']){
//글쓰기처리부분
      case 'write':

          // 로그인상태확인
                if($_SESSION['user_id'] == ""){
                  echo "<script>alert('로그인이 필요합니다.');</script>";
                  echo "<meta http-equiv='refresh' content='0;url=login.php'>";

                }else if($_SESSION['user_id'] != ""){
          // board 게시판 글작성
                  $sql = "INSERT INTO board (`Qtype`,`title`,`descript`,`author`,`time`) VALUES('".$_POST['Qtype']."', '".$_POST['title']."', '".$_POST['descript']."', '".$_POST['author']."', NOW())";
                  $result = mysqli_query($conn, $sql);

                  //header("Location: http://localhost/Q&A/descript.php?number=".$_GET['number']);
                  echo "<script>alert('글이 작성되었습니다.');</script>";
                  echo "<meta http-equiv='refresh' content='0;url=index.php'>";
                }
        break;


  //답변처리부분
      case 'reply':
  // 로그인상태확인
        if($_SESSION['user_id']==""){
          echo "<script>alert('로그인이 필요합니다.');</script>";
          echo "<meta http-equiv='refresh' content='0;url=login.php'>";

        }else if
  // 관리자 답변
        ($_SESSION['user_id']=='admin'){
          $sql = "INSERT INTO reply (`b_number`,`descript`,`author`,`answer`,`time`) VALUES('".$_GET['number']."', '".$_POST['descript']."', '".$_POST['author']."', '답변완료', NOW())";
          $result = mysqli_query($conn, $sql);

          $sql = "UPDATE `board` SET `answer` = '답변완료' WHERE `board`.`id` = ".$_GET['number'];
          $result = mysqli_query($conn, $sql);
          //header("Location: http://localhost/Q&A/descript.php?number=".$_GET['number']);
          echo "<meta http-equiv='refresh' content='0;url=descript.php?number=".$_GET['number']."'>";
        }else{
  //사용자 답변
          $sql = "INSERT INTO reply (`b_number`,`descript`,`author`,`answer`,`time`) VALUES('".$_GET['number']."', '".$_POST['descript']."', '".$_POST['author']."', '답변예정', NOW())";
          $result = mysqli_query($conn, $sql);
          //header("Location: http://localhost/Q&A/descript.php?number=".$_GET['number']);
          echo "<meta http-equiv='refresh' content='0;url=descript.php?number=".$_GET['number']."'>";
        }
      break;

//글삭제 처리부분
      case 'del':
            //$sql = "DELETE FROM ".$_GET['board']." WHERE id = ".$_GET['number'];
            $sql = "SELECT * FROM board WHERE id = ".$_GET['number'];
            $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
        //로그인상태확인
              if($_SESSION['user_id']==""){
                  echo "<script>alert('로그인이 필요합니다.');</script>";
                  echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        //현재글의 작성자와 로그인사용자가 동일인인지 비교
              }else if($row['author'] == $_SESSION['user_name'].'('.$_SESSION['user_id'].')'){
                $sql = "DELETE FROM board WHERE id = ".$_GET['number'];
                $result = mysqli_query($conn, $sql);
                $sql = "DELETE FROM reply WHERE b_number = ".$_GET['number'];
                $result = mysqli_query($conn, $sql);
                echo "<script>alert('글이 삭제되었습니다.');</script>";
                echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        //현재글의 작성자와 로그인사용자가 동일인인지 비교
              }else if($row['author'] != $_SESSION['user_name'].'('.$_SESSION['user_id'].')'){

                echo "<script>alert('타인의 글은 삭제할 수 없습니다.');</script>";
                echo "<meta http-equiv='refresh' content='0;url=descript.php?number=".$_GET['number']."'>";

          }
        }
      break;


//로그인 처리부분
      case 'login':
          $sql = "SELECT * FROM user_inpo WHERE user_id = '".$_POST['user_id']."' AND user_pw = '".$_POST['user_pw']."'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);

            if ($row != NULL) {

              echo "<script>alert(' 로그인 되었습니다.');</script>";

              session_start();
                $_SESSION['user_id'] = $_POST['user_id'];
                $_SESSION['user_name'] = $row['name'];
              echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            }else{

              echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');</script>";
              echo "<meta http-equiv='refresh' content='0;url=login.php'>";
            }
          break;


      //회원가입처리부분
            case 'signup':
              $sql = "INSERT INTO user_inpo(`email`, `user_id`, `user_pw`, `name`, `bday`)"." VALUES('".$_POST['email']."','".$_POST['id']."','".$_POST['pw']."','".$_POST['name']."',".$_POST['day'].")";
              $result = mysqli_query($conn, $sql);
                //header("Location: http://localhost/Q&A/index.php");
          //회원가입 완료
                  if($result){
                  //echo $_POST['name'].'('.$_POST['id'].') 님 가입을 축하드립니다. 5초뒤에 메인화면으로 이동합니다.';
                  echo "<script>alert('".$_POST['name'].'('.$_POST['id'].") 님 회원가입이 완료되었습니다.');</script>";
                  echo "<meta http-equiv='refresh' content='0;url=index.php'>";
                  //echo "<a href='index.php'>메인으로 돌아가기</a>";
          //회원가입 실패
                }else {
                  //echo "회원가입이 완료되지않았습니다.5초뒤에 메인화면으로 이동합니다.";
                  echo "<script>alert('회원가입이 완료되지않았습니다.다시시도해주세요');</script>";
                  //echo "<a href='signup.php'>회원가입단계로 돌아가기</a>";
                  echo "<meta http-equiv='refresh' content='0;url=signup.php'>";
                }
                //echo "<meta http-equiv='refresh' content='5;url=index.php'>";
              break;

            }
 ?>
