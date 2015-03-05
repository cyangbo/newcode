<?php

//打开指定目录

/**
 * 遍历目录函数，只读取目录中的最外层的内容
 * @param string $path
 * @return array
 */
function readDirectory($path) {
	$handle = opendir ( $path );
	//!==不全等
	while ( ($item = readdir ( $handle )) !== false ) {
		//.和..这2个特殊目录
		//.是当前目录,..是上级目录
		if ($item != "." && $item != "..") {
			//判断是目录还是文件
			if (is_file ( $path . "/" . $item )) {
				$arr ['file'] [] = $item;
			}
			if (is_dir ( $path . "/" . $item )) {
				$arr ['dir'] [] = $item;
			}
		}
	}
	//关闭资源句柄
	closedir ( $handle );
	return $arr;
}

/**
 * 创建文件
 * @param string $filename
 * @return string
 */
function createFile($filename) {
	//file/1.txt
	//验证文件名的合法性,是否包含/,*,<>,?,|
	$pattern = "/[\/,\*,<>,\?\|]/";
	if (! preg_match ( $pattern, basename ( $filename ) )) {
		//检测当前目录下是否存在同名文件
		if (! file_exists ( $filename )) {
			//通过touch($filename)来创建
			if (touch ( $filename )) {
				return "文件创建成功";
			} else {
				return "文件创建失败";
			}
		} else {
			return "文件已存在，请重命名后创建";
		}
	} else {
		return "非法文件名";
	}
}

/**
 * 
在文件夹中:
	逐个读取文件
		打开文件
			逐行读取
				匹配规则
				修改一行内容
				进入下一行
				到了最后
		关闭文件

规则匹配:
	如果没有内容,删除这一行
	如果不是http开头的删除整行
	如果遇到空格,删除空格后面内容
 */

	//文件名包含，文件的名称+文件的扩展名
	$path = 'D:\wamp\www\test\lb\file\get';

	$info=readDirectory($path);
	if($info['file']){
		$i=1;
		foreach($info['file'] as $val){
		
			/*print_r($val);
			echo "<br>";
			a (1).txt
			a (2).txt
			a (3).txt
			$val得到文件
			*/
			
			//得到一个文件的内容,按照每行来分组存放在一个数组中
			$array_file = file('get/'.$val);
			//创建一个文件
			$fp = fopen('put/'.$val,'w');
			$outstring = '';
			
			//如果有一行数据,就执行下面操作
			foreach ($array_file as $key => $value){
				//$key第一行的值是0,$value是每一行的字符串	
				//清除一下两边空格
				$str = trim($value);
				
				/**
				 * 用正则表达式判断$value的值
				 * 
				 * 	如果没有内容,删除这一行
					如果不是http开头的删除整行
					如果遇到空格,删除空格后面内容
				 */					
				//如果这一行字符串有内容
				if(strlen($str)>0){
					$mode = '/^(http|https):/m';   //规则模式
					$string = $str;   //字符串
					//如果是http开头再处理
					if (preg_match($mode,$string)) {
						//对网址按照空格进行分割,得到要的内容$substring[0]
						$substring = explode(' ',$string);
						
				
							//Array ( [0] => php [1] => asp [2] => jsp )
	
	
	
	
						
						$outstring = $outstring.$substring[0]."\r\n";
						//echo $substring[0];
						//echo "<br>";
					}
				}
			  }
			
		//向文件里写入一些数据
		fwrite($fp,$outstring,strlen($outstring));
	
		//当打开一个文件的时候，习惯性的将它关闭掉
		fclose($fp);		
		}
	}
?>

