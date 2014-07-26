
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--======================-->
<!-----添加试题页面         -->
<!--written by caizhuwen  -->
<!--built time:  2014-5-30-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加试题页面</title>
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
	$kind=$_POST["kind"];
	
	if($kind==1){
		echo"<script>";
		echo"window.location='add.php';";
		echo"</script>";
		}
	else if($kind==2){
		echo"<script>";
		echo"window.location='judge_add.php';";
		echo"</script>";
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

