<?php

/**
 * 读取:leimu中的zhe800.txt
 * 逐行读取
 * 每一行url采集,存放到zhe800文件夹,文件名按照每个url后面的数字存放成txt
 */

		$dirfile = __DIR__.'\leimu\zhe800.txt';
		
		$today =  date('Y-m-d',time());
		

		require_once 'collectbb.php';
		
		//把文件中的内容按照行,保存成数组
		$array_file = file ( $dirfile );
		
		//判断目录是否存在
		if (!is_dir($today)) {
			mkdir('zhe800\\'.$today,0777);  //最大权限0777,意思是，如果没有这个目录，那么就创建
		} 
		
		foreach ( $array_file as $key => $value ){
			$value = trim($value);
			$substring = explode('  ',$value);
			//要采集的类目链接地址
			$url = $substring[0];
			//uid同时用来做文件名字
			$filename = $substring[1];

			//如果文件名字中有a这个字母,那么就调用_zhe800a($url,$filename);这个方法
			//_zhe800单纯写入如果没有文件那么建立文件,_zhe800a()方法是去掉a,然后把数据下一行开始保存到文件
			//后期可以把这个if判断放到collectbb.php,然后把_zhe800(),_zhe800a()两个方法合成一个方法.
			if(!preg_match("/a/", $filename)){
				
				//按照文件名字filename来保存文件到zhe800文件夹中去
				_zhe800($url,$filename,$today);
				
			}else{
				$filename = substr($filename,0,-1);
				
				_zhe800a($url,$filename,$today);
			}
		}



?>