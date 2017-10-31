<a href="index.php">메인으로</a><br>
<?php

$conn = mysqli_connect("localhost","root","qaz1wsx21","Q&A");
$sql = "SELECT * FROM board";
$result = mysqli_query($conn,$sql);


if($_SESSION['user_name'] != NULL){
  echo '<a href="#">"'.$_SESSION['user_name'].'"님</a><br>';
  echo "<a href='logout.php'>로그아웃</a><br>";
}else {
  echo '<br><a href="signup.php">회원가입</a><br>';
  echo '<br><a href="login.php ">로그인</a><br>';
}
 ?>

 <form id="signup" action="process.php?id=signup" method="post">
   <h2>회원가입</h2>
   <table>
     <tr>
       <td><label for="InputId">아이디</label></td>
       <td><input type="text" name="id" id="InputId" placeholder="아이디를 입력하세요"><br></td>
     </tr>
     <tr>
       <td><label for="InputPW1">암호</label></td>
       <td><input type="password" name="pw" id="InputPW1" placeholder="암호를 입력하세요"><br></td>
     </tr>
     <tr>
       <td><label for="InputEmail">이메일 주소</label></td>
       <td><input type="email" name="email" id="InputEmail" placeholder="example@example.com"><br></td>
     </tr>
     <tr>
       <td><label for="InputName">이름</label></td>
       <td><input type="text" name="name" id="InputName" placeholder="이름을 입력하세요"><br></td>
     </tr>
     <tr>
       <td><label for="InputBday">생년월일</label></td>
       <td><input type="number" name="day" id="InputBday" placeholder="19YYMMDD"><br></td>
     </tr>
   </table>

     <button type="submit">가입하기</button>
 </form>
