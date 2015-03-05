<?php
	header("Content-type: text/html; charset=utf-8");
	session_start();
	//url��ʽ  index.php?controller=��������&method=������
	require_once('config.php');
	require_once('framework/pc.php');
	PC::run($config);
?>