<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--======================-->
<!-----用户登录            -->
<!--written by caizhuwen  -->
<!--built time:  2014-5-28-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>

<link href="css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js\js.js"></script>
</head>

<body>

	<!--  dialog start -->
	<div class="dialog">
    	<!--  dialog head start -->
    	<div class="dialong_head">
        	<div class="dialog_head_left"></div>
            <h1 class="dialog_head_middle"></h1>
            <div class="dialog_head_right"></div>
        </div>
        <div class="clear"></div>
        <!--  dialog head end-->
        
        <!--  dialog body start -->
        <div class="dialog_body">
        	<!--  user register content start-->
            
         <form action="loginck.php" method="post">
            	<ul>
                	<li>
                    	<span class="reg_prompt">用户姓名:</span>
                        <span class="reg_value"><input type="text" id="name" name="userName" value="请输入用户姓名" size="30" onfocus="namecls()" onblur="nameres()"/></span>
                    </li>
                 
                    <li>
                    	<span class="reg_prompt">用户密码:</span>
                        <span class="reg_value"><input type="text" id="pwd" name="pwd" value="请输入用户密码" size="30"  onfocus="pwdcls()" onblur="pwdres()"/></span>
                    </li>
                    
      
                    
                     <li>  <!--Math.random(1)使用 random() 来返回 0 到 1 之间的随机数--->
                    	<span class="reg_prompt">验证码：</span>
                        <span class="reg_value"> <input type="text" id="imgcode" name='imgcode' class="input" style="width:70px;"/> 
                        <img src="imgcode.php" name="codeimage" id="codeimage" onclick="this.src='imgcode.php?'+Math.random(1);" style="cursor:pointer;"> 
       
       <!--点击链接后不做任何事情-->        
                        <a href="javascript:void();" onclick="codeimage.src='imgcode.php?'+Math.random(1);" style="color:#06F;">换一张</a> 
                        
					
                    </li>
                    
                              
                    
              <li>
                    	<span class="submit"><input type="submit" value="登录" style="font-size:20px" onclick="javascript:window.close();"/></span>
                        <input type="reset" value="重置" style="font-size:20px"/>
                    </li> 
					
                <li class="zhuce">
                    	 没有账号请点击<a href="zhuce.php">注册</a>
                    </li>        
                    
                    
                    
                </ul>
            </form>
            <!--  user register content end-->
        </div>
        <!--  dialog body end -->
    </div>
    <!--  dialog end -->
   
    

<!--window.history.back-->
</body>

</html>
