<?php 
 
function _title($_string,$_strlen) {
	if (mb_strlen($_string,'utf-8') > $_strlen) {
		$_string = mb_substr($_string,0,$_strlen,'utf-8');
	}
	return $_string;
}


/*
 * 把collecta.php文件实现的3个功能封装成一个函数,传入2个数据
 */
function _zhe800($url,$uid){
				
	$murl = $url;// 链接地址
	$muid = $uid;//类目id
	
	
	
	/**
	 * 用来采集url中所有单个商品的代码,保存在t.txt中
	 */
	$handle = fopen ($murl, "rb"); 	
	//创建一个文件,存放网址获取的内容
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


	/**
	 * 读取一个页面的源码t.txt,如果一行是以[开头的,那么就拿到,其他行去掉,保存在文件tt.txt中
	 */
	//数组逐行读取内容
	$array_file = file ( 't.txt' );
	//创建一个文件
	$fp2 = fopen ( 't.txt', 'w' );
	$outstring = '';		
	for ($i=0;$i<count($array_file);$i++){			
		$mode = '/^\[/';   //规则模式
		$string = $array_file[$i];   //字符串
		if(preg_match($mode,$string)){
			$outstring = $outstring.$array_file[$i]."\n";
		}
	}
	fwrite ($fp2, $outstring);
	//当打开一个文件的时候，习惯性的将它关闭掉
	fclose ( $fp2 );

	
	
	 /**
	 * 读取tt.txt文件
	 * 得到数据,处理成sql语句的样子,保存在t.txt中
	 */
	//得到一个文件的内容,按照每行来分组存放在一个数组中
	$array_file3 = file ( 't.txt' );
	//创建一个文件
	$fp3 = fopen ( 't.txt', 'w' );
	$outstring3 = '';
	
	//如果有一行数据,就执行下面操作
	foreach ( $array_file3 as $key => $value ) {
		//$key第一行的值是0,$value是每一行的字符串	
		//清除一下两边空格
		$mystring = trim ( $value );
		if (strlen ( $mystring ) > 0) {
		 
			@$myarr = preg_split('/[>,}]/', $mystring);
			/*print_r($myarr);
			[2] => http://detail.tmall.com/item.htm?id=27379468265
		    [3] => [img]=
		    [4] => http://img01.taobaocdn.com/bao/uploaded/i1/TB1MkJ9GpXXXXakXpXXXXXXXXXX_!!0-item_pic.jpg_290x290.jpg
		    [5] => [title]=
		    [6] => 圆领刺绣太阳花毛衣 原价168元 拍下价格33元多数地区包邮
		    [7] => [pirce]=
		    [8] => 33
		    [9] => [opirce]=
		    [10] => 168*/
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
			$myinsert = "INSERT INTO `$mytable`(`catid`,`sitetitle`,`keywords`,`title`,`price`,`hdprice`,`starttime`,`endtime`,`buyurl`,`thumb`,`monthsale`,`brand`,`create_time`,`update_time`)VALUES($muid,'$mytitle','$mytitle','$mytitle',$myoldp,$myprice,$mytime,$mylong,'$myurl','$mypic',$mymouthsale,'$myid',$mytime,$mytime);";		
			$outstring3 = $outstring3.$myinsert."\n";
		}
	}	
	fwrite ($fp3, $outstring3);
	//当打开一个文件的时候，习惯性的将它关闭掉
	fclose ( $fp3 );
	echo "<script type='text/javascript'>alert('采集成功');location.href='http://mycode.com/collect/collectcc.php';</script>";	
	}
?>