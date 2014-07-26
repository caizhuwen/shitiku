
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--======================-->
<!-----查询试题页面         -->
<!--written by caizhuwen  -->
<!--built time:  2014-5-29 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查询试题页面</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>


<script  >

//检测输入信息
function check(f){		
			
			if(f.checknum.value==""){
				alert("请输入查询信息！");
				f.checknum.focus();
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


<form action="search_todb.php" method="post"  onsubmit="return check(this)">
          <select name="check_method">
              <option value="num">编号查询</option>
              <option value="typenum">题型查询</option>
              <option value="title">题目查询</option>
              <option value="subject">模块查询</option>
              <option value="value">分值查询</option>
            </select> 
        	
             <input type="text" name="checknum" id="checknum" size="15"/>
             <input type="submit" name="button" id="button" value="查询" >
</form>





 </div>
 
 <?php
	require_once('footer.php');
?>

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