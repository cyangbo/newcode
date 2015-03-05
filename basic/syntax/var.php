<?php

	//创建一个变量,
	//什么类型，整型，字符串，浮点型，布尔型
	//创建变量的时候，通过赋值来确定它的类型；
	$sum = 0;
	$total = 1.22;
	$sum = $total;	
	echo $sum;
	
	
	echo "<br>";
//数据类型的转换
//	$sum = 0;
//	$total = 1.22;
//	$sum = $total;   //隐式转换
	$sum = 0;
	$total = (float)$sum;   //显示转换
	//得到数据类型gettype($var);
	echo gettype($total);
	
	
	
	echo "<br>";
	//设置类型settype() 
	$sum = 100;	
	//中途将$sum类型转换成字符串型
	settype($sum,"string");	
	//这个时候$sum的100不是数字，而是字符串"100"
	echo gettype($sum);
	
	echo "<br>";	
	//isset()和unset()
	//判断一个变量是否存在
	//销毁一个变量
	$a = 5;	
	//变量$a已经存在。	
	//unset($a);	
	//如果$a这个变量是真是存在的，那么isset($a)返回一个布尔值1,如果是空,就不能输出任何东西,不是0
	echo isset($a);	
	$b = 0;   //空字符串，认为是空,空就返回真,true ,1
	echo empty($b);

	
	
		//类型判断函数
	echo "<br>类型判断函数";
	$sum = "100";
	$cc = 99;
	echo is_integer($sum);
	echo is_integer($cc);
	
	
	//$sum 是浮点型
		echo "<br>浮点型<br>";
	$sum = 22.22;
	
	//intval($sum)整体变成了整型,
	echo intval($sum)."<br>";
	echo gettype($sum)."<br>";
	settype($sum,"integer");
//	echo $sum;
	
	//请问$sum目前是什么类型
	echo gettype($sum);
	

?>