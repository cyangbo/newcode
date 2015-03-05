<?php

//postform2.php传值进来
	//设置编码
	header('Content-Type: text/html; charset=utf-8');	 //设置页面编码 
	
	//第一步，先验证是否是postform2.php提交过来
	//直接是按钮点到我这里来的，那么就说明，其他超级全局变量都应该存在
	//如果send是存在的，那么就说是点过来，否则，跳回到Demo5.php的页面
	if (!isset($_POST['send']) || $_POST['send']!='提交') {
		header('Location:postform2.php');
		exit;  //跳回去了，下面就不需要执行了，那么就exit;
	}
	
	//第二步，接收所有数据
	$username = trim($_POST['username']);
	$password = $_POST['password'];
	$code = trim($_POST['code']);
	$email = trim($_POST['email']);
	$content = htmlspecialchars(trim($_POST['content']));
	
	
	//用户名不能小于两位，不能大与10位
	if (strlen($username) < 2 || strlen($username) > 10) {
		//使用JS来跳转，有提示的
		echo "<script>alert('用户名不能小于两位或者大于10');history.back();</script>";
		exit;
	}
	
	//密码不能小于六位
	if (strlen($password) < 6) {
		echo "<script>alert('密码不能小于六位');history.back();</script>";
		exit;
	}
	
	//验证码必须是4位，必须是数字
	if (strlen($code) != 4 || !is_numeric($code)) {
		echo "<script>alert('验证码必须是4位并且是纯数字');history.back();</script>";
		exit;
	}
	
	//验证电子邮件
	if (!preg_match('/([\w\.]{2,255})@([\w\-]{1,255}).([a-z]{2,4})/',$email)) {
		echo "<script>alert('电子邮件不合法！');history.back();</script>";
		exit;
	}
	
	
	echo '用户名：'.$username.'<br />';
	echo '电子邮件：'.$email.'<br />';
	echo '个人介绍：'.$content;
	
?>






