<?php
	session_start();

    for($i = 0 ;$i < 4; $i++)
	{
		$num = rand(0,35);		
		$char[i] = $arr[$num]; 
	}
	$a = "";
	for($i = 0 ;$i < 4; $i++)
	{
			
		$a=$a.$char[i]; 
	}
	captcha_img($char);
	$_SESSION['text'] = $a;
?>