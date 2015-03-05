<?php

	//smarty_function_test,function代表类型test要跟文件名称一致
	function smarty_function_test($params){
		
		//array('参数1'=>'参数值1','参数2'=>'参数值2')
		//$参数1 = $params['参数1']
		$width = $params['width'];
		$height = $params['height'];
		
		$area = $width*$height;
		return $area;
	}

?>