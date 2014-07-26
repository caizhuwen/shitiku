<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>

<script type="text/javascript">
function writeText(txt)
{
document.getElementById("desc").innerHTML=txt
}
</script>

</head>

<?php
 //去除所有的警告
error_reporting(E_ALL & ~E_NOTICE); 

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
<div id="Middle" class="dialog_body" >

 
<?php
    echo"<div id=\"txt\"  class=\"txt1\"></div>";
	
?>
         
 <div class="exit" align="center" style="color:#000; font-size:30px;" >
欢迎您,<?php echo $_SESSION['userName'];?>同学！</div>    

<p>
<img id="image" border="0" src="images/tp.jpg" 
width="800" height="600" usemap="#map"/>
<map name="map">
<area shape="rect" coords="0, 0, 300  ,300" href="html.php"  alt="html" onMouseOver="writeText('点击这里进入HTML试题')" />
<area shape="circle" coords="129 ,161 ,100" href="css.php"  alt="css" onMouseOver="writeText('点击这里进入CSS试题')" />
<area shape="circle" coords="500 ,500 ,200"  href="php.php" alt="php" onMouseOver="writeText('点击这里进入PHP试题')"/>
</map>
</p>

<p id="desc"></p>

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
