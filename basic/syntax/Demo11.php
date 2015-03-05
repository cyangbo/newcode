<?php

	//echo $username; 这种简短风格不允许用
	//它会混淆和普通变量的关系，
	
	//第一步,将接受到的表单数据赋值给一个变量
	
	//将上一张表单用name的名称的value值提取出来  value="吴祁" name="username"
	//$_POST['username']这个整体就会返回出"吴祁"这个字符串
	
	$username = $_GET['username'];


//	$username =  $HTTP_POST_VARS['username'];
	
	echo "这个学生是：".$username;
	
	//echo mt_rand(1,10);
	
	echo pi();
	

?>

<?php 
	$i = 123456;
	$si = number_format($i,2,".",",");
	echo $si;
?>