<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>styleadd_todb</title>
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
//连接数据库
include("conn.php");
error_reporting(E_ALL ^ E_NOTICE); 

//获取数据
$subject=$_POST["subject"];
$subjecte=$_POST["subjecte"];

//函数设置用在脚本中所有日期/时间函数的默认时区
date_default_timezone_set('PRC');
$now=date("Y-m-d H:i:s");


    if($subject==NULL){
	    echo "<script>";
		echo "alert('题目类型不能为空！');";
		echo "window.location='developLog.php';";
		echo "</script>;";
      }
	//上传图片或文件 
	else {
     if ($_FILES["file"]["error"] > 0){
     echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
     }
    else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }	
		$name=$_FILES["file"]["name"];
		$filepath=	"upload/$name";
	
//sql插入语句
$sql="insert into style_info(subject,subjecte,time,picture,deletes)values('".$subject."','" .$subjecte."','".$now."','".$filepath."','0')";


//执行sql插入
$re=mysql_query($sql);
	
if($re)
{
//执行成功后跳转到首页
echo"<script>";
echo"alert('新建成功！');";
echo"window.location='stylegl.php';";
echo"</script>";
	
}
else{
echo"<script>";
echo"alert('新建不成功！');";
echo"window.history.back(-1);";
echo"</script>";	
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