<?php
	//设置字符集编码
	header('Content-Type: text/html; charset=utf-8');
		//转换成硬路径常量
	define('ROOT_PATH',substr(dirname(__FILE__),0,-8));
	
		//引入核心函数库
	//require ROOT_PATH.'includes/global.func.php';
	require ROOT_PATH.'includes/mysql.func.php';
	
		//数据库连接
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','ccmiu');
	define('DB_NAME','article');
	
	//初始化数据库s
_connect();   //连接MYSQL数据库
_select_db();   //选择指定的数据库
_set_names();   //设置字符集

?>