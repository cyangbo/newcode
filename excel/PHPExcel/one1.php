<?php  
/** 
 * 该文件只是单纯的读取excel文件 
 */  
header('Content-Type:text/html;charset=utf-8');//设置php页面字符集  
require_once 'lib/PHPExcel.php';  //phpexcel主程序文件
require_once 'lib/PHPExcel/Reader/Excel2007.php';  //07版excel配置文件
require_once 'lib/PHPExcel/Reader/Excel5.php';  
include_once 'lib/PHPExcel/IOFactory.php';  


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

//文件名包含
$path = 'D:\wamp\www\test\excel\PHPExcel\one';
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
		
		//得到一个文件的内容,按照每行来分组存放在一个数组中
		$array_file = file ( 'one/' . $val );
		//创建一个文件
		$fp = fopen ( 'two/' . preg_replace('/(.xlsx)/','.txt',$val), 'w' );
		$outstring = '';

		 //创建新的PHPExcel对象  
		$objexcel=new PHPExcel();  
		$php_reader = new PHPExcel_Reader_Excel2007();  
		$objexcel->setActiveSheetIndex(0)->setCellValue('A1', '中文');  
  

		$excelFileUrl = $path.'\\'.$val;//xlsx文件路径  
		//print_r($excelFileUrl);
		if(file_exists($excelFileUrl))  
		{  
		    $php_reader->canRead($excelFileUrl);  
		  
		    $objexcel = $php_reader->load($excelFileUrl);  
		      
		    $current_sheet =$objexcel->getSheet(0);  
		      
		    $all_column =$current_sheet->getHighestColumn();//获取excel文件里的最大列标  
		    $all_row =$current_sheet->getHighestRow();//获取excel文件里的最大行标  
		  
		    $excelFileArray=array();  
		    
		    //存放网址
		    $myurl = array();
		    
		    //存放商品数据
		    $mydata = array();
		    
		    //循环列标和行标  
		    //将取得内容组成一个二维数组 格式： Array['列标']['行标']['value']=值  
		     for($r = 0; $r <= $all_row; $r++)  
		      
		    {  
		    		//			
		        for($c = 'A'; $c <= $all_column; $c++)  
		        {  
		            $SerialNum = $c.$r;//excel文件里的坐标。即列标与行数结合  
		            $content = $current_sheet->getCell($SerialNum)->getValue();//获取excel文件里当前坐标下（文本框）的内容 
		            $myurlc =$current_sheet->getCell($SerialNum)->getHyperlink()->getUrl();//获取excel文件里当前坐标下超链接
		         /*    if(is_object($myurlc)){
		             	$myurlc = $myurlc->__toString();  
		             	
		             }*/
		             	//$myurld = $myurlc[$c][$r]['content'];
		             //	print_r($myurl);
		             	
		            if($c == 'F'){
		            	//从第二行有超链接开始输出
		            	//echo $myurlc;
		            	//echo "<br>";
		            	$myurl[$c][$r] = $myurlc;
		            	//echo $myurl[$c][$r];
		            	
		            }
                         	//print_r($myurlc);
		              //print_r($current_sheet->getCell($SerialNum)->getHyperlink());
		            //如果当前坐标内的值为object对象类型  
		            if(is_object($content))  
		            {  
		                $content = $content->__toString();  
		            }  
		              
		            $excelFileArray[$c][$r]['content'] = $content; 
		  	             
		           // $myurl[$c][$r];
		            /*
		            $myarr = preg_split('/[>,}]/', $mystring);
					$mytable = "yufu_tuan";
					$myday = 5;		//天数
					$mycid = 215;	//类目id
					$myurl = $myarr[2];		//链接地址
					//$mypic = substr($myarr[4],0,-12);	//图片地址	无
					//$myid = substr($myurl,-11);		//商品id		无
					$mytitle = "";		//商品标题
					$myprice = $myarr[8];	//折扣价格
					$myoldp = $myarr[10];	//原价
					$mytime = time();	//现在时间
					$mylong = time()+($myday*24*60*60);		//截止时间
					$mykeywords = "";		
					//$mymouthsale = rand(500,1800);	//销量		无	
					$myinsert = "INSERT INTO `$mytable`(`catid`,`sitetitle`,`keywords`,`title`,`price`,`hdprice`,`starttime`,`endtime`,`buyurl`,`thumb`,`monthsale`,`brand`,`create_time`,`update_time`)VALUES($mycid,'$mytitle','$mytitle','$mytitle',$myoldp,$myprice,$mytime,$mylong,'$myurl','$mypic',$mymouthsale,'$myid',$mytime,$mytime);";			
					$outstring = $outstring.$myinsert."\n";
					*/
		           
 
		        }  
		        $mytable = "yufu_tuan";
		        $myday = 5;		//天数
		        $mytime = time();	//现在时间
				$mylong = time()+($myday*24*60*60);		//截止时间
				
		        $myuuu = $fff = $myurl['F'][$r];
		        $mycid = $aaa = $excelFileArray['A'][$r]['content'];
		        $mytitle = $bbb = $excelFileArray['B'][$r]['content'];
		        $myoldp = $ccc = $excelFileArray['C'][$r]['content'];
		        $myprice = $ddd = $excelFileArray['D'][$r]['content'];
		        $mycut = $eee = $excelFileArray['E'][$r]['content'];
		        $tuijian = $iii = $excelFileArray['I'][$r]['content'];
		        $mymouthsale = rand(500,1800);	//销量		无	
		        
		         
		         //echo $fff.$aaa.$bbb.$ccc.$ddd."\n\n\n";
		         $myinsert = "INSERT INTO `$mytable`(`catid`,`sitetitle`,`keywords`,`title`,`price`,`hdprice`,`starttime`,`endtime`,`buyurl`,`monthsale`,`create_time`,`update_time`)VALUES($mycid,'$mycut','$tuijian','$mytitle',$myoldp,$myprice,$mytime,$mylong,'$myuuu',$mymouthsale,$mytime,$mytime);";			
				 $outstring = $outstring.$myinsert."\n";
		        


		        
		    }  
		    //for($c = 'A'; $c <= $all_column; $c++)  结束
   
		      
		}  
		//if(file_exists($excelFileUrl))   结束
		 		print_r($outstring);

		//向文件里写入一些数据
		fwrite ($fp, $outstring);
		//file_put_contents($fp,$outstring);
		
		//当打开一个文件的时候，习惯性的将它关闭掉
		fclose ( $fp );
		//  var_dump($excelFileArray);  
		  //var_dump($myurl);
		
		
		
	}
	//foreach处理一个文件结束
}

  
  



?>