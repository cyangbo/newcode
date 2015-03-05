<?php 
 


 /*
  * 单一功能
  * 用来采集url中所有单个商品的代码,保存在t.txt中,
  */

	$url = "http://zheyouxuan.com/caiji/zhe8003.php?cat=http://zhe800.uz.taobao.com/d/taofushi?tag_id=2&type=%D5%DB800_%C5%AE%D7%B01&file=1";// 链接地址
	
	$handle = fopen ($url, "rb"); 
	//创建一个文件
	$fp = fopen ( 't.txt', 'w' );
	$contents = ""; 
	do { 
		$data = fread($handle, 1024); 
		if (strlen($data) == 0) { 
		break; 
		} 
		$contents .= $data; 
	} while(true); 
	fwrite ($fp, $contents);
	fclose ($handle); 
	fclose ($fp); 


	
/*
 * 读取一个页面的源码,如果一行是以[开头的,那么就拿到,其他行去掉,保存在文件tt.txt中
 * 
 */
	//得到一个文件的内容,按照每行来分组存放在一个数组中
	$array_file = file ( 't.txt' );
	//创建一个文件
	$fp = fopen ( 'tt.txt', 'w' );
	$outstring = '';
	
	for ($i=0;$i<count($array_file);$i++){
		
		$mode = '/^\[/';   //规则模式,匹配[开头的行
		$string = $array_file[$i];   //字符串
		if(preg_match($mode,$string)){
			$outstring = $outstring.$array_file[$i];
		}
	}
	//向文件里写入一些数据
	fwrite ($fp, $outstring);
	//当打开一个文件的时候，习惯性的将它关闭掉
	fclose ( $fp );

	
	
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


/**
 * 读取tt.txt文件
 * 得到数据,处理成sql语句的样子,保存在t.txt中
 */
	//得到一个文件的内容,按照每行来分组存放在一个数组中
	$array_file = file ( 'tt.txt' );
	//创建一个文件
	$fp = fopen ( 't.txt', 'w' );
	$outstring = '';
	
	//如果有一行数据,就执行下面操作
	foreach ( $array_file as $key => $value ) {
		//$key第一行的值是0,$value是每一行的字符串	
		//清除一下两边空格
		$mystring = trim ( $value );
		if (strlen ( $mystring ) > 0) {
		 
		@$myarr = preg_split('/[>,}]/', $mystring);
		
		@$mytable = "yufu_product";
		@$myday = 5;
		@$mycid = 666;
		
		@$myurl = $myarr[2];
		@$mypic = substr($myarr[4],0,-12);
		@$myid = substr($myurl,-11);
		if(mb_strlen( $mystring ) > 38) {
			@$mytitle = _title($myarr[6],38);
		}else{
			@$mytitle = $myarr[6];
		}

		@$myprice = $myarr[8];
		@$myoldp = $myarr[10];
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


?>