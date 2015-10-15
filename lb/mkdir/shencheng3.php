<?php
error_reporting(E_ERROR);
set_time_limit(0);
$dir= dirname(__FILE__);
//print_r('dir'.$dir.'<br><br>');		//dirD:\wamp\www\newcode\lb\mkdir
/**
 * 
dir参数输出:D:\wamp\www\newcode\lb\mkdir

have get $html获取到页面内容

have get $$keylist获取到关键词数组内容

have get $mululist获取到首拼数组内容

have get $miaoshu获取到描述数组内容

关键词数量:2709

读取的文章内容路径:D:\wamp\www\newcode\lb\mkdir/wenzhan/0.txt

字符串title替换为0.txt第一行内容:第002章　大难不死，必要报复 

file文件内容写入路径:360.doc/index.html

生成一个测试
 */
//print_r('dir参数输出:'.$dir.'<br><br>');

$ext='index.html';

$tkeycount=260; //模板中友情链接数量

function rarray_rand( $arr ){
	return mt_rand( 0, count( $arr ) - 1 );
}
function varray_rand( $arr ) {
	return $arr[rarray_rand($arr)];
}

function get_folder_files($folder) {
	$fp = opendir($folder);
	while(false != $file = readdir($fp) ) {

	    if($file!='.' &&$file!='..') {
	        $file="$file";
	        $arr_file[]=$file;
	    }
	}
	closedir($fp);
	return $arr_file;
}
function createdir($hostpath,$html,$filename){

	
	$file=$hostpath.'/'.$filename;
	//print_r($file);exit('file');
	//360.doc/index.html
	//print_r('file文件内容写入路径:'.$file.'<br><br>');
	$oldumask=umask(0);
	@mkdir($hostpath.'/');
	@umask($oldumask);
	@chmod($hostpath.'/', 0777);
	$james=fopen($file,"w");
	fwrite($james,$html);
	fclose($james);
	//exit('生成一个测试');
}
	$html=file_get_contents($dir."/hemaomuban.html");		//模板内容
	//print_r($html);exit;	
	/* if($html){
		print_r('have get $html获取到页面内容<br><br>');
	}else{
		print_r('not $html<br><br>');
	} */
	$keylist = file( $dir."/guanjianci.txt");				//关键词数组
	/* if($keylist){
		print_r('have get $$keylist获取到关键词数组内容<br><br>');
	}else{
		print_r('not $keylist<br><br>');
	} */
	//print_r($keylist);exit;
	$mululist =  file( $dir."/pinying.txt");				//首拼数组
	/* if($mululist){
		print_r('have get $mululist获取到首拼数组内容<br><br>');
	}else{
		print_r('not $mululist<br><br>');
	} */
	//print_r($mululist);exit;		
	
	$miaoshu =  file( $dir."/miaoshu.txt");					//描述数组
	//print_r($miaoshu);exit;
	/* if($miaoshu){
		print_r('have get $miaoshu获取到描述数组内容<br><br>');
	}else{
		print_r('not $miaoshu<br><br>');
	} */
	
	$rand = count(explode('$rand$', $html)) - 1;
	//print_r($rand);exit;		//0
	$app='';
	$fenye='';
	//print_r(count($keylist));exit;						//2709
	//循环关键词
	//print_r('关键词数量:'.count($keylist).'<br><br>');
	for($j=0;$j<count($keylist);$j++){
		$temphtml=$html;
		//print_r($dir."/wenzhan/".$j.".txt");exit('sstt');
		//D:\wamp\www\newcode\lb\mkdir/wenzhan/0.txt
		//print_r('读取的文章内容路径:'.$dir."/wenzhan/".$j.".txt".'<br><br>');
		$w=file($dir."/wenzhan/".$j.".txt");
		//$w=file($dir."/wenzhan/1.txt");
		//print_r($w);exit('$w');		//获取wenzhan/0.txt的文章(bug,当$j不为0时,$w为空
		//print_r($temphtml);exit('$tempthml');
		//print_r($w[0]);exit;		//0.txt第一行内容
		//print_r('字符串title替换为0.txt第一行内容:'.$w[0].'<br><br>');
		$temphtml = str_replace('$title$' , trim($w[0]), $temphtml);		//字符串title替换为0.txt第一行内容
		
		array_splice($w,0,1); //删除第一个元素
		//print_r($w);exit('$w');
		$temphtml = str_replace('$content$' ,implode('',$w) , $temphtml);

		$temphtml = str_replace('$miaoshu$' ,trim(varray_rand($miaoshu)) , $temphtml);
		$temphtml = str_replace('$rand$' ,rand(50,200) , $temphtml);

		
		/**
		 * 替换模板中标题和标题链接
		 */
		for($k=1;$k<=$tkeycount;$k++){
			$tarr= rand(0,count($keylist))-1;
			$temphtml = str_replace('$tkey'.$k.'$' ,trim($keylist[$tarr]) , $temphtml);
			$temphtml = str_replace('$turl'.$k.'$' ,trim($mululist[$tarr]) , $temphtml);
		}

		for ($i=0; $i<$rand; $i++) {
			$temphtml = preg_replace('/\$rand\$/',rand(50,200), $temphtml, 1);
		}

		$temphtml = str_replace('$date$' ,date('Y-m-d',time()) , $temphtml);
		$temphtml = str_replace('$time$' ,date('H:i:s',time()) , $temphtml);
		$temphtml = str_replace('$ekey$' ,trim($keylist[$j]) , $temphtml);
		$temphtml = str_replace('$eurl$' ,trim($mululist[$j]) , $temphtml);

		$temphtml = str_replace('$date$' ,date('Y-m-d',time()) , $temphtml);
		$temphtml = str_replace('$time$' ,date('H:i:s',time()) , $temphtml);
		$temphtml = str_replace('$ekey$' ,trim($keylist[$j]) , $temphtml);
		$temphtml = str_replace('$eurl$' ,trim($mululist[$j]) , $temphtml);



		if($j==0){
			$fenye='<div><p>没有上一页</p><p><a href="../'.$mululist[$j+1].'">下一页</a></p></div>';

			$temphtml = str_replace('$skey$' ,'没有上一页' , $temphtml);
			$temphtml = str_replace('$surl$' ,'#' , $temphtml);
			$temphtml = str_replace('$xkey$' ,trim($keylist[$j+1]) , $temphtml);
			$temphtml = str_replace('$xurl$' ,trim($mululist[$j+1]) , $temphtml);

                }else if($j==count($keylist)-1){ 
			$fenye='<div><p><a href="../'.$mululist[$j-1].'">上一页</a></p><p>没有下一页</p></div>';
			$temphtml = str_replace('$skey$' ,trim($keylist[$j-1]) , $temphtml);
			$temphtml = str_replace('$surl$' ,trim($mululist[$j-1]) , $temphtml);
			$temphtml = str_replace('$xkey$' ,'没有下一页' , $temphtml);
			$temphtml = str_replace('$xurl$' ,'#' , $temphtml);

		}else{
			$fenye='<div><p><a href="../'.$mululist[$j-1].'">上一页</a></p><p><a href="../'.$mululist[$j+1].'">下一页</a></p></div>';
			$temphtml = str_replace('$skey$' ,trim($keylist[$j-1]) , $temphtml);
			$temphtml = str_replace('$surl$' ,trim($mululist[$j-1]) , $temphtml);
			$temphtml = str_replace('$xkey$' ,trim($keylist[$j+1]) , $temphtml);
			$temphtml = str_replace('$xurl$' ,trim($mululist[$j+1]) , $temphtml);
                }
		
		$temphtml = str_replace('$fenye$' ,$fenye , $temphtml);
		$app=$app.trim($mululist[$j]).'#'.trim($keylist[$j]).'$';
		//print_r($app);exit('app');		//360.doc#360.doc$app
		createdir(trim($mululist[$j]),$temphtml,$ext);		//生成文件
	}
	echo $app." <br/>生成完成！";
	createdir('app',$app,'app.txt');
?>