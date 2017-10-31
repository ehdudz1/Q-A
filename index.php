<a href="index.php">메인으로</a><br>
<?php
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
 $conn = mysqli_connect("localhost","root","qaz1wsx21","Q&A");
 $sql = "SELECT * FROM board ORDER BY `time` desc";
 $result = mysqli_query($conn,$sql);
 session_start();


if($_SESSION['user_name'] != NULL){
  echo '<a href="#">"'.$_SESSION['user_name'].'"님</a><br>';
  echo "<a href='logout.php'>로그아웃</a><br>";
}else {
  echo '<br><a href="signup.php">회원가입</a><br>';
  echo '<br><a href="login.php ">로그인</a><br>';
}

 ?>

<table>
  <thead>
    <tr>
      <th>답변상태</th><th>문의유형</th><th>문의내용</th><th>작성자</th><th>등록일자</th>
    </tr>
  </thead>
<?php
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tbody>";
  echo "<tr>";
  echo '<td>'.$row['answer'].'</td>';
  echo '<td>'.$row['Qtype'].'</td>';
  echo '<td>'.'<a href="descript.php?number='.$row['id'].'">'.$row['title'].'</a>'.'</td>';
  echo '<td>'.$row['author'].'</td>';
  echo '<td>'.$row['time'].'</td>';
  echo "</tr>";
  echo "</tbody>";
}
?>
</table>
<a class="" href="write.php?id=write">문의하기</a>
