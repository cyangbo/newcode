<?php
//多重线路，
	
	//break退出问题，叫做中途退出这个条件判断

	$weekday = 8;

	switch ($weekday) {
		case 1:
			echo '今天星期一，吴祁买新衣！';
			break;
		case 2:
			echo '今天星期二，去洗澡！';
			break;
		case 3:
			echo '今天星期三，上山大老虎！';
			break;
		default:
			echo '无聊在家！';	
	}

?>