<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php试题界面</title>

<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
<script type="text/javascript" src="js\js.js"></script>
</head>

<?php
//去除所有的错误警告
error_reporting(E_ALL & ~E_NOTICE); 

//判断是否登录
session_start();
if(isset($_SESSION["userName"]))
{
?>

<body>
<!-- 框架头部内容-->
<?php require_once('header.php');?>

 <!-- 框架中间内容-->
<!--框架左边内容框显示-->
<div class="left" >  

<?php
	require_once('left.inc.php');
?>
</div>

<!--框架右边内容框显示-->
<div id="Middle" class="dialog_body">      
 <form action="php.php" method="post" class="last">   
 <?php
//如果没有试题号
if(!$_POST["subject"]){
echo"<h3>PHP试题</h3><p>";
include("conn.php");
$sql="select * from  question where subject='PHP' and deletes='0'";
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
       echo"<table border=\"3\" cellspacing=\"0\" cellpadding=\"1\"  bordercolordark=\"#FFFFFF\"   bordercolorlight=\"#0000FF\"  width=\"100%\">";
		
		echo"<tr background=\"images/top1.jpg\" height=\"30\">";
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
		
		echo"</tr>";
		
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
			
			
		echo"<td ><a href=\"javascript:if(confirm('您确定要删除吗？')){location.href='deletes.php?num=".$row['num']." ' }\">删除</a> <a href=change.php?num=".$row['num']." >修改</a></td>";
			
			echo"</tr>";
			
		}
		//打印表尾
		echo"</table>";
	  
        }
		}
		?>
    
            
         </form> 
        </div>
 
  <!-- 框架底部内容-->
<?php    
	require_once('footer.php');
?>
<!--window.history.back-->
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
