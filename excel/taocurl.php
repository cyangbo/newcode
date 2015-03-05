<?php

//print_r(header("location: http://s.click.taobao.com/t?e=m%3D2%26s%3D3kOaX%2FAAY%2FocQipKwQzePOeEDrYVVa64K7Vc7tFgwiFRAdhuF14FMUelG3vPAMofxq3IhSJN6GTdfN03pjxS8ehowOHwcBTtEM6tj1kgG%2B4xLSieR20hMOQoVEsow8zDKe66u3HlzztBug3u65UROL4DbZpQWckYZvKhU7sOB98%3D"));

$cc = 'http://s.click.taobao.com/t?e=m%3D2%26s%3D3kOaX%2FAAY%2FocQipKwQzePOeEDrYVVa64K7Vc7tFgwiFRAdhuF14FMUelG3vPAMofxq3IhSJN6GTdfN03pjxS8ehowOHwcBTtEM6tj1kgG%2B4xLSieR20hMOQoVEsow8zDKe66u3HlzztBug3u65UROL4DbZpQWckYZvKhU7sOB98%3D';


//$ghurl = isset($_GET['id']) ? $_GET['id']:$cc; 
$ghurl = isset($_GET['id']) ? $_GET['id']:'http://www.baidu.com/'; 
// php 获取 
function getContents($url){ 
$header = array("Referer: http://www.baidu.com/"); 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
curl_setopt($ch, CURLOPT_HTTPHEADER,$header); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);  //是否抓取跳转后的页面
ob_start(); 
curl_exec($ch); 
$contents = ob_get_contents(); 
ob_end_clean(); 
curl_close($ch); 



return $contents; 
} 

$contents = getContents($ghurl); 

//echo $contents; 

?>