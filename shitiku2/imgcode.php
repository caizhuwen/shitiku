<?php

/*** 验证码*/

session_start();

//设置图像的宽度和高度
$x_size = 60;
$y_size = 20;

//产生一个长度为四位的数字作为验证码
$seccode = code_random(4);
$_SESSION['imgcode'] = $seccode;

if(function_exists('imagecreate') && function_exists('imagecolorallocate') &&
function_exists('imagesetpixel') && function_exists('imageString') && function_exists('imagedestroy') && function_exists('imagefilledrectangle') && function_exists('imagerectangle') && (function_exists('imagepng') || function_exists('imagejpeg'))) {
	$aimg = imagecreate($x_size, $y_size);    //创建一个大小为x_size和y_size的空白图像
	$back = imagecolorallocate($aimg, 0xFF, 0xFF, 0xFF);     //创建调色板,设置图片背景色
	$border = imagecolorallocate($aimg, 0xCC, 0xCC, 0xCC);  //创建调色板,设置边框颜色
	imagefilledrectangle($aimg, 0, 0, $x_size - 1, $y_size - 1, $back);  //从0,0点填充59*19的白色矩形区域
	imagerectangle($aimg, 0, 0, $x_size - 1, $y_size - 1, $border);     //从0,0点绘制59*19的黑色矩形边框


//在图片中加入20个干扰象素，干扰颜色 
	for($i=1; $i<=20;$i++){
		$dot = imagecolorallocate($aimg,mt_rand(50,255),mt_rand(50,255),mt_rand(50,255));  //创建调色板,定义颜色
		imagesetpixel($aimg,mt_rand(2,$x_size-2), mt_rand(2,$y_size-2),$dot);   //在图片中用dot定义的颜色画点
    }  

    imageline($aimg,mt_rand(1,5),mt_rand(1,$y_size),mt_rand(5,$x_size/2),mt_rand(1, $y_size),$dot);
    imageline($aimg,mt_rand($x_size/2,($x_size/2)+5),mt_rand(1, $y_size),mt_rand(($x_size/2+5),$x_size),mt_rand(1, $y_size),$dot);
    
//验证码随机颜色 
    for($i = 0; $i < strlen($seccode); $i++) {
		imageString($aimg, mt_rand(4,5), $i * $x_size / 4 + mt_rand(2, 5), mt_rand(1, 6), $seccode[$i], imagecolorallocate($aimg, mt_rand(50, 255), mt_rand(0, 120), mt_rand(50, 255)));
    }

	header("Pragma:no-cache");
	header("Cache-control:no-cache");

//将GD 图像流aimg以png格式输出到标准输出
    if(function_exists('imagepng') && imagepng($aimg)) {
        header("Content-type: image/png");
        imagepng($aimg);
    } else {
        header("Content-type: image/jpeg");
        imagejpeg($aimg);
    }

//释放与aimg 关联的内存
    imagedestroy($aimg);   
	exit;
} else {

	header("Pragma:no-cache");
	header("Cache-control:no-cache");
	header("ContentType: Image/BMP");
	
	
    //Chr(<数值表达式>):返回以数值表达式值为编码的字符
	$Color[0] = chr(0).chr(0).chr(0);
	$Color[1] = chr(255).chr(255).chr(255);
	$_Num[0]  = "1110000111110111101111011110111101001011110100101111010010111101001011110111101111011110111110000111";
	$_Num[1]  = "1111011111110001111111110111111111011111111101111111110111111111011111111101111111110111111100000111";
	$_Num[2]  = "1110000111110111101111011110111111111011111111011111111011111111011111111011111111011110111100000011";
	$_Num[3]  = "1110000111110111101111011110111111110111111100111111111101111111111011110111101111011110111110000111";
	$_Num[4]  = "1111101111111110111111110011111110101111110110111111011011111100000011111110111111111011111111000011";
	$_Num[5]  = "1100000011110111111111011111111101000111110011101111111110111111111011110111101111011110111110000111";
	$_Num[6]  = "1111000111111011101111011111111101111111110100011111001110111101111011110111101111011110111110000111";
	$_Num[7]  = "1100000011110111011111011101111111101111111110111111110111111111011111111101111111110111111111011111";
	$_Num[8]  = "1110000111110111101111011110111101111011111000011111101101111101111011110111101111011110111110000111";
	$_Num[9]  = "1110001111110111011111011110111101111011110111001111100010111111111011111111101111011101111110001111";

	echo chr(66).chr(77).chr(230).chr(4).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(54).chr(0).chr(0).chr(0).chr(40).chr(0).chr(0).chr(0).chr(40).chr(0).chr(0).chr(0).chr(10).chr(0).chr(0).chr(0).chr(1).chr(0);
	echo chr(24).chr(0).chr(0).chr(0).chr(0).chr(0).chr(176).chr(4).chr(0).chr(0).chr(18).chr(11).chr(0).chr(0).chr(18).chr(11).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0);

	for ($i=9;$i>=0;$i--){
		for ($j=0;$j<=3;$j++){
			for ($k=1;$k<=10;$k++){
				if(mt_rand(0,7)<1){
					echo $Color[mt_rand(0,1)];
				}else{
					echo $Color[substr($_Num[$seccode[$j]], $i * 10 + $k, 1)];
				}
			}
		}
	}
	exit;
}

function code_random($length) {
// 播下一个随机数发生器种子
//此参数变为可选项，当该项为空时，会被设为随时数
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	$hash = '';
	$chars = '123456789';
	$max = strlen($chars) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

?>
