<?php

	//标准函数，内置函数
	echo "md5加密".md5('123456');
	echo '<br />';
	echo "sha1加密".sha1('123456');
	echo '<hr />';
	
	//创建函数，不要跟系统的内置函数重名
	//无参数表示()里面是空的，无返回就是函数的程序里没有return
	function functionName() {
		echo '我是一个无参数无返回的函数';
	}
	functionName();
	
	echo '<br />';
	//包含参数无返回值的函数
	//一般来说，写好的函数，就不用修改了，
	//变化的一般是传入进去的参数
	function functionArea($radius) {
		$area = $radius * $radius * pi();
		echo '半径为：'.$radius.'的面积为：'.$area;
	}
	//调用
	functionArea(30);
	
	
	echo '<br />';
	//包含参数，有返回值
	function functionArea2($radius) {
		$area = $radius * $radius * pi();
		return $area;
	}
	//调用
	//这样子大大提高了函数的灵活性
	// functionArea(20);整体就得到一个值，在内存里。
	echo 'r为20的面积为：'.functionArea2(20);
	
	
	echo '<br />';
	//包含参数，有返回值
	//这个$radius=10，这里的10表示这个参数的默认值
	//如果调用函数没有给函数传一个参数，那么就启用默认值	
	function functionArea3($radius=10) {
		$area = $radius * $radius * pi();
		return $area;
	}	
	//调用
	//这样子大大提高了函数的灵活性
	// functionArea(20);整体就得到一个值，在内存里。
	echo '面积为：'.functionArea3(50);
	
	echo '<br />';
	//写一个函数，这里函数要返回三条数据
	//在函数里的变量，和函数外的变量没有任何联系，所以写重名，无所谓
	function functionInfo($name,$age,$job) {
		//$userInfo是个数组
		//$userInfo = array($name,$age,$job);
		$userInfo[] = $name;
		$userInfo[] = $age;
		$userInfo[] = $job;
		return $userInfo;
	}
	//调用函数
	list($name,$age,$job) = functionInfo('吴祁',19,'学生');
	echo $name.'今年'.$age.'岁了，他还是个'.$job;
	
	
	echo '<br />';
	//了解全局变量
	//可以将$a设置成全局变量	
	$a = 5;
	function fa() {
		global $a; //将$a设置成为全局变量
		$a = 2;
	}
	fa();	
	echo $a;
	//2
	
	
	echo '<br />';
	//使用超级全局变量
	$GLOBALS['a'] = 5;
	function fa2() {
		$GLOBALS['a'] = 2;
	}
	fa2();
	echo $GLOBALS['a'];	
	//2
	//print_r($GLOBALS);
	

	
	echo '<br />';
	//这句话把函数库给包含进来
	include 'library/tool.library.php';
	echo functionPi(); 
	
	
	echo '<br />';
	//	require_once('Demo1.php'); 
	//	require_once('Demo1.php');
	//	echo '<strong>这是Demo11.php</strong>
	//include 如果不存在，就告诉你两个警告，然后继续执行
	//require 如果不存在，就直接报错，然后停止执行
	//require 'Demo111.php';
	//我们就推荐使用require
	//echo '<strong>这是Demo11.php</strong>'

?>