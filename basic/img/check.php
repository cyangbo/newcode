<?php
header('Content-Type: image/png');
	//简单的验证码
	//随即数	
	//为什么要循环0-15之间的数呢？	
	//因为要实现最简单的字母和数字混搭	
	//十六进制0-9 a-f	
	//dechex -- 十进制转换为十六进制	
	//创建一个四位的验证码	
	$nmsg="";
	for ($i=0;$i<4;$i++) {
		
		$nmsg .= dechex(mt_rand(0,15));
	}
	$im = imagecreatetruecolor(75,25);
	$blue = imagecolorallocate($im,0,102,255);
	$white = imagecolorallocate($im,255,255,255);
	imagefill($im,0,0,$blue);
	imagestring($im,5,20,5,$nmsg,$white);	
	imagepng($im);
	imagedestroy($im);
?>




