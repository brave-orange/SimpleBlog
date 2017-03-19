<?php

    $sid = $_POST['username'];
	$password = $_POST['password'];
    include('mysql_conn.php');
	$sql = "select * from users where id = '$sid' and password='$password'";
    //mysql_query($sql, $con);
	$result=mysql_query($sql, $con);
    if (mysql_num_rows($result) < 1) 
	{
		 echo "<h2>学号或者密码错误！请重新输入或者注册一个账号。（正在跳转。。。）</h2>";
         header("refresh:3;url = ../login.html");
	}
	else
	{
		 $row = mysql_fetch_array($result);
		 Session_start();
		 $name = $row[1];
		 $_SESSION["name"] = $name;
		
		 if($row[admin])
		 {
			 
			echo "欢迎管理员";
			$_SESSION["admin"] = "yes";
			
			 header("refresh:1;url = ../admin.html");

		 } else {
		     echo "欢迎普通用户";
			 $_SESSION["admin"] = "no";
			 header("refresh:1;url = ../index.html");
		 }
		
	}
	mysql_close($con);

?>