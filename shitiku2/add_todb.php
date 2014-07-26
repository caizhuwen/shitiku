<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>add_todb</title>
</head>

<body>

  <?php
//连接数据库
  include("conn.php"); 
//屏蔽报错
 error_reporting(E_ALL ^ E_NOTICE); 
//获取数据
   $typenum=$_POST["typenum"];
   $subject=$_POST["subject"];
   $title=$_POST["title"];
   $chooseA=$_POST["chooseA"];
   $chooseB=$_POST["chooseB"];
   $chooseC=$_POST["chooseC"];
   $chooseD=$_POST["chooseD"];
   $answer=$_POST["answer"];
   $value=$_POST["value"];
//sql插入语句
$sql="insert into question(typenum,subject,title,chooseA,chooseB,chooseC,chooseD,answer,value,deletes)values('" .$typenum ."','".$subject."','" .$title."','" .$chooseA."','" .$chooseB."','" .$chooseC."','" .$chooseD."','" .$answer."','".$value."','0')";

//执行sql插入
$re=mysql_query($sql);

  if($re)
    {
//执行成功后跳转到首页
    print("<script>");
    print("alert('添加成功！');");
    print("window.location='bianjst.php';");
    print("</script>");
	
     }
   
 ?>
</body>
</html>