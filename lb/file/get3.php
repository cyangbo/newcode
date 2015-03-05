<?php

/**
 * 功能说明:
 * 读取文件夹文件,如果是空行,那么去掉空行
 * 如果是.com  .cn  .net  .com/  .cn/   .net之类的结尾,那么去掉整行
 * 如果如果这一行的后面有空格接字符串,去掉空格和后面的字符串
 * 如果不是http开头,或者不是https开头,那么删除整行
 * 
 * 然后把剩下的生成到新目录的新文件夹
 * 
 *  * v3.0
 * 增加功能:
 * 把重复的行去掉
 */

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
		$i = 0;
		foreach($info['file'] as $val){
		
			/*print_r($val);
			echo "<br>";
			a (1).txt
			a (2).txt
			a (3).txt
			$val得到文件
			*/
			
			//得到一个文件的内容,按照每行来分组存放在一个数组中
			$array_file = file ( 'get/' . $val );
			//创建一个文件
			$fp = fopen ( 'put/' . $val, 'w' );
			
			//创建一个数组用来存放读取的数组
			//$array_put = array();
			/*for ($i=0;$i<count($array_file);$i++) {
				$array_put[i] = $array_file[i];
			}*/
			
			//字符串用来存储匹配好的字符串
			//$sss = '';
			
			//创建一个数组用来存放读取的数组
			$array_put = array();
			//global $mm;
			$mm = 0;
			
			//逐行读取
			for ($i=0;$i<count($array_file);$i++) {
				//去掉前后空白
				//print_r($array_file[$i]);
				$array_file[$i] = trim($array_file[$i]);
				//如果这一行的字符串长度大于0,执行
				if(strlen($array_file[$i])>2){
					$mode = '/^(http|https):/';   //规则模式
					$string = $array_file[$i];   //字符串
					//如果这一行是http:或者https:开头的,执行
					if (preg_match($mode,$string)) {
						$substring = explode(' ',$string);
						$scc = (array)$substring[0];
						//如果这一行不是.com这些结尾的,执行
						if(!preg_grep('/((.com\/)|(.cn\/)|(.net\/)|(.cc\/)|(.org\/)|(.tv\/)|(.me\/)|(.mobi\/)|(.com)|(.cn)|(.net)|(.cc)|(.org)|(.tv)|(.me)|(.mobi))$/',$scc)){
							//$sss = $sss.(string)$scc."\r\n";
							$array_put[$mm] = $scc[0];
							$mm = $mm + 1;
							//print_r($array_put[$mm]);
						}
					}
				}
			}
			
			//数组去重复
			$array_put2 = array_unique($array_put);
			
			//字符串用来存储匹配好的字符串
			$sss = '';			
			for ($j=0;$j<count($array_put2);$j++){
				//如果这一行字符串长度大于2
				if(@strlen($array_put2[$j])>2){
					//字符串用来存储匹配好的字符串
					@$sss = $sss.$array_put2[$j]."\r\n";
				}
			}
			
			//向文件里写入一些数据
			fwrite($fp,$sss,strlen($sss));
	
			//当打开一个文件的时候，习惯性的将它关闭掉
			fclose($fp);

		}
	}
?>

