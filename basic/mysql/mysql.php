<?php
	header('Content-Type:text/html;charset=utf-8');
	
	//第一步，连接到MySQL服务器 3306
	//第一个参数，服务器地址，第二参数，服务器的用户名，第三个参数，服务器密码
	//@如果出错了，不要出现警告或错误，直接忽略掉
	//die函数之前，先连接一下，报错流程
	
//	if (!$conn = @mysql_connect('localhost','root','root')) {
//		echo '数据库连接失败，错误信息：'.mysql_error();
//		exit;
//	}

	//常量参数
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','ccmiu');
	define('DB_NAME','cyangbo2');
	
	//第一步，连接数据库
	$conn = @mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败，错误信息：'.mysql_error());
	
	//第二步，选择指定的数据库，设置字符集
	mysql_select_db(DB_NAME) or die('数据库错误，错误信息：'.mysql_error());
	mysql_query('SET NAMES UTF8') or die('字符集设置错误'.mysql_error());
	
	//第三步，从这个数据库里选一张表（grade），然后把这个表的数据库提出来（获取记录集）
	$query = "SELECT * FROM yufu_tuan";
	$result = @mysql_query($query) or die('SQL错误，错误信息'.mysql_error());
	//$result就是记录集
	
	//第四步，将记录集里的数据显示出来
	print_r(mysql_fetch_array($result,MYSQL_ASSOC));
	
	//第五步，释放记录集资源
	mysql_free_result($result);
	
	//最后一步，关闭数据库
	mysql_close();
	
?>