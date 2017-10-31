<a href="index.php">메인으로</a><br>
<?php
$conn = mysqli_connect("localhost","root","qaz1wsx21","Q&A");
$sql = "SELECT * FROM board WHERE id = ".$_GET['number'];
$result = mysqli_query($conn,$sql);

session_start();

if($_SESSION['user_name'] != NULL){
  echo '<a href="#">"'.$_SESSION['user_name'].'"님</a><br>';
  echo "<a href='logout.php'>로그아웃</a><br>";
}else {
  echo '<br><a href="signup.php">회원가입</a><br>';
  echo '<br><a href="login.php ">로그인</a><br>';
}

while($row = mysqli_fetch_assoc($result)){

  echo "제목 : ".$row['title']."<br>";
  echo "문의내용 : ".$row['descript']."<br>";
  echo "작성자 : ".$row['author']."<br>";
  echo "작성시간 : ".$row['time']."<br>";
  echo "<hr>";
}

$sql2 = "SELECT * FROM reply WHERE b_number = ".$_GET['number'];
$result2 = mysqli_query($conn,$sql2);

while($row = mysqli_fetch_assoc($result2)){

  echo "상태 : ".$row['answer']."<br>";
  echo "문의내용 : ".$row['descript']."<br>";
  echo "작성자 : ".$row['author']."<br>";
  echo "작성시간 : ".$row['time']."<br>";
  echo "<hr>";
}


echo '<a href="write.php?id=reply&number='.$_GET['number'].'">댓글달기</a>';
 ?>

<table>

 <th></th>
 <td></td>

</table>
