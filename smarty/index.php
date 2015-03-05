<?php

	require_once ('function.php');
	
	$view = ORG('Smarty/', 'Smarty',array('left_delimiter'=>'{','right_delimiter'=>'}','template_dir'=>'tpl','compile_dir'=>'template_c'));
	$controller = $_GET['controller'];
	$method = $_GET['method'];
	C($controller,$method);
?>