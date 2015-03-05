<?php

	//常量通过define() 来定义
	
	define("TOTAL",100);

	echo TOTAL;
	
	$TOTAL = 200;
	
	echo $TOTAL;
	//域名
	echo $_SERVER["HTTP_HOST"]."<br>";
	//项目根目录
	echo $_SERVER["DOCUMENT_ROOT"];
	
	
	
	
?>