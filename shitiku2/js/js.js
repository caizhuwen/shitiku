// JavaScript Document

//用户编号
function numcls()
{  
//捕获触发事件的对象，并设置为以下语句的默认对象
	var userNum=document.getElementById("num");
//如果当前值为默认值，则清空
	if(userNum.value=="请输入用户编号")
		userNum.value="";
}


function numres()
{
//捕获触发事件的对象，并设置为以下语句的默认对象
	var userNum=document.getElementById("num");
//如果当前值为空，则重置为默认值
	if(userNum.value=="")
		userNum.value="请输入用户编号";
		 if(document.getElementById("num").value.length>5&& document.getElementById("num").value!="请输入用户编号")
	        {
		     document.getElementById("checkNum").style.display="inline";
	        }	
			else{
			 document.getElementById("checkNum").style.display="none";
			 }
}





//用户姓名
function namecls()
{  
//捕获触发事件的对象，并设置为以下语句的默认对象
	var userName=document.getElementById("name");
//如果当前值为默认值，则清空
	if(userName.value=="请输入用户姓名")
		userName.value="";
}


function nameres()
{
//捕获触发事件的对象，并设置为以下语句的默认对象
	var userName=document.getElementById("name");
//如果当前值为空，则重置为默认值
	if(userName.value=="")
		userName.value="请输入用户姓名";
		 if(document.getElementById("name").value.length>10&& document.getElementById("name").value!="请输入用户姓名")
	        {
		     document.getElementById("checkName").style.display="inline";
	        }	
			else{
			 document.getElementById("checkName").style.display="none";
			 }
}


//用户密码
function pwdcls()
{
	var userPwd=document.getElementById("pwd");
	if(userPwd.value=="请输入用户密码")
	{
		userPwd.type="password";
		userPwd.value="";
	
	}
}

function pwdres()
{
	var userPwd=document.getElementById("pwd");
	if(userPwd.value=="")
	{
		userPwd.type="text";
		userPwd.value="请输入用户密码";
	}
	  if(document.getElementById("pwd").value.length>6&& document.getElementById("pwd").value!="请输入用户密码")
	        {
		     document.getElementById("checkpwd").style.display="inline";
	        }	
			else{
			 document.getElementById("checkpwd").style.display="none";
			 }
}


//用户确认密码
function repwdcls()
{
	var userPwd=document.getElementById("repwd");
	if(userPwd.value=="请确认用户密码")
	{
		userPwd.type="password";
		userPwd.value="";
	
	}
}

function repwdres()
{
	var userPwd=document.getElementById("repwd");
	if(userPwd.value=="")
	{
		userPwd.type="text";
		userPwd.value="请确认用户密码";
	}
	  if(document.getElementById("repwd").value.length>6&& document.getElementById("repwd").value!="请确认用户密码")
	        {
		     document.getElementById("checkrepwd").style.display="inline";
	        }	
			else{
			 document.getElementById("checkrepwd").style.display="none";
			 }
}



