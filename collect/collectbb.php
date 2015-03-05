<?php 

function _title($_string,$_strlen) {
	if (mb_strlen($_string,'utf-8') > $_strlen) {
		$_string = mb_substr($_string,0,$_strlen,'utf-8');
	}
	return $_string;
}



function _zhe800($url,$uid,$today){
	$murl = $url;// 链接地址
	$muid = $uid;//类目id
	
/*	//判断目录是否存在
	if (!is_dir($today)) {
		mkdir('zhe800\\'.$today,0777);  //最大权限0777,意思是，如果没有这个目录，那么就创建
	} */
	
	$handle = fopen ($murl, "rb"); 
	$fp = fopen ( 'zhe800\\'.$today.'\\'.$uid.'.sql', 'w' );		//创建一个文件,存放网址获取的内容
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
	//数组逐行读取内容
	$array_file = file ( 'zhe800\\'.$today.'\\'.$uid.'.sql' );
	//创建一个文件
	$fp2 = fopen ( 'zhe800\\'.$today.'\\'.$uid.'.sql', 'w' );
	$outstring = '';		
	for ($i=0;$i<count($array_file);$i++){			
		$mode = '/^\[/';   //规则模式
		$string = $array_file[$i];   //字符串
		if(preg_match($mode,$string)){
			$outstring = $outstring.$array_file[$i]."\n";
		}
	}
	//print_r($outstring);
	//向文件里写入一些数据
	fwrite ($fp2, $outstring);
	//当打开一个文件的时候，习惯性的将它关闭掉
	fclose ( $fp2 );


	//得到一个文件的内容,按照每行来分组存放在一个数组中
	$array_file3 = file ( 'zhe800\\'.$today.'\\'.$uid.'.sql' );
	//创建一个文件
	$fp3 = fopen ( 'zhe800\\'.$today.'\\'.$uid.'.sql', 'w' );
	$outstring3 = '';
	
	//如果有一行数据,就执行下面操作
	foreach ( $array_file3 as $key => $value ) {
		//$key第一行的值是0,$value是每一行的字符串	
		//清除一下两边空格
		$mystring = trim ( $value );
		if (strlen ( $mystring ) > 0) {
			@$myarr = preg_split('/[>,}]/', $mystring);
			@$mytable = "yufu_product";	//表名,参数
			@$myday = 5;	//日期	
			@$myurl = $myarr[2];	//商品链接
			@$mypic = substr($myarr[4],0,-12);		//图片地址
			@$myid = substr($myurl,-11);		//商品id
			@$mytitle = $myarr[6];		//商品标题			
			@$myprice = $myarr[8];		//价格
			@$myoldp = $myarr[10];		//原价
			$mytime = time();
			$mylong = time()+($myday*24*60*60);
			$mymouthsale = rand(500,1800);		//销量随机数
			if($myurl!=null && $mypic!=null && $myid!=null && $mytitle!=null && $myprice!=null && $myoldp!=null){
				$myinsert = "INSERT INTO `$mytable`(`catid`,`sitetitle`,`keywords`,`title`,`price`,`hdprice`,`starttime`,`endtime`,`buyurl`,`thumb`,`monthsale`,`brand`,`create_time`,`update_time`)VALUES($muid,'$mytitle','$mytitle','$mytitle',$myoldp,$myprice,$mytime,$mylong,'$myurl','$mypic',$mymouthsale,'$myid',$mytime,$mytime);";		
				$outstring3 = $outstring3.$myinsert."\n";
			}			
		}
	}
	//print_r($outstring3);

	//向文件里写入一些数据
	fwrite ($fp3, $outstring3);
	
	//当打开一个文件的时候，习惯性的将它关闭掉
	fclose ( $fp3 );
	}
	
	function _zhe800a($url,$uid,$today){
	$murl = $url;// 链接地址
	$muid = $uid;//类目id
	

	
	$handle = fopen ($murl, "rb"); 
	$fp = fopen ( 'linshi.sql', 'w' );		//创建一个文件,存放网址获取的内容
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
	//数组逐行读取内容
	$array_file = file ( 'linshi.sql' );
	//创建一个文件
	$fp2 = fopen ( 'linshi.sql', 'w' );
	$outstring = '';		
	for ($i=0;$i<count($array_file);$i++){			
		$mode = '/^\[/';   //规则模式
		$string = $array_file[$i];   //字符串
		if(preg_match($mode,$string)){
			$outstring = $outstring.$array_file[$i]."\n";
		}
	}
	//print_r($outstring);
	//向文件里写入一些数据
	fwrite ($fp2, $outstring);
	//当打开一个文件的时候，习惯性的将它关闭掉
	fclose ( $fp2 );


	//得到一个文件的内容,按照每行来分组存放在一个数组中
	$array_file3 = file ( 'linshi.sql' );
	//创建一个文件
	$fp3 = fopen ( 'zhe800\\'.$today.'\\'.$uid.'.sql', 'a' );
	$outstring3 = '';
	
	//如果有一行数据,就执行下面操作
	foreach ( $array_file3 as $key => $value ) {
		//$key第一行的值是0,$value是每一行的字符串	
		//清除一下两边空格
		$mystring = trim ( $value );
		if (strlen ( $mystring ) > 0) {
			@$myarr = preg_split('/[>,}]/', $mystring);
			@$mytable = "yufu_product";	//表名,参数
			@$myday = 5;	//日期	
			@$myurl = $myarr[2];	//商品链接
			@$mypic = substr($myarr[4],0,-12);		//图片地址
			@$myid = substr($myurl,-11);		//商品id
			@$mytitle = $myarr[6];		//商品标题			
			@$myprice = $myarr[8];		//价格
			@$myoldp = $myarr[10];		//原价
			$mytime = time();
			$mylong = time()+($myday*24*60*60);
			$mymouthsale = rand(500,1800);		//销量随机数
			if($myurl!=null && $mypic!=null && $myid!=null && $mytitle!=null && $myprice!=null && $myoldp!=null){
			$myinsert = "INSERT INTO `$mytable`(`catid`,`sitetitle`,`keywords`,`title`,`price`,`hdprice`,`starttime`,`endtime`,`buyurl`,`thumb`,`monthsale`,`brand`,`create_time`,`update_time`)VALUES($muid,'$mytitle','$mytitle','$mytitle',$myoldp,$myprice,$mytime,$mylong,'$myurl','$mypic',$mymouthsale,'$myid',$mytime,$mytime);";		
			$outstring3 = $outstring3.$myinsert."\n";
			}
		}
	}
	fwrite ($fp3, $outstring3);
	fclose ( $fp3 );
	}
?>