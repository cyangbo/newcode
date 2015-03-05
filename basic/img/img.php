<?php
	//一般生成的图像可以是png,jpg,gif,bmp
	//jpeg,wbmp
	
	//第一步，设置文件MIME类型，输出类型  text/html类型是网页类型，默认可以不写
	//将输出类型改成图像流
	header('Content-Type: image/png;');
	
	//第二步，创建一个图形区域，图像背景
	//有两种创建方式  ,,资源类型，一般要加上@ 符号，防止出错
	//imagecreatetruecolor返回的是一个资源句柄
	//这个函数创建了一个图像区域，没有进行填充的时候，背景默认是黑色的
	$im = imagecreatetruecolor(200,200);
	
	//第三部，在空白图像区域，绘制颜色，文字啊，线条等。。。
	//填充色换掉，首先要有个颜色填充器
	//imagecolorallocate -- 为一幅图像分配颜色
	$blue = imagecolorallocate($im,0,102,255);	
	//将这个blue颜色填充到背景上去
	//imagefill -- 区域填充
	imagefill($im,0,0,$blue);
	
	//第四部，在蓝色的背景上输入一些线条，文字等
	$white = imagecolorallocate($im,255,255,255);
	//imageline -- 画一条线段
	imageline($im,0,0,200,200,$white);
	imageline($im,200,0,0,200,$white);
	//imagestring -- 水平地画一行字符串
	imagestring($im,5,80,20,'Mr.Lee',$white);
	
	
	//第五步，输出最终图形
	// 以 PNG 格式将图像输出到浏览器或文件
	imagepng($im);
	
	//第六步，我要将所有的资源全部清空
	imagedestroy($im);	
?>




