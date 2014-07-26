<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>类别管理</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
</head>

<?php

//去除所有的错误警告
error_reporting(E_ALL & ~E_NOTICE); 

//判断是否登录
session_start();
if(isset($_SESSION["userName"]))
{
?>

<body "> 

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
//如果没有试题号
if(!$_POST["id"]){
include("conn.php");
$sql="select * from  style_info where deletes='0' ";
//数据库sql语句执行
$rs=mysql_query($sql);
if(!$rs){
	die("erro".mysql_error());
}
$id=mysql_num_rows($rs);
if($id==0){
echo "没有任何类别！<p>点<a href=styleadd.php>这里</a>添加试题";
}
//如果试题数量不为0
else{
        echo"<table border=\"3\" cellspacing=\"0\" cellpadding=\"1\"  bordercolordark=\"#FFFFFF\"   bordercolorlight=\"#0000FF\" width=\"97%\">";
		
		print("<tr background=\"images/top1.jpg\" height=\"35\">");
		print("<td>类别名称</td>");
		print("<td>科目名称</td>");
		print("<td >操作</td>");
		print("</tr>");
		
		//逐行输出
		while($row=mysql_fetch_array($rs))
		{
			print("<tr  bgcolor=\"#FFFFFF\">");
			print("<td>".$row['subject']."</td>");
			print("<td>".$row['subjecte']."</td>");
			
			//print("<td ><a href=deleteslbgl.php?id=".$row['id']."&subject=".$row['subject']." >删除类别</a> <a href=changelbgl.php?id=".$row['id'].">修改类别</a></td>");
		print("<td ><a href=\"javascript:if(confirm('您确定要删除吗？')){location.href='deleteslbgl.php?id=".$row['id']."&subject=".$row['subject']." ' }\"} >删除类别</a> <a href=changelbgl.php?id=".$row['id'].">修改类别</a></td>");
			
			print("</tr>");
			
		}
		
		echo"<tr><td align=\"center\" height=\"30\"  background=\"images/top1.jpg\" colspan=\"3\"><a href=styleadd.php>新建类别</a></td></tr>";
		//打印表尾
		print("</table>");
	  
        }
		}
		
	

		
		
?> 



</div>


<div class="clr">
<?php
	require_once('footer.php');
?>
</div>


</body>
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
</html>
