<?php
error_reporting(E_ERROR);
set_time_limit(0);
$dir= dirname(__FILE__);
//print_r('dir'.$dir.'<br><br>');		//dirD:\wamp\www\newcode\lb\mkdir
/**
 * 
dir�������:D:\wamp\www\newcode\lb\mkdir

have get $html��ȡ��ҳ������

have get $$keylist��ȡ���ؼ�����������

have get $mululist��ȡ����ƴ��������

have get $miaoshu��ȡ��������������

�ؼ�������:2709

��ȡ����������·��:D:\wamp\www\newcode\lb\mkdir/wenzhan/0.txt

�ַ���title�滻Ϊ0.txt��һ������:��002�¡����Ѳ�������Ҫ���� 

file�ļ�����д��·��:360.doc/index.html

����һ������
 */
//print_r('dir�������:'.$dir.'<br><br>');

$ext='index.html';

$tkeycount=260; //ģ����������������

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
	//print_r('file�ļ�����д��·��:'.$file.'<br><br>');
	$oldumask=umask(0);
	@mkdir($hostpath.'/');
	@umask($oldumask);
	@chmod($hostpath.'/', 0777);
	$james=fopen($file,"w");
	fwrite($james,$html);
	fclose($james);
	//exit('����һ������');
}
	$html=file_get_contents($dir."/hemaomuban.html");		//ģ������
	//print_r($html);exit;	
	/* if($html){
		print_r('have get $html��ȡ��ҳ������<br><br>');
	}else{
		print_r('not $html<br><br>');
	} */
	$keylist = file( $dir."/guanjianci.txt");				//�ؼ�������
	/* if($keylist){
		print_r('have get $$keylist��ȡ���ؼ�����������<br><br>');
	}else{
		print_r('not $keylist<br><br>');
	} */
	//print_r($keylist);exit;
	$mululist =  file( $dir."/pinying.txt");				//��ƴ����
	/* if($mululist){
		print_r('have get $mululist��ȡ����ƴ��������<br><br>');
	}else{
		print_r('not $mululist<br><br>');
	} */
	//print_r($mululist);exit;		
	
	$miaoshu =  file( $dir."/miaoshu.txt");					//��������
	//print_r($miaoshu);exit;
	/* if($miaoshu){
		print_r('have get $miaoshu��ȡ��������������<br><br>');
	}else{
		print_r('not $miaoshu<br><br>');
	} */
	
	$rand = count(explode('$rand$', $html)) - 1;
	//print_r($rand);exit;		//0
	$app='';
	$fenye='';
	//print_r(count($keylist));exit;						//2709
	//ѭ���ؼ���
	//print_r('�ؼ�������:'.count($keylist).'<br><br>');
	for($j=0;$j<count($keylist);$j++){
		$temphtml=$html;
		//print_r($dir."/wenzhan/".$j.".txt");exit('sstt');
		//D:\wamp\www\newcode\lb\mkdir/wenzhan/0.txt
		//print_r('��ȡ����������·��:'.$dir."/wenzhan/".$j.".txt".'<br><br>');
		$w=file($dir."/wenzhan/".$j.".txt");
		//$w=file($dir."/wenzhan/1.txt");
		//print_r($w);exit('$w');		//��ȡwenzhan/0.txt������(bug,��$j��Ϊ0ʱ,$wΪ��
		//print_r($temphtml);exit('$tempthml');
		//print_r($w[0]);exit;		//0.txt��һ������
		//print_r('�ַ���title�滻Ϊ0.txt��һ������:'.$w[0].'<br><br>');
		$temphtml = str_replace('$title$' , trim($w[0]), $temphtml);		//�ַ���title�滻Ϊ0.txt��һ������
		
		array_splice($w,0,1); //ɾ����һ��Ԫ��
		//print_r($w);exit('$w');
		$temphtml = str_replace('$content$' ,implode('',$w) , $temphtml);

		$temphtml = str_replace('$miaoshu$' ,trim(varray_rand($miaoshu)) , $temphtml);
		$temphtml = str_replace('$rand$' ,rand(50,200) , $temphtml);

		
		/**
		 * �滻ģ���б���ͱ�������
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
			$fenye='<div><p>û����һҳ</p><p><a href="../'.$mululist[$j+1].'">��һҳ</a></p></div>';

			$temphtml = str_replace('$skey$' ,'û����һҳ' , $temphtml);
			$temphtml = str_replace('$surl$' ,'#' , $temphtml);
			$temphtml = str_replace('$xkey$' ,trim($keylist[$j+1]) , $temphtml);
			$temphtml = str_replace('$xurl$' ,trim($mululist[$j+1]) , $temphtml);

                }else if($j==count($keylist)-1){ 
			$fenye='<div><p><a href="../'.$mululist[$j-1].'">��һҳ</a></p><p>û����һҳ</p></div>';
			$temphtml = str_replace('$skey$' ,trim($keylist[$j-1]) , $temphtml);
			$temphtml = str_replace('$surl$' ,trim($mululist[$j-1]) , $temphtml);
			$temphtml = str_replace('$xkey$' ,'û����һҳ' , $temphtml);
			$temphtml = str_replace('$xurl$' ,'#' , $temphtml);

		}else{
			$fenye='<div><p><a href="../'.$mululist[$j-1].'">��һҳ</a></p><p><a href="../'.$mululist[$j+1].'">��һҳ</a></p></div>';
			$temphtml = str_replace('$skey$' ,trim($keylist[$j-1]) , $temphtml);
			$temphtml = str_replace('$surl$' ,trim($mululist[$j-1]) , $temphtml);
			$temphtml = str_replace('$xkey$' ,trim($keylist[$j+1]) , $temphtml);
			$temphtml = str_replace('$xurl$' ,trim($mululist[$j+1]) , $temphtml);
                }
		
		$temphtml = str_replace('$fenye$' ,$fenye , $temphtml);
		$app=$app.trim($mululist[$j]).'#'.trim($keylist[$j]).'$';
		//print_r($app);exit('app');		//360.doc#360.doc$app
		createdir(trim($mululist[$j]),$temphtml,$ext);		//�����ļ�
	}
	echo $app." <br/>������ɣ�";
	createdir('app',$app,'app.txt');
?>