<?php
	//开启缓冲
	ob_start();
	//重新导向一个URL
	//header()
	//header('Location:Demo2.php');
	//上面这句代码可以自动跳转到你所想要的页面。
	//header('Location:http://www.baidu.com');
	//上面这句话自动跳转到百度上面去。
	
	//echo 'baidu.com';
	//header('Location:http://www.baidu.com');
	//在执行header()函数，必须注意，之前不能有任何浏览器输出
	
	//字符编码编码
	header('Content-Type: text/html; charset=utf-8');	 //设置页面编码
	echo '嘿嘿，我是中文！';
	echo $h=dechex(123);
	
	
	/*
	 HTML表单元素
表单元素	描述
text input	文本框
passoword input	密码框
hidden input	隐藏框
select	下拉列表框
checkbox	复选框
radio	单选按钮
textarea	区域框
file	上传
submit	提交按钮
reset	重置按钮

	 */

?>