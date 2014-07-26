
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加试题页面</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
<script  >

//检测输入信息
function check(f){
			
			
			if(f.typenum.value==""){
				alert("请输入试题题型！");
				f.typenum.focus();
				return (false);
			}
			
			if(f.subject.value==""){
				alert("请输入所属类别！");
				f.subject.focus();
				return (false);
			}
			
			
			if(f.title.value==""){
				alert("请输入题目内容！");
				f.title.focus();
				return (false);
			}
			if(f.answer.value==""){
				alert("请输入题目答案！");
				f.answer.focus();
				return (false);
			}
			if(f.choose.value==""){
				alert("请输入选项！");
				f.choose.focus();
				return (false);
			}
			if(f.value.value==""){
				alert("请输入分值！");
				f.value.focus();
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


<form action="add_todb.php" method="post"  onsubmit="return check(this)" >


<fieldset><legend>添加试题:</legend>
 
    
<p><label>试题题型: </label>
<select type="text"  name="typenum" checked="checked">
   <option value="是非题">是非题</option>
   <option value="简答题">简答题</option>
 </select></p>
 
<p><label>所属类别:</label> 
<select type="text"  name="subject" checked="checked">
   <option value="CSS">CSS</option>
  <option value="PHP">PHP</option>
  <option value="HTML">HTML</option>
  <option value="JS">JS</option>
 </select></p>
   
   
<p><label>题目分值:</label>
 <input type="text"  name="value" /> </p>

<p><label>题目内容:</label> 
<textarea id="intro" name="title" rows="4" cols="60" style="resize:none;"></textarea></p>

<p><label>选项:</label> 
<textarea id="intro" name="choose" rows="4" cols="60" style="resize:none;"></textarea></p>

<p><label>题目答案: </label>
<textarea id="intro" name="answer" rows="4" cols="60" style="resize:none;"></textarea></p>

  
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

