<?php
    $id = $_GET['id'];
	include('mysql_conn.php'); 
	$sql = "update users set admin='1' where id='$id'"; 
	echo $sql;
	if (!mysql_query($sql,$con))
	{
		 die('Error: ' . mysql_error());
	}
	mysql_close($con);
	header("refresh:3;url = ../admin.html");


?>