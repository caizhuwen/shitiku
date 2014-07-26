<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--======================-->
<!-----修改试题页面         -->
<!--written by caizhuwen  -->
<!--built time:  2014-6-1 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改试题页面</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
<style type="text/css"> 
  .input{     
   width:800px;  
   height:70px;
    }
</style>

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
 		
 	//如果提供试题号
		$num=$_GET["num"];
		include("conn.php");
		
		//如果没有提交内容，则显示前台
		if(!$_POST["typenum"]){
		echo"<script language=\"javascript\">
		function check(f){
			if(f.typenum.value==\"\")
			{
				alert(\"请输入题型编号！\");
				f.typenum.focus();
				return (false);
			}
			
			if(f.subject.value==\"\")
			{
				alert(\"请输入所属类别！\");
				f.subject.focus();
				return (false);
			}
			if(f.title.value==\"\")
			{
				alert(\"请输入题目！\");
				f.title.focus();
				return (false);
			}
			
			if(f.answer.value==\"\")
			{
				alert(\"请输入答案！\");
				f.answer.focus();
				return (false);
			}
			
			if(f.value.value==\"\")
			{
				alert(\"请输入分值！\");
				f.value.focus();
				return (false);
			}
			
			
		}
		
		</script>";
		
		$sql="select * from  question where num='".$num."'";
		//获取指定试题的所有信息
		$rs=mysql_query($sql);
		//从查询结果里面获取一行数据
		$row=mysql_fetch_array($rs);
		 echo"<table border=\"1\" cellspacing=\"0\" cellpadding=\"1\" bordercolordark=\"#FFFFFF\" bordercolorlight=\"#0000FF\" width=\"80%\">";
		 
		echo"<form method=post action=change.php?num=".$num." onsubmit=\"return check(this)\"> ";
		echo"<tr><td colspan=\"2\" align=\"center\" height=\"30\" background=\"images/top1.jpg\"> 试题内容:</td></tr>";
		echo"<tr>";
		echo"<td>试题号:</td><td>".$row['num']."</td>";
		echo"</tr>";
		echo"<input type=hidden name=oldtypenum value=".$row['typenum'].">";
		echo"<input type=hidden name=oldsubject value=".$row['subject'].">";
		echo"<input type=hidden name=oldtitle value=".$row['title'].">";
		echo"<input type=hidden name=oldchooseA value=".$row['chooseA'].">";
		echo"<input type=hidden name=oldchooseB value=".$row['chooseB'].">";
		echo"<input type=hidden name=oldchooseC value=".$row['chooseC'].">";
		echo"<input type=hidden name=oldchooseD value=".$row['chooseD'].">";
		echo"<input type=hidden name=oldanswer value=".$row['answer'].">";
		echo"<input type=hidden name=oldvalue value=".$row['value'].">";
		
		echo"<tr>";
		echo"<td>题型编号:</td><td><input type=text name=typenum value=".$row['typenum']." ></td>";
		echo"</tr>";
		
		echo"<tr>";
		echo"<td>所属类别:</td><td><input type=text name=subject value=".$row['subject']." ></td>";
		echo"</tr>";
		
		echo"<tr>";
		echo"<td>题目内容:</td><td><input  class=\"input\" type=text name=title value=".$row['title']." ></td>";
		echo"</tr>";
		
		echo"<tr>";
		echo"<td>选项A:</td><td><input type=text   class=\"input\" name=chooseA value=".$row['chooseA']." ></td>";
		echo"</tr>";
		
		echo"<tr>";
		echo"<td>选项B:</td><td><input type=text   class=\"input\" name=chooseB value=".$row['chooseB']." ></td>";
		echo"</tr>";
		
		echo"<tr>";
		echo"<td>选项C:</td><td><input type=text   class=\"input\" name=chooseC value=".$row['chooseC']." ></td>";
		echo"</tr>";
		
		echo"<tr>";
		echo"<td>选项D:</td><td><input type=text   class=\"input\" name=chooseD value=".$row['chooseD']." ></td>";
		echo"</tr>";
		
		echo"<tr>";
		echo"<td>题目答案:
		</td><td><input type=text name=answer   class=\"input\" value=".$row['answer']." ></td>";
		echo"</tr>";
		
		echo"<tr>";
		echo"<td>题目分值:</td><td><input type=text name=value value=".$row['value']." ></td>";
		echo"</tr>";
		
	
		
		echo"<tr>";
		echo"<td colspan=\"2\" align=\"center\" background=\"images/top1.jpg\" height=\"30\"> <input type=submit value= \"提交修改\"> <input type=button value=\"放弃修改\" onclick=history.go(-1)></td> " ;
		echo"</tr>";
		echo"</form>";
		echo"</table>";
		}
		
		
		
//如果提交内容，则进行后台处理	
else{
  //获取新数据
   $typenum=$_POST["typenum"];
   $subject=$_POST["subject"];
	$title=$_POST["title"];
	$chooseA=trim($_POST['chooseA']);
	$chooseB=trim($_POST['chooseB']);
	$chooseC=trim($_POST['chooseC']);
	$chooseD=trim($_POST['chooseD']);
    $answer=$_POST["answer"];
	 $value=$_POST["value"];
	
	 //获取原数据
	 $oldtypenum=$_POST["oldtypenum"];
    $oldsubject=$_POST["oldsubject"];
    $oldtitle=$_POST["oldtitle"];
	$oldchooseA=trim($_POST['oldchooseA']);
	$oldchooseB=trim($_POST['oldchooseB']);
	$oldchooseC=trim($_POST['oldchooseC']);
	$oldchooseD=trim($_POST['oldchooseD']);
    $oldanswer=$_POST["oldanswer"];
	$oldvalue=$_POST["oldvalue"];
	
	 
//更新数据
	 $sql="update question set typenum='".$typenum."' , subject='".$subject."',title='".$title."',chooseA='".$chooseA."',chooseB='".$chooseB."',chooseC='".$chooseC."',chooseD='".$chooseD."',answer='".$answer."',value='".$value."' where num='".$num."' ";
	
//执行sql插入
$re=mysql_query($sql);
	
if($re)
{
//执行成功后返回
echo"<meta http-equiv=\"refresh\" content=\"0; url=bianjst.php\">";
print("<script>");
print("alert('修改成功！');");
print("</script>");
	
} 
else{
echo"<meta http-equiv=\"refresh\" content=\"0; url=bianjst.php\">";
print("<script>");
print("alert('更新试题失败！');");
print("</script>");
}

}
	 

 
 ?>
 
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