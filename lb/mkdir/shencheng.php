<?php
error_reporting(E_ERROR);
set_time_limit(0);
$dir= dirname(__FILE__);
print_r('dir'.$dir.'<br><br>');
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
	$oldumask=umask(0);
	@mkdir($hostpath.'/');
	@umask($oldumask);
	@chmod($hostpath.'/', 0777);
	$james=fopen($file,"w");
	fwrite($james,$html);
	fclose($james);
}
        $html=file_get_contents($dir."\hemaomuban.html");
        $keylist = file( $dir."\guanjianci.txt");
	$mululist =  file( $dir."\pinying.txt");

	$miaoshu =  file( $dir."\miaoshu.txt");
	$rand = count(explode('$rand$', $html)) - 1;
	$app='';
	$fenye='';
	for($j=0;$j<count($keylist);$j++){
		$temphtml=$html;
		$w=file($dir."/wenzhan/".$j.".txt");
		$temphtml = str_replace('$title$' , trim($w[0]), $temphtml);
		array_splice($w,0,1); //删除第一个元素
		$temphtml = str_replace('$content$' ,implode('',$w) , $temphtml);

		$temphtml = str_replace('$miaoshu$' ,trim(varray_rand($miaoshu)) , $temphtml);
		$temphtml = str_replace('$rand$' ,rand(50,200) , $temphtml);

		
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
		createdir(trim($mululist[$j]),$temphtml,$ext);
	}
	echo $app." <br/>生成完成！";
	createdir('app',$app,'app.txt');
?>