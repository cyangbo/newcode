<?php 

require_once 'simple_html_dom.php';

set_time_limit(0);
		//$myfile = 'D:\wamp\www\test\execl\getitem';
		//$usefile = 'D:\wamp\www\test\execl\useitem';
		//得到一个文件的内容,按照每行来分组存放在一个数组中
		$array_file = file ( 'getitem/15.txt'  );
		echo "15\n";
		//创建一个文件
		//$fp = fopen ( 'useitem/test.txt', 'w' );
		$outstring = '';
		
		
		//如果有一行数据,就执行下面操作
		foreach ( $array_file as $key => $value ) {
			
			$mystring = $value;
			
			$html = file_get_html($mystring);
			foreach($html->find('.tb-selected') as $element) {
			
			    $pattern = '/http.*?\.jpg/';
				preg_match($pattern, $element, $matches);
				echo $matches[0]."\n";
				//$outstring = $outstring.$matches[0]."\n";
			}
		}	
		//print_r($outstring);
		//向文件里写入一些数据
		//fwrite ($fp, $outstring);
		//file_put_contents($fp,$outstring);
		
		//当打开一个文件的时候，习惯性的将它关闭掉
	//	fclose ( $fp );




?>