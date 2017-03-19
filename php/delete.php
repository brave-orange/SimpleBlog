<?php
    $id = $_GET['id'];
	$name = $_GET['name'];
	$filepath = "../article/".$id.".txt";
	$picpath = "../image/t".sprintf('%04d', $id).".jpg";
	$sql = "delete from $name where id = $id";
	include"mysql_conn.php";
	$result = mysql_query($sql,$con);
	if (mysql_affected_rows() < 1) 
	{		
		echo "<h2>删除失败（正在跳转。。。）</h2>";
        header("refresh:3;url = ../admin.html");
	}else{
		if($name == "article")
		{
		  unlink ($filepath);
	      unlink ($picpath);
	    }
	    echo "<h2>删除成功，正在返回前页。</h2><a href='../admin.html'>如未跳转，点击这里...</a>";
		
	    mysql_close($con);
	    header("refresh:3;url = ../admin.html");
	}

?>