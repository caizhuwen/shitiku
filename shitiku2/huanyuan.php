<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>还原试题页面</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
</head>


<body>
<?php
//引入数据库连接文件
include("conn.php"); 
//去除所有的错误警告
error_reporting(E_ALL & ~E_NOTICE); 

//还原指定的试题
 $sql="update question set deletes='0' where num='".$_GET["num"]."'";
//还原指定的试题类别
 $sqll="update style_info set deletes='0' where subject='".$_GET["subject"]."' ";

//执行sql语句
$re= mysql_query($sql);
$rel=mysql_query($sqll);

//删除后跳转页面
if($rel&&$rel)
{
print("<script>");
print("alert('还原成功！');");
print("window.location='huishou.php';");
print("</script>");
}
?>

</body>
</html>
