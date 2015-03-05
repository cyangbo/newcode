<?php
	$str = '                         PHP                        ';
	//清理一下两边的空格 ltrim只清理左边，rtrim只清理右边
	//两边都清理一下
	echo trim($str);	
	echo "<br>";

	$str = "This is a Teacher!\nThis is a Student!";
	//但是，我现在想要在网页中实现换行
	//在回帖的时候，一个回车就是\n
	//我们通过函数来实现转换过程
	echo $str;
	//This is a Teacher! This is a Student!
	echo "<br>";
	echo nl2br($str);
	//This is a Teacher!
	//This is a Student!
	echo "<br>";
	
	
	$str = '<strong>吴祁</strong>';
	//将所有字符转换成HTML
	echo htmlentities($str);
	//<strong>å�´ç¥�</strong>
	echo "<br>";
	//我们只要转换特殊字符即可
	echo htmlspecialchars($str);
	//<strong>吴祁</strong>
	echo "<br>";
	//将HTML去除掉
	echo strip_tags($str);
	//吴祁
	echo "<br>";
	
	
	
	$str = 'This is a Teacher.His is a "Lee",\n This is a wq!'; 
	//对于即将插入数据库的字符串，把有问题的字符处理一下
	$a = addslashes($str);
	echo $a;
	//This is a Teacher.His is a \"Lee\",\\n This is a wq!
	echo "<br>";
	//将数据从数据库取出来，就会有\这个符号,用下面反转,得到原来str
	echo stripcslashes($a);
	//This is a Teacher.His is a "Lee",\n This is a wq!
	echo "<br>";
	//首先将写进数据库的字符串通过addslashes()函数过滤一下，然后拿出来的时候
	//再通过stripcslashes()解析一下显示
	
	
	//将字符串转换成大写
	echo strtoupper('yc60.com@gmail.com'); 
	//YC60.COM@GMAIL.COM
	echo "<br>";
	//首字符大写
	echo ucfirst('yc60.com@gmail.com'); 
	//Yc60.com@gmail.com
	echo "<br>";
	
	
	//str_pad — 使用另一个字符串填充字符串为指定长度
	$str = 'Lee';
	echo str_pad($str,10).'is good!';
	//Lee is good!
	echo "<br>";
	//STR_PAD_RIGHT, STR_PAD_LEFT, or STR_PAD_BOTH
	echo str_pad($str,10,'#',STR_PAD_BOTH);
	//###Lee####
	echo "<br>";
	
	
	
	//explode -- 使用一个字符串分割另一个字符串 
	//返回的是一个数组
	//explode第一参数是分割字符串，第二个参数是要被分割的字符串
	$email = explode('@','yc60.com@gmail.com');
	print_r($email);
	//Array ( [0] => yc60.com [1] => gmail.com )
	echo "<br>";
	
	$arr = array('Lee','Wq','Hxp');
	$str = implode(' & ',$arr);
	echo $str;
	//Lee & Wq & Hxp
	echo "<br>";
	$str = implode('@',$email);
	echo $str;
	//yc60.com@gmail.com
	echo "<br>";
	
	
	$str = 'I,will.be#back';
	//按照,.#来分割
	$tok = strtok($str,',.#');
	while ($tok) {
		echo $tok.'<br />';
		$tok = strtok(',.#');
	}
	/*
	 I
	will
	be
	back
	 */
	echo "<br>";
	
	
	$str = 'yc60.com@gmail.com';
	//从第3个数字之后开始,取出5位
	echo substr($str,3,5);
	//0.com
	echo "<br>";	
	
	
	//str_split将字符串转换为数组
	//array str_split ( string $string [, int $split_length = 1 ] )
	//string输入字符串。 split_length每一段的长度。
	$str = 'abc';
	print_r(str_split($str));
	//Array ( [0] => a [1] => b [2] => c )
	echo "<br>";
	
	//倒序输出
	$str = 'This is a Teacher!';
	echo strrev($str);
	//!rehcaeT a si sihT
	echo "<br>";
	
	
	
	
	//strcmp二进制安全字符串比较
	//如果 str1 小于 str2 返回 < 0； 如果 str1大于 str2返回 > 0；如果两者相等，返回 0。 
	if (strcmp('b','b') == 0) {
		echo '==';
	}
	//==
	echo "<br>";
	
	
	//不区分大小写的
	echo strcasecmp('B','b');
	//0
	echo "<br>";
	
	//目前是非自然排序
	echo strcmp('2','10');
	//1
	echo "<br>";
	
	//如果按照自然排序方式比较呢？
	echo strnatcmp('2','10');
	//-1
	echo "<br>";
	
	
	//int strspn ( string $subject , string $mask [, int $start [, int $length ]] )
	//计算字符串中全部字符都存在于指定字符集合中的第一段子串的长度。 
	//后面两个数字的参数，是从第几位开始，取多少位
	echo strspn('yc60','yc60.com@gmail.com',1,2);
	//2
	echo "<br>";

	//测试字符串的长度
	echo strlen('This is a Teacher!');
	//18
	echo "<br>";
	
	//测试字符串出现的频率,字母0出现2次
	echo substr_count('yc60.com@gmail.com','o');
	//2
	echo "<br>";

	
	
	
	//从指定的字符串开始输出之后的字符串
	echo strstr('yc60.com@gmail.com','@'); 
	//@gmail.com
	echo "<br>";
	//不区分大写的
	echo stristr('yc60.com@Gmail.com','g'); 
	//Gmail.com
	echo "<br>";	
	
	
	//查找某字符串最先出现的位置
	//位置从第0个开始计算,c第一次出现在第1个位置上
	echo strpos('yc60.com@gmail.com','c');
	//1
	echo "<br>";	
	//最后出现的位置
	echo strrpos('yc60.com@gmail.com','c');
	//15
	echo "<br>";	
	
	
	echo substr_replace('yc60.com@gmail.com','&&&',9,5);
	//yc60.com@&&&.com
	echo "<br>";
	
	
	
	
	//取中文长度
	$str = '我是大大';   
	//一个中文等于3
	echo strlen($str);
	//12
	echo "<br>";
	
	//使用mb_strlen来取中文,有第二个参数，字符编码
	//一个中文1.5
	echo mb_strlen($str,'GBK');
	//6
	echo "<br>";	
	
	
	//如果你使用普通的strlen这个函数，我取1个字符
	//采用mb_substr来取中文字符
	echo mb_substr($str,0,3,'GBK');
	//我是
	echo "<br>";
	
	print_r(preg_split('/[\.@]/','yc60.com@gmail.com'));
	//Array ( [0] => yc60 [1] => com [2] => gmail [3] => com )
	
	

?>