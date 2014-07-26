<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--======================-->
<!-----loginck            -->
<!--written by caizhuwen  -->
<!--built time:  2014-5-28-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>loginck</title>
</head>

<body>

<?php

//启动session
session_start(); 

//获取用户名
$userName=$_POST["userName"];
//获取密码
$userPwd=$_POST["pwd"];

$_SESSION["userName"]=$userName;

//设计cookie值
setcookie("user",$userName,time()+3600*24*365);

//获取验证码
$code=$_POST["imgcode"];

//引入数据库连接文件
include("conn.php");
//数据库查询语句
$sql="select * from teacher where username='".$userName."' ";

//数据库sql语句执行
$rs=mysql_query($sql);

//读取查询记录集
//$row=mysql_fetch_row($rs);
$row=mysql_fetch_array($rs);


//记录为空
if(!$row[0])
{
	//出错处理
	print("<script>");
	print("alert('用户信息有误！');");
	print("window.history.back(-1);");
	print("</script>");
	
	
	}
	

//记录不为空
else
{
	//检测密码
	if( $userPwd!=$row["userpwd"]){

		print("<script>");
		print("alert('密码错误！');");
		print("window.history.back(-1);");
		print("</script>");
	}
	//检验验证码
	else if(empty($code)){
				print("<script>");
	            print("alert('验证码不能为空!');");
				print("window.history.back(-1);");
	            print("</script>");
				
			}
		else if($code!=$_SESSION['imgcode']){
				print("<script>");
	            print("alert('验证码不正确，请检查！');");
				print("window.history.back(-1);");
	            print("</script>");
				
			}
	//以上都信息正确，登录成功
	else
	{
		print("<script>");
		print("alert('登录成功');");
		print("window.location='index.php';");
		print("</script>");
		
	}
}

?>






</body>
</html>