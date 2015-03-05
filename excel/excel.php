<?php
	header("Content-type:text/html;charset=utf-8");
	//链接数据库
	if($con = mysql_connect('localhost','root','root')){
		echo "链接成功";
		print_r($con);
	}else{
		echo "链接失败";
	}
	
	//选择数据库
	if(mysql_select_db('cyangbo2')){
		echo "选择数据库成功";
	}else{
		echo "选择数据库失败";
	}
	//设置插入的字符集
	mysql_query('set names utf8');
	
	//$query = mysql_query('select * from excel');
	
	
	//插入成功返回true
	if(mysql_query("INSERT into excel (tel) VALUES ('15914481433')")){
		echo "插入成功";
	}else{
		//mysql_error()用来打印对应的错误信息
		echo mysql_error();
		echo "插入失败";
	}

	

?>