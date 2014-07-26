<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑试题页面</title>
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
//去除所有的警告
error_reporting(E_ALL & ~E_NOTICE); 

//如果没有试题号
if(!$_POST["num"]){
echo"<h3>管理所有试题</h3><p>";
include("conn.php");
//数据库查询语句
$sql="select * from  question where deletes='0' ";
//数据库sql语句执行
$rs=mysql_query($sql);
if(!$rs){
	die("erro".mysql_error());
}
$num=mysql_num_rows($rs);
if($num==0){
echo "没有任何试题！<p>点<a href=add.php>这里</a>添加试题";
}
//如果试题数量不为0
else{
        echo"<table border=\"3\" cellspacing=\"0\" cellpadding=\"1\"  bordercolordark=\"#FFFFFF\"   bordercolorlight=\"#0000FF\" width=\"100%\">";
		
		echo"<tr background=\"images/top1.jpg\">";
		echo"<td>试题号</td>";
		echo"<td>题型编号</td>";
		echo"<td>所属类别</td>";
		echo"<td>题目内容</td>";
	    echo"<td>选项A</td>";
        echo"<td>选项B</td>";
        echo"<td>选项C</td>";
        echo"<td>选项D</td>";
		echo"<td>答案</td>";
		echo"<td>分值</td>";
		echo"<td >操作</td>";
		
		print("</tr>");
		
		//逐行输出
		while($row=mysql_fetch_array($rs))
		{
			echo"<tr  bgcolor=\"#FFFFFF\">";
			echo"<td>".$row['num']."</td>";
			echo"<td>".$row['typenum']."</td>";
			echo"<td>".$row['subject']."</td>";
			echo"<td>".$row['title']."</td>";
			echo"<td>".$row['chooseA']."</td>";
			echo"<td>".$row['chooseB']."</td>";
			echo"<td>".$row['chooseC']."</td>";
			echo"<td>".$row['chooseD']."</td>";
			echo"<td>".$row['answer']."</td>";
			echo"<td>".$row['value']."</td>";
			
			//print("<td ><a href=deletes.php?num=".$row['num'].">删除</a> <a href=change.php?num=".$row['num'].">修改</a></td>");
		   echo"<td ><a href=\"javascript:if(confirm('您确定要删除吗？')){location.href='deletes.php?num=".$row['num']." ' }\">删除</a> <a href=change.php?num=".$row['num']." >修改</a></td>";
			
			echo"</tr>";
			
		}
		//打印表尾
		echo"</table>";
	  
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