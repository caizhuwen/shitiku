<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户编辑界面</title>

<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
<script type="text/javascript" src="js\js.js"></script>

<style type="text/css">
#div1, #div2
{float:left; width:400px; height:300px; margin:10px;padding:10px;border:1px solid #aaaaaa;}
</style>

<script type="text/javascript">
function allowDrop(ev)
{
ev.preventDefault();
}

function drag(ev)
{
ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev)
{
ev.preventDefault();
var data=ev.dataTransfer.getData("Text");
ev.target.appendChild(document.getElementById(data));
}
</script>

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

<!--音频播放-->
  <form action="" method="post">           
  <audio controls="controls">
  <source src="video/ai.ogg" type="audio/ogg">
  <source src="video/ai.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
  </audio>
   </form> 
 
  
<!--拖放图片-->
<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
  <img src="images/logtitlebg.jpg" draggable="true" ondragstart="drag(event)" id="drag1" />
</div>
<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>



 </div>
 
  <!-- 框架底部内容-->
<?php    
	require_once('footer.php');
?>
<!--window.history.back-->


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
