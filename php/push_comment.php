<?php

/* 
 * 用于将用户评论保存到数据库
 */
    include "mysql_conn.php";
    
    $name = $_GET['name'];
    $text = $_GET['text'];
    $id = $_GET['id'];
    echo $id,$text;
    if($id==""||$id==null)
    {
        $id="匿名评论";
    }
    $sql = "insert into comment(id,comm_name,comm_body) values('$id','$name','$text')";
   mysql_query($sql,$con)or die();
    
    mysql_close($con);