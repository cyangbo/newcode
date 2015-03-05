<?php
	header("Content-type:text/html;charset=utf-8");
	//定义常量用difine()
	define('HOST','localhost');
	define('USERNAME', 'root');
	define('PASSWORD','ccmiu');
	@mysql_query('SET NAMES UTF8') or die('字符集设置错误'.mysql_error());
?>