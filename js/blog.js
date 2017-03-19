function show()
{
	
	document.getElementById("mask").style.display="block";
	document.getElementById("opendiv").style.display="block";
	document.getElementById("openbtn").style.display="block";
}
function show1(){
	
	loadXMLDoc("http://brave-orange.cn/php/article/1.txt");
	
	show();
	
}
function show2(){
	
	loadXMLDoc("http://brave-orange.cn/php/article/2.txt");
	show();
	
}
function show3(){
	
	loadXMLDoc("http://brave-orange.cn/php/article/3.txt");
	show();
	
}
function show4(){
	
	loadXMLDoc("http://localhost/php/article/4.txt");
	show();
	
}
function show5(){
	
	loadXMLDoc("http://brave-orange.cn/php/article/5.txt");
	show();
	
}
function show6(){
	
	loadXMLDoc("http://localhost/php/article/6.txt");
	show();
	
}
function show7(){
	
	loadXMLDoc("http://brave-orange.cn/php/article/7.txt");
	show();
	
}
function show8(){
	
	loadXMLDoc("http://brave-orange.cn/php/article/8.txt");
	show();
	
}

function hide(){
	document.getElementById("mask").style.display="none";
	document.getElementById("opendiv").style.display="none";
	document.getElementById("openbtn").style.display="none";
}

/*实现在文件中读取文章内容显示在遮罩div上*/
var xmlhttp;
function loadXMLDoc(url)
{
xmlhttp=null;
if (window.XMLHttpRequest)
  {// code for Firefox, Opera, IE7, etc.
  xmlhttp=new XMLHttpRequest();
  }
else if (window.ActiveXObject)
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
if (xmlhttp!=null)
  {
  xmlhttp.onreadystatechange=state_Change;
  xmlhttp.open("GET",url,true);
  xmlhttp.send(null);
  }
else
  {
  alert("Your browser does not support XMLHTTP.");
  }
}

function state_Change()
{
if (xmlhttp.readyState==4)
  {// 4 = "loaded"
  if (xmlhttp.status==200)
    {// 200 = "OK"
    document.getElementById('opendiv').innerHTML=xmlhttp.responseText;
    }
  else
    {
    alert("Problem retrieving data:" + xmlhttp.statusText);
    }
  }
}