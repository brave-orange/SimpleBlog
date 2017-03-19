<?php
/*
*使用GD库实现生成杂色底图验证码
*
*/

    session_start();

	$img = imagecreatetruecolor(100,30);
	$bgcolor = imagecolorallocate($img,255,255,255);
	imagefill($img,0,0,$bgcolor);
	
	$arr[36]="";$word = "A";
	for($i = 0 ;$i < 10; $i++)
	{
		$arr[$i] = "".$i;
	}
	for($i = 10 ;$i < 36; $i++)
	{
		$arr[$i] = $word;
		$word++;
	}
//将字母和数字存入数组，便于随机取值
    $char = "";
	for($i = 0 ;$i < 4; $i++)
	{
		$fontsize = 8;
		$fontcolor = imagecolorallocate($img,rand(0,120),rand(0,120),rand(0,120));
		$num = rand(0,35);
		$x = ($i*100/4)+rand(5,10);
		$y = rand(5,15);
		imagestring($img,$fontsize,$x,$y,$arr[$num],$fontcolor);
		$char = $char.$arr[$num];
	}
	$_SESSION['text'] = $char;
	$_SESSION['text'] = $char;
	
	for($i = 0 ;$i < 200; $i++)  //干扰点
	{
		$pointcolor = imagecolorallocate($img,rand(50,200),rand(50,200),rand(50,200));
		$x = rand(5,95);$y = rand(2,28);
		imagesetpixel($img,$x,$y,$pointcolor);
	}
	for($i = 0; $i < 2; $i++)    //干扰线
	{
		$linecolor = imagecolorallocate($img,rand(50,200),rand(50,200),rand(50,200));
		$x1 = rand(1,100);$x2 = rand(1,100);$y1 = rand(1,30);$y2 = rand(1,30);
		imageline($img,$x1,$y1,$x2,$y2,$linecolor);
	}
	
	header('Content-Type: image/png');
	imagepng($img);
	imagedestroy($img);
	
	
    



?>
