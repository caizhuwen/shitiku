<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查询试题页面</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
</head>

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
//引入数据库连接文件
include("conn.php");
//获取输入的内容
$key_word=$_POST["checknum"];

//数据库查询语句
//$sql="select * from  question where title like ('%".$key_word."%')";
$sql="select * from  question where (".$_POST['check_method']." like ('%".$key_word."%')) order by num asc";


//数据库sql语句执行
$rs=mysql_query($sql);

if($rs){
       echo"<table border=\"1\" cellspacing=\"0\" cellpadding=\"1\" bordercolordark=\"#FFFFFF\" bordercolorlight=\"#0000FF\" background=\"images/top1.jpg\" width=\"100%\" >";
		
		echo"<tr>";
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
		    echo"</tr>";
			
		}
		//打印表尾
		echo"</table>";
}
	  

?>

 
 
 </div>
 
 <?php
	require_once('footer.php');
?>

</body>
</html>