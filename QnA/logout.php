<?php
session_start();

echo "<script>alert('".$_SESSION['user_name'].'('.$_SESSION['user_id'].")님로그아웃 되었습니다.');</script>";
session_destroy();

?>
<meta http-equiv='refresh' content='0;url=index.php'>
