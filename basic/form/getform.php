<?php

//postform.php传值进来

	header('Content-Type: text/html; charset=utf-8');	 //设置页面编码
	//第一步，接收前面表单中的值。
	//一个，username	 
	//接收 $_POST['username']
	//echo $_POST['username'];
	//你需要明白一个道理，空字符串也是数据，也可以赋值给$_POST['username'];
	//使用isset()验证是否正常提交是很准确的
	//目前所说的非法提交，是你没有经过表单提交，没有生成全局变量，而不是username
	//这个字段为空
	//!empty($_POST['username'])和 ==''基本一样，但是，并不能说，人家是非法的
	//只能说人家没有填而已。
	if (isset($_POST['username'])) {
		echo '正常提交';
		$username = $_POST['username'];
		//在输出之前，为了页面安全性
		$username = trim($username);
		$username = htmlspecialchars($username);
		if (strlen($username) < 2 ) {
			echo '用户名不能小于两位';
			exit;
		}	
		if (!is_numeric($username)) {
			echo '用户名必须是纯数字';
			exit;
		}	
		echo $username;
	} else {
		echo '非法提交';
	}
?>








