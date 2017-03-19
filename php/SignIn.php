<?php

     
     if(isset($_POST['captcha']))
     {
     	session_start();
     	if (strtolower($_POST['captcha'])==strtolower($_SESSION['text'])) 
     	{
			$name = $_POST['name'];
			$sex = $_POST['sex'];
			$sid = $_POST['sid'];
			$xueyuan = $_POST['xueyuan'];
			$password = $_POST['password1'];
			 include('mysql_conn.php');
			 $sql = "insert into users value('$sid','$name','$sex','$xueyuan','$password','0')";
			 if (!mysql_query($sql,$con))
			  {
				  die('Error: ' . mysql_error());
			  }
			mysql_close($con);
			  echo $name,$xueyuan;
			  echo "注册成功！正在加载...";
			 header("refresh:3;url = ../login.html");
     		
     	}
     	else{
            
			echo '<font color="#CC0000"><b>输入错误</b></font>';
			echo $_POST['captcha'];
			echo $_SESSION['text'];
			header("refresh:3;url = ../SignIn.php");
     	    }
     	exit();
     }


?>

