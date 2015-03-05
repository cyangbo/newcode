<?php
	
	//使用session
	session_start();
	
	
	//新建一张图片
	$width = 100;
	$height = 30;
	$image = imagecreatetruecolor($width, $height);
	
	//给图片加背景色
	$red = 255;
	$green = 255;
	$blue = 255;
	//imagecolorallocate为一副图像分配颜色
	$bgcolor = imagecolorallocate($image, $red, $green, $blue);
	//从左上到右下铺满底图
	imagefill($image, 0, 0, $bgcolor);
	
	/*
	//在底图上面输出随机数字4个
	for($i=0;$i<4;$i++){
		$fontsize = 12;
		$fontcolor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
		$fontcontent = rand(0,9);
		
		$x = ($i*100/4)+rand(5,10);
		$y = rand(5,10);
		
		imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
	}
	
	*/
	
	//保存验证码信息
	$captch_code = '';
	
	
	//在底图上面输出随机字母加数字4个
	for($i=0;$i<4;$i++){
		$fontsize = 6;
		$fontcolor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
		
		//定义字典包含字母和数字
		$data = 'abcdefghjkmnpqrstuvwxy13456789';
		$fontcontent = substr($data, rand(0,strlen($data)),1); 
		
		//每次生成的一个验证码字符,保存起来
		$captch_code .= $fontcontent;
		
		
		$x = ($i*100/4)+rand(5,10);
		$y = rand(5,10);
		
		imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
		
		
	}
	//将验证码保存到session中的authcode变量中
		$_SESSION['authcode'] = $captch_code;
	
	//在底图上面添加随机点
	for($i=0;$i<200;$i++){
		$pointcolor = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
		imagesetpixel($image, rand(1,99), rand(1,99), $pointcolor);	
	}
	
	//在底图上面添加随机线
	for($i=0;$i<3;$i++){
		$linecolor = imagecolorallocate($image, rand(80,200), rand(80,200), rand(80,200));
		imageline($image, rand(1,99), rand(1,29), rand(1,99), rand(1,29), $linecolor);
	}
	
	//在页面输出一个png的内容
	header('content-type:image/png');
	
	//输出image
	imagepng($image);
	
	//销毁
	imagedestroy($image);
	
?>