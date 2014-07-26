<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户信息</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
</head>

<?php
//判断是否登录
session_start();
if(isset($_SESSION["userName"]))
{
?>


<body>

 <?php require_once('header.php');?>


<!--框架左边内容框显示-->
<div class="left" >  

<?php
	require_once('left.inc.php');
?>
</div>

<!--框架右边内容框显示-->
<div id="Middle" class="dialog_body">




<?php
//去除所有的错误警告
error_reporting(E_ALL & ~E_NOTICE); 

//如果用户已经登录
session_start(); 

//获取用户名，取回cookie值
$userName=$_COOKIE["user"];

		include("conn.php");
		$sql="select * from  teacher where username='".$userName."'";
//数据库sql语句执行
        $rs=mysql_query($sql);
        $row=mysql_fetch_array($rs);
		
		 echo"<table cellpadding=\"2\" cellspacing=\"1\" border=\"1\" width=\"70%\" align=\"center\" background=\"images/top1.jpg\">";
		
		echo"<form method=\"post\" action=\"userxx.php\" > ";
		
		echo"<tr><td align=\"center\" height=\"35\"  colspan=\"2\">用户信息</td></tr>";
		
		echo"<tr bgcolor=\"#FFFFFF\">";
		echo"<td> 用户编号:</td><td><input type=text name=usernum value=" .$row['usernum']." ></td>";
		echo"</tr>";
		
		echo"<tr  bgcolor=\"#FFFFFF\">";
		echo"<td> 用户名:</td><td><input type=text name=username value=" .$row['username']." ></td>";
		
		echo"</tr>";
		
		
		
		
		
		

?>
</table>


</form>
</div>


<div class="clr">
<?php
	require_once('footer.php');
?>
</div>

<?php
}
else
{
	echo"<script>";
	echo"alert('请先登录再访问！');";
	echo"window.location='loginin.php';";
	echo"</script>";
}
?>

</body>
</html>