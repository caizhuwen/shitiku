
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新建类别页面</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
<script  >

//检测输入信息
function check(f){
			
			
			if(f.subject.value==""){
				alert("请输入类别名称！");
				f.subject.focus();
				return (false);
			}
			if(f.subjecte.value==""){
				alert("请输入科目名称！");
				f.subjecte.focus();
				return (false);
			}
				
}



</script>
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


<form action="styleadd_todb.php" method="post"  onsubmit="return check(this)" enctype="multipart/form-data" >


<fieldset><legend>新建类别:</legend>


  <p><label>科目名称:</label>
  <select type="text"  name="subjecte" checked="checked">
  <option value="web">web</option> </select>
  </p>
 
  <p><label>类别名称:</label>
  <input type="text"  name="subject" /> 
  </p>
  
  <p id="image" align="certer"><label>上传图片</label>
   <input  type="file" name="file" id="file" width="100px" height="10px" value="浏览"/>
  </p>
  
  </fieldset>
 <p>  <input type="submit" name="Submit" value="确认" style="font-size:20px" /></p> 
   
 </form>
 
 
 
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

