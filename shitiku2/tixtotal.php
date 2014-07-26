<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>题型统计</title>
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
<div id="Middle" class="dialog_body"  >

<table width="80%"  border="1" align="center" cellpadding="0" cellspacing="1" background="images/top1.jpg" >

      <tr>
        <td height="35"  colspan="2" align="center" >试题题型统计</td>
      </tr>
    
      <tr>
        <td align="center" bgcolor="#FFFFFF" height="27">试题题型</td>
        <td align="center" bgcolor="#FFFFFF">数据库内试题</td>
      </tr>
      
      <?php 
	  include("conn.php");
	  $sql="select typenum, count(*) from question where deletes='0' group by typenum";
	  $res=mysql_query($sql);
	  while($arr=mysql_fetch_row($res)){
	  echo "<tr height='30'>";
	  echo "<td align='center' bgcolor='#FFFFFF'>".$arr[0]."</td>";
	  echo "<td align='center' bgcolor='#FFFFFF'>该题型试题共有：".$arr[1]."道</td>";
	  echo "</tr>";
	  }
	  ?>

      
      
      </table>

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