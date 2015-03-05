<?php
	//is_numeric()可以检查作为参数传入的值是否是数值。
	//函数is_int()和is_float()用于检查具体的数据类型
		$a = '123.33e';
	//echo is_numeric($a);	
	if (is_numeric($a)) {
		echo 'a是一个数字';
	} else {
		echo 'a不是一个数字';
	}
	
	echo "<br>";
	//产生一个随机整数,max返回的最高值（默认：getrandmax()） 	
	echo rand(0,10); 
	echo "<br>";
	//max可选的、返回的最大值（默认：mt_getrandmax()） 
	//int mt_rand ( int $min , int $max )
	echo mt_rand(0,100);
	echo "<br>";
	//显示随机数最大的可能值
	echo getrandmax();
	
	echo "<br>";
	//number_format()函数可以把整数和浮点数值转换为一种可读的字符串表示。
	$i = 12345.6789;
	$b = number_format($i,2);
	echo $b;
	//12,345.68
	
	/*
	 * 
 abs() 绝对值
floor() 舍去法取整
ceil() 进一法取整
round() 四舍五入
min() 求最小值或数组中最小值
max() 求最大值数组中最大值

	 * 
	 */

?>