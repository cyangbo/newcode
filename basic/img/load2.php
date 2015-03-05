<?php

	define('__DIR__',dirname(__FILE__).'\\');
	//加载已有的图像
	header('Content-Type: image/png'); 
	//imagecreatefrompng -- 从 PNG 文件或 URL 新建一图像
	//用image载入图像，是可以编辑图像
	//在载入的图像中，加入一个小水印
	//通过魔法常量__FILE__
	$im = imagecreatefrompng(__DIR__.'222.png');
	$white = imagecolorallocate($im,255,255,255);
	//字体文件
	$text = iconv('gbk','utf-8','李炎恢');
	//font字体还必须支持中文
	$font = 'C:\WINDOWS\Fonts\SIMHEI.TTF';
	//采用系统提供的字体
	//第二参数，是字体的大小,第三个参数是旋转角度，4，5参数是坐标
	imagettftext($im,40,30,45,110,$white,$font,$text);	
	imagepng($im);
	imagedestroy($im);
?>