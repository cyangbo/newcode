<?php
	require 'config.php';
	//新增数据
	$query = "INSERT INTO article (title,author,description,content,dateline) VALUES ('标题','作者','描述','内容',NOW())";
	@mysql_query($query) or die('新增错误：'.mysql_error());

//	//修改数据
//	$query = 'UPDATE grade SET point=87 WHERE id=8';
//	@mysql_query($query) or die('修改错误：'.mysql_error());

	//删除数据
//	$query = "DELETE FROM grade WHERE id=8";
//	@mysql_query($query) or die('删除错误：'.mysql_error());

	//显示数据
	$query = "SELECT title,author,description,content,dateline FROM article";
	$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
	
	//把结果集转换成的数组赋给$row,如果有数据，就为真
	while (!!$row = mysql_fetch_array($result)) {
		echo $row['title'].'----'.$row['author'].'----'.$row['description'];
		echo '<br />';
	}

	
	mysql_close();
?>