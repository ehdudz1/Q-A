<a href="index.php">메인으로</a><br>
<?php

$conn = mysqli_connect("localhost","root","qaz1wsx21","Q&A");
$sql = "SELECT * FROM user_inpo";
$result = mysqli_query($conn,$sql);


if($_SESSION['user_name'] != NULL){
  echo '<a href="#">"'.$_SESSION['user_name'].'"님</a><br>';
  echo "<a href='logout.php'>로그아웃</a><br>";
}else {
  echo '<br><a href="signup.php">회원가입</a><br>';
  echo '<br><a href="login.php ">로그인</a><br>';
}
 ?>


 <form method='post' action='process.php?id=login'>
     <table>
       <tr>
         <td>아이디</td>
         <td><input type='text' name='user_id' placeholder="아이디를 입력하세요" tabindex='1'></td>
         <td rowspan='2'><button type="submit" name="button" style="height:50px" tabindex='3'>로그인</button></td>
       </tr>
       <tr>
         <td>비밀번호</td>
         <td><input type='password' name='user_pw' placeholder="암호를 입력하세요" tabindex='2'></td>
       </tr>
     </table>
</form>
