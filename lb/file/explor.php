<?php
/**
 * 采集的英文名,按照规则排版,放到另外txt文件
 * 
 * 采集:English.txt
 * 输出:newname.txt
 */
//得到一个文件的内容,按照每行来分组存放在一个数组中
			$array_file = file("english.txt");
			//创建一个文件
			$fp = fopen("newname.txt",'w');
			$outstring = '';
			
			//如果有一行数据,就执行下面操作
			foreach ($array_file as $key => $value){
				//$key第一行的值是0,$value是每一行的字符串	
				//清除一下两边空格
				$str = trim($value);
				$cc = explode('?',$str);
				$a = $cc[0];
				$b = $cc[1];
				
				$outstring = $outstring.$a." ".$b."\r\n";
			}
				
				
				
			
		//向文件里写入一些数据
		fwrite($fp,$outstring,strlen($outstring));
	
		//当打开一个文件的时候，习惯性的将它关闭掉
		fclose($fp);	
?>