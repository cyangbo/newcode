<?php
	header('Content-type: image/png');
	define('__DIR__',dirname(__FILE__).'\\');
	list($width, $height) = getimagesize(__DIR__.'222.png');
	$new_width = $width * 0.7;
	$new_height = $height * 0.7;
	$im2 = imagecreatetruecolor($new_width, $new_height);
	$im = imagecreatefrompng(__DIR__.'222.png');
	imagecopyresampled($im2, $im, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	imagepng($im2);
	imagedestroy($im2);
	imagedestroy($im);
?>