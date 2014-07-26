<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码页面</title>
<link rel="stylesheet" type="text/css" href="css/yemianstyle.css"/>
<script  >
function check(f){
			if(f.pass.value==""){
				alert("请输入原密码！");
				f.pass.focus();
				return (false);
			}
			
			if(f.newpass.value==""){
				alert("请输入新密码！");
				f.newpass.focus();
				return (false);
			}
			
			
			if(f.newpass.value==f.pass.value){
				alert("新密码与原密码一致！");
				f.newpass.focus();
				return (false);
			}
			if(f.newpass.value!=f.repass.value){
				alert("重复密码与新密码不一致！");
				f.repass.focus();
				return (false);
			}
			document.userNameinfo.submit();
		}
            
  </script> 







</script>

</head>

<?php



//判断是否登录
session_start();
if(isset($_SESSION["userName"]))
{
?>

<body > 
 <?php require_once('header.php');?>


<!--框架左边内容框显示-->
<div class="left" >  

<?php
	require_once('left.inc.php');
?>
</div>

<?php
//去除所有的错误警告
error_reporting(E_ALL & ~E_NOTICE); 

 //获取登录信息
session_start();

//取回user的值
$teachername=$_COOKIE["user"];
//连接数据库
 include("conn.php");
 $sql="select userpwd from teacher where username='".$teachername."'";
 $rs=mysql_query($sql);
$rows=mysql_fetch_assoc($rs);
if($_POST["Submit"])
	{
	if($rows["userpwd"]==$_POST["pass"])
		{
		$newpassword=$_POST["newpass"];
        $sql="update teacher set userpwd='".$newpassword."' where username='".$teachername."'";
		mysql_query($sql);
		if(mysql_query($sql)){
		echo "<script language=javascript>alert('修改成功,请重新进行登陆！');window.location='loginin.php'</script>";
		 }
		exit();
		}
		else	
		{
?>

<script language="javascript">
			alert("原始密码不正确,请重新输入")
			location.href="changepwd.php";
		</script>
		<?php
		}
	}
		?>
        

<!--框架中间右边内容框显示-->
<div id="Middle" class="dialog_body">


<table cellpadding="3" cellspacing="1" width="70%"   border="1" align="center"  background="images/top1.jpg">
 <form action="changepwd.php" method="post" onsubmit="return check(this)">
 
 
 <tr><td align="center" height="35" colspan="2">用户修改密码</td></tr>
 
 <tr bgcolor="#FFFFFF"> 
      <td>用户名：</td>
      <td ><input type="text" name="name" value="<?php echo $teachername ?>" /></td>
    </tr>
 
 <tr bgcolor="#FFFFFF"> 
 <td >原密码:</td>
<td><input type="text" name="pass"  /></td>
</tr> 
 
 <tr bgcolor="#FFFFFF"> 
 <td >新密码:</td>
<td><input type="password" name="newpass"  /></td>
</tr> 

<tr bgcolor="#FFFFFF"> 
 <td >确认新密码:</td>
<td><input type="password" name="repass"  /></td>
</tr> 
 
 <tr>
 <td> <input type="submit"  type="submit" name="Submit" value= "提交修改"></td>
 <td> <input type="button" value="放弃修改" onclick=history.go(-1)></td>
 </tr>
 


          </form>
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
