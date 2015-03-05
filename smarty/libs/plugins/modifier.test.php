<?php
	//将$utime的时间戳,转换成格式化看得懂的
	function smarty_modifier_test($utime,$format){
		
		return date($format,$utime);
		
	}

?>