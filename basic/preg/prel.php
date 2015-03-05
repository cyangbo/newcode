<?php

/*
PHP为使用Perl兼容的正则表达式搜索字符串提供了7个函数，包括：
preg_grep()、preg_match()、preg_match_all()、preg_auote()、
preg_replace()、preg_replace_callback()和preg_split()。
 */


//搜索字符串：preg_grep()函数搜索数组中的所有元素，返回由与某个模式匹配的所有元素组成的数组。
//	/p$/	$	匹配字符串的行尾	,所以行尾是p的都可以匹配
	$language = array('php','asp','jsp','python','ruby');
	print_r(preg_grep('/p$/',$language));
	//Array ( [0] => php [1] => asp [2] => jsp )
	echo "<br>";

	
//搜索模式：preg_match()函数在字符串中搜索模式，如果存在则返回true，否则返回false。
	echo preg_match('/php[1-6]/','php5');
	//1
	echo "<br>";
	//电子邮件验证小案例（分组应用）
	$mode = '/([\w\.\_]{2,10})@(\w{1,}).([a-z]{2,4})/';
	$string = 'yc60.com@gmail.com';
	echo preg_match($mode,$string);
	//1
	echo "<br>";	
	
//匹配模式的所有出现：preg_match_all()函数在字符串中匹配模式的所有出现
//然后将所有匹配到的全部放入数组。
	preg_match_all('/php[1-6]/','php5sdfphp4sdflljkphp3sdlfjphp2',$out);
	print_r($out);
	/*
	 Array
	(
	    [0] => Array
	        (
	            [0] => php5
	            [1] => php4
	            [2] => php3
	            [3] => php2
	        )
	)
	 */
	echo "<br>";
	

	
//定界特殊的正则表达式：preg_quote()
//在每个对于正则表达式语法而言有特殊含义的字符前插入一个反斜线。
//这些特殊字符包含：$ ^ * () + = {} [] | \\ : <>。
	echo preg_quote('PHP的价格是：$150');
	//PHP的价格是：\$150
	echo "<br>";
	
//替换模式的所有出现：preg_replace()函数搜索到所有匹配，然后替换成想要的字符串返回出来。
	echo preg_replace('/php[1-6]/','python','This is a php5,This is a php4');
	//This is a python,This is a python
	echo "<br>";
	
	//ubb小案例：贪婪问题+分组使用() 
	$mode = '/\[b\](.*)\[\/b\]/U';
	$replace = '<strong>\1</strong>';
	$string = 'This is a [b]php5[/b],This is a [b]php4[/b]';
	echo preg_replace($mode,$replace,$string);
	//php5和php4被加粗
	//This is a php5,This is a php4
	echo "<br>";
	
	
	
//以不区分大小写的方式将字符串划分为不同的元素：preg_split()用来分割不同的元素。
	print_r(preg_split('/[\.@]/','yc60.com@gmail.com'));
	/*
	 Array
	(
	    [0] => yc60
	    [1] => com
	    [2] => gmail
	    [3] => com
	)

	 */

?>