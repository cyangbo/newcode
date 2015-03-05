<?php

	//创建一个Cookie，
	//Cookie是在你的客户机存一个小文件，这个文件包含你登录时的信息。
	//setcookie可以创建一个客户机的cookie文件
	//第一个参数表示cookie的名称，第二个参数表示这个cookie名称的值
	//所谓的会话结束时，就是当你这个浏览器关闭时，就没有了，就自动删除
	//创建一个包含过期时间的cookie,过期时间采用当前的时间戳+秒即可
	//time()+(7*24*60*60)表示未来7天
	//一旦setcookie改变了，一刷新浏览器，就会把旧的cookie覆盖掉
	setcookie('name','Lee',time()+(7*24*60*60));
	//setcookie('name','Lee');
	

	setcookie('name2','WQ');
	
	//读取本机的cookie，采用一个超级全局变量$_COOKIE
	//里面放cookie名即可
	//有一个特性，setcookie并不是及时生成，它会慢一拍	
	//PS：慢一拍，第一次刷新，只是生成覆盖了原来。
	//但获取的还是之前的，而第二次刷新，才能真正获取到。
		echo $_COOKIE['name']."第一次刷新测试地方";
	//用变量检测函数来判读cookie是否存在
	if (isset($_COOKIE['name2'])) {
		echo $_COOKIE['name2'];
	} else {
		echo '不存在此用户';
	}
	
	
	//删除cookie
	setcookie('name','Lee');
	//中间删除掉这个cookie
	//将这个值设置为空即可	
	//setcookie('name','');
	//我将过期时间调整到目前的时间还少一秒，那么就等于是过期的了
	setcookie('name','Lee',time()-1);
	echo $_COOKIE['name'];
	

?>
