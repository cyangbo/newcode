<?php
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
	
	$query = "select id,buyurl from yufu_product where id between 444 and 1000";
	
	//print_r($query);
	
	//$result = @mysql_query($query) or die('SQL错误，错误信息'.mysql_error());
	
	$result=mysql_query($query);
	$ar=array();
	$br=array();
	
	
	$fp = fopen('updatea.txt', 'a');
	$fp2 = fopen('updateb.txt','a');
	
	
	while($rows = mysql_fetch_array($result))
	{
	   $ar[] = $rows['id']." ".$rows['buyurl'];
	   //$ar[] = $rows['buyurl'];
	}
	$value1 = array();
	foreach($ar as $key => $value){
		$value1 = explode(" ", $value);
		//echo $value1[0];
		//echo "\n";
		fwrite($fp, print_r($value1[1]."\n",true));
		fwrite($fp2, print_r($value1[0]."\n",true));
	}
	
	fclose($fp);
	fclose($fp2);

	//最后一步，关闭数据库
	mysql_close();
?>