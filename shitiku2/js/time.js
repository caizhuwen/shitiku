// JavaScript Document

function show(){	
	document.getElementById("time").innerHTML=new Date().toLocaleString();
	setTimeout("show()",1000);
	}
show();