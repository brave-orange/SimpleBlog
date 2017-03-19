<?php
$name = $_POST['name'];
$sex = $_POST['sex'];
$sid = $_POST['sid'];
$xueyuan = $_POST['xueyuan'];
$password = $_POST['password1'];
 include('mysql_conn.php'); 
 $sql = "update users set name='$name',sex='$sex',xueyuan='$xueyuan',password='$password' where id='$sid'"; 
 echo $sql;
 if (!mysql_query($sql,$con))
  {
      die('Error: ' . mysql_error());
  }

mysql_close($con);
  echo "修改成功！正在加载...";
 header("refresh:3;url = ../admin.html");

?>

