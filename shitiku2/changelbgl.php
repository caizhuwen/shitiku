<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改类别页面</title>
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
		$id=$_GET["id"];
		include("conn.php");
		
		//如果没有提交内容，则显示前台
		if(!$_POST["subject"]){
		echo"<script language=\"javascript\">
		function check(f){
			
			if(f.subject.value==\"\")
			{
				alert(\"请输入类别名称！\");
				f.subject.focus();
				return (false);
			}
			if(f.subjecte.value==\"\")
			{
				alert(\"请输入科目名称！\");
				f.subjecte.focus();
				return (false);
			}
			
		}
		
		</script>";
		
		$sql="select * from style_info where id='".$id."'";
		//获取指定试题的所有信息
		$rs=mysql_query($sql);
		//从查询结果里面获取一行数据
		$row=mysql_fetch_array($rs);
		 echo"<table border=\"1\" cellspacing=\"0\" cellpadding=\"1\" bordercolordark=\"#FFFFFF\" bordercolorlight=\"#0000FF\" width=\"80%\">";
		 
		echo"<form method=post action=changelbgl.php?id=".$id." onsubmit=\"return check(this)\"> ";
		echo"<tr>";
		echo"<td colspan=\"2\" align=\"center\" height=\"30\" background=\"images/top1.jpg\"> 试题内容:</td>";
		echo"</tr>";
		
		echo"<tr  bgcolor=\"#FFFFFF\">";
		echo"<td>类型号:</td><td>".$row['id']."</td>";
		echo"</tr>";
		
		echo"<tr  bgcolor=\"#FFFFFF\">";
		echo"<td>上传时间:</td><td>".$row['time']."</td>";
		echo"</tr>";
		
		echo"<input type=hidden name=oldsubject value=".$row['subject'].">";
		echo"<input type=hidden name=oldsubjecte value=".$row['subjecte'].">";
		

		
		echo"<tr  bgcolor=\"#FFFFFF\">";
		echo"<td>类别名称:</td><td><input type=text name=subject value=".$row['subject']." ></td>";
		echo"</tr>";
		
		
		echo"<tr  bgcolor=\"#FFFFFF\">";
		echo"<td>科目名称:</td><td><input type=text name=subjecte value=".$row['subjecte']." ></td>";
		echo"</tr>";
		
		echo"<tr  bgcolor=\"#FFFFFF\">";
		echo"<td>图片:</td><td><img src=".$row['picture']."  width='300px' height='250px' usemap=\"#map\"/>
		<map name=\"map\">
        <area shape=\"rect\" coords=\"0 0 300 300\" href=\"bianjst.php\" alt=\"bianjst\" />
		</map>
		</td>";
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
   
   $subject=$_POST["subject"];
   $subjecte=$_POST["subjecte"];
	
	 //获取原数据	
    $oldsubject=$_POST["oldsubject"];
     $oldsubjecte=$_POST["oldsubjecte"];
	
	 
	 //更新数据
	 $sql="update style_info set subject='".$subject."',subjecte='".$subjecte."' where id='".$id."' ";
	  $sqll="update question set subject='".$subject."' where subject='".$oldsubject."'  ";
	//执行sql插入
$re=mysql_query($sql);
$rel=mysql_query($sqll);
	
if($re&&$rel)
{
//执行成功后返回
echo"<meta http-equiv=\"refresh\" content=\"0; url=stylegl.php\">";
print("<script>");
print("alert('修改成功！');");
print("</script>");
	
} 
else{
echo"<meta http-equiv=\"refresh\" content=\"0; url=bianjst.php\">";
print("<script>");
print("alert('修改失败！');");
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