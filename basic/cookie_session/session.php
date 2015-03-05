<?php
	session_start(); //开始session会话处理
	//session只要用到这个，就必须开启session_start()
	//放在文件开头 
	//创建session,直接采用超级全局变量赋值即可
	//session是存在服务器端，一般存放1440秒，
	//如果网页没有任何操作，会自动销毁，当然，可以通过php.ini去修改保存时间
	//如果关闭了浏览器，那么也自动销毁。	
	//及时性的，不像cookie会慢半拍	
	$_SESSION['name1'] = 'Lee1';
	$_SESSION['name2'] = 'Lee2';	
//	if (isset($_SESSION['name'])) {
//		echo $_SESSION['name'];
//	} else {
//		echo '不存在此人';
//	}	
//	unset($_SESSION['name']);
//	
//	echo isset($_SESSION['name']);	
	echo $_SESSION['name1'];
	echo $_SESSION['name2'];
	
	
	//	session_start();
//	//销毁所有session，销毁的也慢半拍
//	session_destroy();
//	echo $_SESSION['name1'];
//	echo $_SESSION['name2']; 
	//cookie适用于会员登录，购物车啊。。。。
	//因为他不占有服务器资源，所以会员特别多，购物车特别多的，就用cookie
	//session一般用于后台管理登录，人少。
	//安全性，一段时间不操作会自动过期
?>












