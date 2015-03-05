<?php

header("Content-Type: Charset=GBK");
/*
 * 按目录逐个文件打开
 * 读取一行
 * 执行
 */

/**
 * 遍历目录函数，只读取目录中的最外层的内容
 * @param string $path
 * @return array
 */
function readDirectory($path) {
	$handle = opendir ( $path );
	//!==不全等
	while ( ($item = readdir ( $handle )) !== false ) {
		//.和..这2个特殊目录
		//.是当前目录,..是上级目录
		if ($item != "." && $item != "..") {
			//判断是目录还是文件
			if (is_file ( $path . "/" . $item )) {
				$arr ['file'] [] = $item;
			}
			if (is_dir ( $path . "/" . $item )) {
				$arr ['dir'] [] = $item;
			}
		}
	}
	//关闭资源句柄
	closedir ( $handle );
	return $arr;
}
	//常量参数
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','ccmiu');
	define('DB_NAME','cyangbo2');
	
	//第一步，连接数据库
	$conn = @mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败，错误信息：'.mysql_error());
	
	//第二步，选择指定的数据库，设置字符集
	mysql_select_db(DB_NAME) or die('数据库错误，错误信息：'.mysql_error());
	mysql_query('SET NAMES GBK') or die('字符集设置错误'.mysql_error());

$today =  date('Y-m-d',time());	
$path = __DIR__.'\zhe800\\'.$today.'\\';
$info = readDirectory ( $path );
if ($info ['file']) {
	$i = 1;
	foreach ( $info ['file'] as $val ) {
		$myuid = substr($val, 0,3);		//得到没有txt的文件名
		$array_file = file ( $path.$val );	//得到一个文件的内容,按照每行来分组存放在一个数组中	
		//如果有一行数据,就执行下面操作
		foreach ( $array_file as $key => $value ) {	
			//把value插入数据库中
			$query = $value;	
			$result = @mysql_query($query) or die('SQL错误，错误信息'.mysql_error());	
		}	
			//第五步，释放记录集资源
			mysql_free_result($result);
			//第四步，将记录集里的数据显示出来
			//print_r(mysql_fetch_array($result,MYSQL_ASSOC));
		fclose ( $array_file );
	}
}
	//最后一步，关闭数据库
	mysql_close();
?>