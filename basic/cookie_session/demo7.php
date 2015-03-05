<?php
	//如果姓名和指定的姓名相同，那么就生成一个cookie
	//完成登录
	if (isset($_POST['username']) && $_POST['username'] == 'ee') {
		//如果正确了，我生成一个cookie，再跳转
		setcookie('name','YanHuiLee');
		header('Location:demo8.php');
	} else {
		header('Location:demo6.php');
	}
?>