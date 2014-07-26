<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--======================-->
<!-----彻底删除试题页面           -->
<!--written by caizhuwen  -->
<!--built time:  2014-6-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>彻底删除试题页面</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
</head>


<body>
<?php
//引入数据库连接文件
include("conn.php"); 
//删除指定信息语句
 $sql="delete from question where num='".$_GET["num"]."'";
 
 //执行sql语句
mysql_query($sql);
//删除后跳转转页面
print("<script>");
print("alert('彻底删除成功！');");
print("window.location='huishou.php';");
print("</script>");
?>

</body>
</html>
