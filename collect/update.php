<?php
/*
 * 用来更新淘客链接:把商品链接改成淘客链接,根据id查询
 */
	header("Content-Type: Charset=GBK");

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
	
	
	
	$query = "select id,buyurl from yufu_product where id between 1 and 100";
	

	
	$result=mysql_query($query);

	
	$filepath = '1.txt'; 
	/*$content = file_get_contents($filepath); 
	$array = explode("\r\n", $content); */
	
	$array = file($filepath); 
	
	$filepath2 = 'updateb.txt'; 
	$array2 = file($filepath2); 

	foreach($array as $key => $value)
	{ 	
	
		if(trim($value)=="BBBBBBBBBBBBBBBBBBBBBBBBBB"){
			mysql_query("delete from yufu_product where id =".$array2[$key]);
				//echo "delete from yufu_product where id =".$array2[$key];
			}else{
				mysql_query("UPDATE yufu_product SET buyurl =\"".$value."\" where id=".$array2[$key]);
				//echo "UPDATE yufu_product SET buyurl =\"".$value."\" where id=".$array2[$key];
			}
	} 
	mysql_close();
?>