<?php
/**
 *2015年7月31日PHP
 *
 *在Windows和centos中运行的结果是有差别的
 *
 */

$query_string = $_SERVER["QUERY_STRING"];	//查询(query)的字符串,获取的是?后面的值
$request_url = $_SERVER["REQUEST_URI"];		//访问此页面所需的URI,获取域名http://newcode.com后面的值,包括/
$script_name = $_SERVER["SCRIPT_NAME"];		//包含当前脚本的路径
$php_self = $_SERVER["PHP_SELF"];			//当前正在执行脚本的文件名

print_r($query_string);echo "<br>";
print_r($request_url);echo "<br>";
print_r($script_name);echo "<br>";
print_r($php_self);echo "<br>";

/**
 * 访问网址:http://newcode.com/basic/global/_SERVER.PHP?p=222&q=biuuu
 * 输出:   在Windows和centos中运行的结果是有差别的
 * p=222&q=biuuu
 * /basic/global/_SERVER.PHP?p=222&q=biuuu
 * /basic/global/_SERVER.PHP
 * /basic/global/_SERVER.PHP
 */

/**
 * 当前url:
 * "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']
 * http://newcode.com/basic/global/_SERVER.PHP
 */
echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."<br>";


echo $_SERVER['DOCUMENT_ROOT']."<br>"; //获得服务器文档根变量
echo $_SERVER['PHP_SELF']."<br>"; //获得执行该代码的文件服务器绝对路径的变量
echo __FILE__."<br>"; //获得文件的文件系统绝对路径的变量
echo dirname(__FILE__)."<br>"; //获得文件所在的文件夹路径的函数

/**
 * D:/wamp/www/newcode
 * /basic/global/_SERVER.PHP
 * D:\wamp\www\newcode\basic\global\_SERVER.php
 * D:\wamp\www\newcode\basic\global
 */


print_r($_SERVER);

/**  本地服务器
Array
(
		[HTTP_HOST] => newcode.com
		[HTTP_CONNECTION] => keep-alive
		[HTTP_CACHE_CONTROL] => max-age=0
		[HTTP_ACCEPT] => text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,* / *;q=0.8
		[HTTP_USER_AGENT] => Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36
		[HTTP_ACCEPT_ENCODING] => gzip, deflate, sdch
		[HTTP_ACCEPT_LANGUAGE] => zh-CN,zh;q=0.8
		[HTTP_COOKIE] => a2404_times=7
		[PATH] => C:\Program Files (x86)\Java\jdk1.8.0_31\bin;C:\Program Files (x86)\Java\jdk1.8.0_31\jre\bin;;C:\Program Files (x86)\WinMerge;C:\Program Files (x86)\ATI Technologies\ATI.ACE\Core-Static;
		[SystemRoot] => C:\Windows
		[COMSPEC] => C:\Windows\system32\cmd.exe
		[PATHEXT] => .COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC
		[WINDIR] => C:\Windows
		[SERVER_SIGNATURE] => <address>Apache/2.4.9 (Win64) PHP/5.5.12 Server at newcode.com Port 80</address>

		[SERVER_SOFTWARE] => Apache/2.4.9 (Win64) PHP/5.5.12
		[SERVER_NAME] => newcode.com
		[SERVER_ADDR] => 127.0.0.1
		[SERVER_PORT] => 80
		[REMOTE_ADDR] => 127.0.0.1
		[DOCUMENT_ROOT] => D:/wamp/www/newcode
		[REQUEST_SCHEME] => http
		[CONTEXT_PREFIX] =>
		[CONTEXT_DOCUMENT_ROOT] => D:/wamp/www/newcode
		[SERVER_ADMIN] => admin@example.com
		[SCRIPT_FILENAME] => D:/wamp/www/newcode/basic/global/_SERVER.php
		[REMOTE_PORT] => 61206
		[GATEWAY_INTERFACE] => CGI/1.1
		[SERVER_PROTOCOL] => HTTP/1.1
		[REQUEST_METHOD] => GET
		[QUERY_STRING] =>
		[REQUEST_URI] => /basic/global/_SERVER.PHP
		[SCRIPT_NAME] => /basic/global/_SERVER.PHP
		[PHP_SELF] => /basic/global/_SERVER.PHP
		[REQUEST_TIME_FLOAT] => 1438327732.942
		[REQUEST_TIME] => 1438327732
		)

*/

/* 远程阿里云服务器
Array
(
		[HTTP_HOST] => mycode.djmsm.com
		[HTTP_USER_AGENT] => Mozilla/5.0 (Windows NT 6.1; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0
		[HTTP_ACCEPT] => text/html,application/xhtml+xml,application/xml;q=0.9,* /*;q=0.8
		[HTTP_ACCEPT_LANGUAGE] => zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3
		[HTTP_ACCEPT_ENCODING] => gzip, deflate
		[HTTP_COOKIE] => PHPSESSID=fmvr649u276hln4cqicf5mi3u3
		[HTTP_CONNECTION] => keep-alive
		[PATH] => /sbin:/usr/sbin:/bin:/usr/bin
		[SERVER_SIGNATURE] => <address>Apache/2.2.15 (CentOS) Server at mycode.djmsm.com Port 80</address>

		[SERVER_SOFTWARE] => Apache/2.2.15 (CentOS)
		[SERVER_NAME] => mycode.djmsm.com
		[SERVER_ADDR] => 120.24.177.172
		[SERVER_PORT] => 80
		[REMOTE_ADDR] => 113.118.75.41
		[DOCUMENT_ROOT] => /var/www/mycode
		[SERVER_ADMIN] => admin@localhost
		[SCRIPT_FILENAME] => /var/www/mycode/index.php
		[REMOTE_PORT] => 61643
		[GATEWAY_INTERFACE] => CGI/1.1
		[SERVER_PROTOCOL] => HTTP/1.1
		[REQUEST_METHOD] => GET
		[QUERY_STRING] =>
		[REQUEST_URI] => /
		[SCRIPT_NAME] => /index.php
		[PHP_SELF] => /index.php
		[REQUEST_TIME] => 1438330591
		)

		*/
/**
 *End of file
 *Location:_SERVER.php
*/