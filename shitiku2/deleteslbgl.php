<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--======================-->
<!-----类别统计            -->
<!--written by caizhuwen  -->
<!--built time:  2014-6-6 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除类别页面</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
</head>


<body>
<?php
//引入数据库连接文件
 include("conn.php");
  
  //sql删除指定信息语句
 $sqll="update question set deletes='1' where subject='".$_GET["subject"]."' ";
 $sql="update style_info set deletes='1' where id='".$_GET["id"]."'";
 
 //执行sql语句
$re= mysql_query($sql);
$rel=mysql_query($sqll);

//删除后跳转页面
if($rel&&$rel)
{
print("<script>");
print("alert('删除成功！');");
print("window.location='stylegl.php';");
print("</script>");
}


?>

</body>
</html>
