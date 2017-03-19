var num='';
function show(buff)
{	
	if(buff==null)
	{
		alert("参数出错！");
	}
	else
	{
		var str = "http://brave-orange.cn/php/article/"+buff+".txt";
                                     console.log(str);
		loadXMLDoc(str);       //使用Ajax动态加载网页内容
		document.getElementById("mask").style.display="block";
		document.getElementById("opendiv").style.display="block";
		document.getElementById("openbtn").style.display="block";
                                      LoadComment(buff);                                                                                 //使用Ajax动态加载网页内容

	}
            num = buff;
                    
}

function hide(){
	document.getElementById("mask").style.display="none";
	document.getElementById("opendiv").style.display="none";
	document.getElementById("openbtn").style.display="none";
}

function comment(comm)
{
    console.log(comm);
    var text = document.getElementById('comment').value;
    var url = "http://brave-orange.cn/php/php/push_comment.php?name="+comm+"&text="+text+"&id="+num;
    if(text==""||text==null)
    {
        alert("请填写评论内容！");
        return false;
    }  
    console.log(url);
    $.get(url);
    alert("评论成功！");
    document.getElementById('comment').value = "";
 }

function LoadComment(id)
{
    var url = "http://brave-orange.cn/php/php/LoadComment.php?id="+id;
    var str="<ul>";
    var data={};
    $.get(url,data,function(res){

        var jsonObj = eval("("+res+")");
        for(var i=0;i<jsonObj.length;i++)
        {
            str+="<li>"+"<p>"+jsonObj[i]['name']+":  "+jsonObj[i]['body']+"</p></li>"
        }
        str += "</ul><br><br><br><br><br>";
        
        document.getElementById('comm_list').innerHTML=str;
    });
  
  
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
    document.getElementById('opendiv1').innerHTML=xmlhttp.responseText;
    }
  else
    {
    alert("Problem retrieving data:" + xmlhttp.statusText);
    }
  }
}