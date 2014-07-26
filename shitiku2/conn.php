<?php
//连接数据库
$conn=mysql_connect("localhost","root","") or die("can't connect!");
//选择当前数据库名
$db=mysql_select_db("shitiku") or die("can't open database!");
//指定字符集，防止中文乱码
$sql="SET  NAMES  'utf8'";
////执行$sql变量的语句
mysql_query($sql);



?>