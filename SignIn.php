<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>会员注册</title>


<link href="css/SignIn.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="./js/SignIn.js"></script>

</head>

<body>

<div id="contact">
	<h1>会员注册：</h1>
	<form action="./php/SignIn.php" method="post" onsubmit="return check(this)" >
		<fieldset>
			<label class="label" for="sid">学号：</label>
			<input class="input" type="text" id="sid" name="sid" placeholder="输入您的学号" />
			<label class="label" for="name">姓名：</label>
			<input class="input" type="text" id="name" name="name" placeholder="输入您的姓名" />
			<label class="label">性别：</label>
			<input type="radio" id="1"  name="sex" value="男" checked/><label  for="1">&nbsp;男</label>
            <input type="radio" id="0"  name="sex" value="女" /><label  for="0">&nbsp;女</label><br>
			<label class="label" for="xueyuan">学院：</label>
			  <select id= "xueyuan" name="xueyuan">
			  <option value="文学与传媒学院" >文学与传媒学院</option>
			  <option value="数学与金融学院" >数学与金融学院</option>
			  <option value="计算机与信息工程学院" >计算机与信息工程学院</option>
			  <option value="机械与汽车工程学院" >机械与汽车工程学院</option>
			  <option value="电子与电气工程学院" >电子与电气工程学院</option>
			  <option value="地理信息与旅游学院" >地理信息与旅游学院</option>
			  <option value="材料与化学工程学院" >材料与化学工程学院</option>
			  <option value="生物与食品工程学院" >生物与食品工程学院</option>
			  <option value="经济与管理学院" >经济与管理学院</option>9

			  <option value="教育科学学院" >教育科学学院</option>
			  <option value="外国语学院" >外国语学院</option>
			  <option value="音乐学院" >音乐学院</option>
			  <option value="美术与设计学院" >美术与设计学院</option>
			  <option value="体育学院" >体育学院</option>
			  </select>
			  <label class="label" for="password1">密码：</label>
			  <input class="input" type="password" id="password1"  name="password1" placeholder="请输入密码" />
			  <label class="label" for="password2">确认密码：</label>
			  <input class="input" type="password" id="password2" name="password2" placeholder="请再次输入密码" />

			  <label class="label" for="image">验证码:</label>
			  <img class="input" id="captcha_img" name="captcha_img" src="./php/testimage.php?r='<?php echo rand(); ?>'" border="1" width="130" height="40" />
			  <a class="a" href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='./php/testimage.php?r='+Math.random();">看不清？</a> <br><br>
			  <label class="label" for="captcha">输入验证码：</label>
				
              <input class="input" type="text" id="captcha" name="captcha" placeholder="输入图片中的字符" />
			  <input type="submit" value="注册" " />
			
		</fieldset>
	</form>

</div>

</body>
</html>
