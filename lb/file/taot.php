<?php 
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


//采集u站
//图片结尾:.jpg_290x290.jpg



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
 * _title()标题截取函数
 * @param $_string
 */

function _title($_string,$_strlen) {
	if (mb_strlen($_string,'utf-8') > $_strlen) {
		$_string = mb_substr($_string,0,$_strlen,'utf-8');
	}
	return $_string;
}









//文件名包含，文件的名称+文件的扩展名
$path = 'D:\wamp\www\test\lb\file\zhe';

$info = readDirectory ( $path );
if ($info ['file']) {
	$i = 1;
	foreach ( $info ['file'] as $val ) {
		
		/*print_r($val);
			echo "<br>";
			a (1).txt
			a (2).txt
			a (3).txt
			$val得到文件
			*/
		
		$mycccid = substr($val, 0,3);
		
		
		//得到一个文件的内容,按照每行来分组存放在一个数组中
		$array_file = file ( 'zhe/' . $val );
		//创建一个文件
		$fp = fopen ( 'zhec/' . $val, 'w' );
		$outstring = '';
		
		//如果有一行数据,就执行下面操作
		foreach ( $array_file as $key => $value ) {
			//$key第一行的值是0,$value是每一行的字符串	
			//清除一下两边空格
			$mystring = trim ( $value );
			if (strlen ( $mystring ) > 0) {
			 
			$myarr = preg_split('/[>,}]/', $mystring);
			
			$mytable = "yufu_product";
			$myday = 5;
			$mycid = $mycccid;
			
			$myurl = $myarr[2];
			$mypic = substr($myarr[4],0,-12);
			$myid = substr($myurl,-11);
			if(mb_strlen( $mystring ) > 38) {
				$mytitle = _title($myarr[6],38);
			}else{
				$mytitle = $myarr[6];
			}
			
			
			$myprice = $myarr[8];
			$myoldp = $myarr[10];
			$mytime = time();
			$mylong = time()+($myday*24*60*60);
			
			$mymouthsale = rand(500,1800);
			
			$myinsert = "INSERT INTO `$mytable`(`catid`,`sitetitle`,`keywords`,`title`,`price`,`hdprice`,`starttime`,`endtime`,`buyurl`,`thumb`,`monthsale`,`brand`,`create_time`,`update_time`)VALUES($mycid,'$mytitle','$mytitle','$mytitle',$myoldp,$myprice,$mytime,$mylong,'$myurl','$mypic',$mymouthsale,'$myid',$mytime,$mytime);";	
			
			
			$outstring = $outstring.$myinsert."\n";
			}
			
		}
		print_r($outstring);

		//向文件里写入一些数据
		fwrite ($fp, $outstring);
		//file_put_contents($fp,$outstring);
		
		//当打开一个文件的时候，习惯性的将它关闭掉
		fclose ( $fp );

	}
	
}



?>