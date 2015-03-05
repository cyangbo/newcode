<?php
	if (!isset($_POST['send']) || $_POST['send']!='提交') {
		header('Location:Demo15.php');
		exit;
	}
	
	if (preg_match('/([\w\.]{2,255})@([\w\-]{1,255}).([a-z]{2,4})/',$_POST['email'])) {
		echo '电子邮件合法';
	} else {
		echo '电子邮件不合法';
	}
?>