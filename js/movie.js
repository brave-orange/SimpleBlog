function show()
{
	document.getElementById("mask").style.display="block";
	document.getElementById("playpage").style.display="block";
	document.getElementById("openbtn").style.display="block";
}
function show1()
{
	document.getElementById("player").src="dhxy.mp4";
	show();
}
function show2()
{
    document.getElementById("player").src="xjzw.mp4";
	show();
}
function hide(){
	document.getElementById("mask").style.display="none";
	document.getElementById("playpage").style.display="none";
	document.getElementById("openbtn").style.display="none";
	document.getElementById("player").src="";
	pause();
}
function pause(){
	document.getElementById("player").pause();
}