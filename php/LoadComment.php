<?php

/* 
 * 在数据库中加载评论并且返回数据
 * 供list.js中通过url调用
 */
$id = $_GET['id'];
include "mysql_conn.php";
$sql = "select comm_name,comm_body from comment where id='$id'";
//$sql = "select comm_name,comm_body from comment where id=8";
 $result = mysql_query($sql,$con);
 $i=0;
while($row = mysql_fetch_array($result)){
$rows[$i]['name']=$row['comm_name'];
$rows[$i]['body']=$row['comm_body'];
$i++;
}
mysql_close($con);
$collback = json_encode($rows, JSON_UNESCAPED_UNICODE); //返回json格式数据
echo $collback;