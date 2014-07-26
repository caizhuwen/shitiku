<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>退出系统页面</title>

</head>

<body > 
  <?php
 //去除所有的警告
error_reporting(E_ALL & ~E_NOTICE); 

setcookie("user","",time()-3600*24*365);
session_start();
if($action=='loginout'){
	
	session_unset();
	session_destroy();
}

?>
<script language="javascript">
alert("成功退出系统！");
location.href="loginin.php";
</script>


</body>
</html>
