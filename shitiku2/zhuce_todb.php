<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册认证</title>
</head>

<body>
<?php
//包含连接数据库文件
include("conn.php");

    //启动session
    session_start();

	$teacher_name = $_POST['userName'];
	$teacher_pwd = $_POST['pwd'];
	$teacher_pwd2 = $_POST['repwd'];
	

		//验证两次输入密码是否一致
		if ($teacher_pwd != $teacher_pwd2){
		echo "<script>";
		echo "alert('两次输入密码不一致，请重新输入！');";
		echo "window.history.back();";
		echo "</script>";
		}
		
			//添加用户信息，插入数据库teacher表中
			else {
				//把变量值传递给session
				$_SESSION['userName'] = $teacher_name;
				$_SESSION['pwd'] = $teacher_pwd;
				$sql = "insert into teacher(username,userpwd) values ('".$teacher_name."','".$teacher_pwd."')";
				//执行sql插入
                $re=mysql_query($sql);

               if($re){
				echo "<script>";
				echo "alert('注册成功，请使用新账号登录！');";
				echo "window.location = 'loginin.php';";
				echo "</script>";	
				}
			}

?>

</body>
</html>