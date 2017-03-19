<?php
/**
 * Short description.
 * 
 * @author  wyc
 * @version 1.0
 * @package main
 */
    session_start();
    $title = $_POST['title'];
	$body = $_POST['body'];
	$name = $_SESSION['name'];
	$date =  date('Y-m-d H:i',time());
	$picture = $_FILES['picture'];
	$body = '<p>'.$body.'</p>';
	$arr=explode("\n",$body);
	$str1=nl2br($body);//回车换成换行默认函数 
	
	include "mysql_conn.php";
	/*$sql = "select * from article";
	$result = mysql_query($sql, $con);
	while($row = mysql_fetch_array($result))
	{
		$id = $row[0];
	}*/
    $a = $name."|".$date;
	
    $sql="select id from article where author='$a'";//得到插入的文章的id编号防止删除文件之后出现txt文件命名出问题
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_array($result);

	$path = "C:/web big work/image/t".sprintf('%04d', $row[0]).".jpg";
	if(!$picture['error'])
	{
	    move_uploaded_file($picture["tmp_name"],$path);
		$picpath = "./image/t".sprintf("%04d", $row[0]).".jpg";
		
	}else {
	    $picpath = "./image/t.jpg";
	}           //存储图片
	$sql="insert into article(title,author,body,picture) values('$title','$a','$str1','$picpath')";//向数据库插入文章数据
	mysql_query($sql,$con);
        $sql="select id from article where author='$a'";//得到插入的文章的id编号防止删除文件之后出现txt文件命名出问题
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_array($result);
    /*$a = $name."|".$date;
	$sql="insert into article(title,author,body,picture) values('$title','$a','$str1','$picpath')";//向数据库插入文章数据
	mysql_query($sql,$con);
  
	$sql="select id from article where author='$a'";//得到插入的文章的id编号防止删除文件之后出现txt文件命名出问题
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_array($result);
	echo var_dump($row),"<br>";
	echo $row[0];*/

	$filepath = "../article/".$row[0].".txt";
	echo $filepath;
    $myfile = fopen($filepath, "w") or die("Unable to open file!");
	$str = "
		<div class='picture'>
		<img src='$picpath' />
		</div>
		<div class='title'>
			$title
		</div>
		<div class='author'>
			$name | $date
		</div>
		<div class='article'>
			$str1
		</div>	
	";

   if(fwrite($myfile,$str))
   {
		echo "发表成功！！！";
		header("refresh:3;url = ../write.html");
		mysql_close($con);
	}else
	{
        echo "写入失败！";
		header("refresh:1;url = ../write.html");
		mysql_close($con);
	}

?>