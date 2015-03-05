<?php
//header("Location:www.baidu.com");

//echo PHP_OS;
//print_r($_SERVER['HTTP_REFERER']);

//print_r(stristr($_SERVER['HTTP_REFERER'], 'site%3A'));

/*$cc = 'abcdefg';
$dd = 'h';

if(stristr($cc, $dd)){
		print_r(stristr($cc, $dd));
	}	
		*/
	//echo 'hello';
	

//$clserv = & $_SERVER;
//print_r($clserv);
$relset_host = "www5.dangci888.com";
print_r(md5($relset_host));
echo "<br/>";
print_r(substr(md5($relset_host), 26));


?>