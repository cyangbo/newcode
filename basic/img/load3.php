<?php

	//微缩图,不但表面的大小改变了，容量也改变
	//是真的改变了，不是表面的缩小
	define('__DIR__',dirname(__FILE__).'\\');
	header('Content-Type: image/jpeg'); 
	//getimagesize -- 取得图像大小
	//获取到了原图的长度和高度
	list($width,$height) = getimagesize(__DIR__.'222.jpg');
	
	//将原图缩放成40%;
	$_width = $width * 0.4;
	$_height = $height * 0.4;

	//创建一个新图
	$im = imagecreatetruecolor($_width,$_height);
	
	//下面的工作是，载入原图，将原图复制到新图上去
	//载入原图
	$_im = imagecreatefromjpeg(__DIR__.'222.jpg');
	
	//将原图重新采样，拷贝到新图上，最后按0.4的比例输出
	//imagecopyresampled -- 重采样拷贝部分图像并调整大小
	imagecopyresampled($im,$_im,0,0,0,0,$_width,$_height,$width,$height);
	
	//将新图输出
	//第二个参数不需要，直接null过度，
	//第三个参数，是0-100来调节JPG的清晰度
	//如果是imagepng，那么全部是高清
	
	imagejpeg($im,null,100);
	//销毁
	imagedestroy($im);
	imagedestroy($_im);
?>
