<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap-3.3.2-dist/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>
</head>

<?php
$id = $_GET['id'];

$conn = mysqli_connect("localhost","root","qaz1wsx21","Q&A");
$sql = "SELECT * FROM user_inpo WHERE user_id='".$id."'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if($id == ''){
?>
<div style="color:red">
아이디를 입력하세요.
</div>
<br>
<form action="signck.php" method="get">
    <div class="col-sm-3">다른아이디 검색 ▼
    <input class="form-control" type="text" name="id" placeholder="아이디를 입력해주세요.">
    <button class="btn btn-warning" style="margin-top: 10px;" type="submit" name="button">중복확인</button></div>
</form>

<?php
}else{

   if($count == 0){
   ?>
   <div style="color:green">
        <div>
            <?=$id?>는 사용가능한 아이디입니다.
            <input class="btn btn-success" type="button" value="사용하기" onclick="parent('<?=$id?>')">
        </div>
    </div>
    <br>
   <form action="signck.php" method="get">
     <div class="col-sm-3">다른아이디 검색 ▼
     <input class="form-control" type="text" name="id" placeholder="아이디를 입력해주세요.">
     <button class="btn btn-warning" style="margin-top: 10px;" type="submit" name="button">중복확인</button></div>
   </form>
   <?php
   }else{
   ?>
   <div style="color:red">
   <?=$id?>와 같은아이디가 존재합니다.
   </div>
   <br>
   <form action="signck.php" method="get">
     <div class="col-sm-3">다른아이디 검색 ▼
     <input class="form-control" type="text" name="id" placeholder="아이디를 입력해주세요.">
     <button class="btn btn-warning" style="margin-top: 10px;" type="submit" name="button">중복확인</button></div>
   </form>

   <?php
   }
}
?>

<script>
    function parent(id){
        opener.document.getElementById('chk').value = 1;
        opener.document.getElementById('idchk').value = id;
        self.close();
    }
</script>
