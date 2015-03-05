<?php
	header("Content-type:text/html;charset=utf-8");
	//链接数据库
	if($con = mysql_connect('localhost','root','root')){
		//echo "链接成功";
		print_r($con);
	}else{
		echo "链接失败";
	}
	
	//选择数据库
	if(mysql_select_db('cyangbo2')){
		//echo "选择数据库成功";
	}else{
		echo "选择数据库失败";
	}
	//设置插入的字符集
	mysql_query('set names utf8');
	
	/*
	//插入成功返回true
	if(mysql_query('INSERT into tb1 (username) VALUES ("mmdm")')){
		echo "插入成功";
	}else{
		//mysql_error()用来打印对应的错误信息
		echo mysql_error();
		echo "插入失败";
	}
	*/
	
	//$query = mysql_query('select * from tb1');
	
	
	/*	
	 while($row = mysql_fetch_row($query)){
		print_r($row);
	}
	 * 等于上面的while,mysql_fetch_row()每取一次都自增1
	$row = mysql_fetch_row($query);
	print_r($row);
	$row = mysql_fetch_row($query);
	print_r($row);
	$row = mysql_fetch_row($query);
	print_r($row);
	$row = mysql_fetch_row($query);
	print_r($row);
	*/
	/*
	$arr = mysql_fetch_array($query);
	echo $arr['username'];
	*/
	$query = mysql_query('select id ,buyurl  from yufu_tuan');

	
	
	
	/*
	//mysql_num_rows()返回函数
	if($query&&mysql_num_rows($query)){
		//进行数据的输出
		while($row=mysql_fetch_row($query)){
			print_r($row);
		}
	}else {
		echo '没有数据';
	}
	*/
	
	
	while($row = mysql_fetch_row($query)){
		
		 echo $row[1]."\n";
		
	}



 
	//关闭链接
	mysql_close($con);

	
	
	
	/*
	$cou = mysql_query('select count(*) from tb1');
	//mysql_result()获取结果集的数据
	
	//从第二行开始取值一行的第一个字段
	echo mysql_result($query, 1);
	//从第二行开始取值一行的age字段数据
	echo mysql_result($query, 1,'age');
	*/
	
	
	
	//$cc = 'http://gi2.md.alicdn.com/bao/uploaded/i2/TB1uOjVGFXXXXcZXpXXXXXXXXXX_!!0-item_pic.jpg';
	//mysql_affected_rows	--收影响的记录行数
	//返回前一次受Insert,update,delete影响的记录的行数
	//mysql的增删改,通过mysql_query向数据库传递insert,update,delete语句
	/*if(mysql_query("update yufu_tuan set thumb='$cc'  where id=1454")){
		echo "修改成功,修改的数据条数为:";
		echo mysql_affected_rows($con);	//链接标识符
	}else{
		echo "修改失败";
	}*/
	
	
	?>
	
	


