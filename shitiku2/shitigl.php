<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>试题管理界面</title>

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
  <form action="" method="post">           
  <?php
include("conn.php");
$sql="select * from  style_info where deletes='0' order by id asc";
//数据库sql语句执行
$rs=mysql_query($sql);
if(!$rs){
	die("erro".mysql_error());
}
$num=mysql_num_rows($rs);

if($num==0){
echo "没有任何类别！<p>点<a href=styleadd.php>这里</a>添加试题";
}
//如果类别不为0
else{
       
       echo"<table border=\"3\" cellspacing=\"0\" cellpadding=\"1\"  bordercolordark=\"#FFFFFF\"   bordercolorlight=\"#0000FF\"  width=\"100%\">";
		
		echo"<tr background=\"images/top1.jpg\" height=\"30\">";
		echo"<td>类别</td>";
		echo"<td>时间</td>";
		echo"<td>图片</td>";
		echo"</tr>";
		
		//逐行输出
		while($row=mysql_fetch_array($rs))
		{
			echo"<tr  bgcolor=\"#FFFFFF\">";
			echo"<td>".$row['subject']."</td>";
			echo"<td>".$row['time']."</td>";
			echo"<td><img src=".$row['picture']."  width='300px' height='250px' usemap=\"#map\"/>
			<map name=\"map\">
            <area shape=\"rect\" coords=\"0 0 300 300\" href=\"bianjst.php\" alt=\"bianjst\" />
		    </map>
			</td>";
			echo"</tr>";
			
		}
		//打印表尾
		echo"</table>";
	  
        }

		?>
        
        </form>  
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
