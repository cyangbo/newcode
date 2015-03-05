<?php

	if(!extension_loaded('sockets')) 
{ 
if(strtoupper(substr(PHP_OS,3)) =="WIN") 
{ 
dl('php_sockets.dll');
}
else
{
dl('sockets.so'); 
} 
}
//$buf = "";
$server_ip = "127.0.0.1";//这里输入服务器端IP地址
$port = 80; //这里是端口号
$buf= $_SERVER['SERVER_NAME']  . $_SERVER["REQUEST_URI"]; 
$sock=@socket_create(AF_INET,SOCK_DGRAM,0);
if(!@socket_sendto($sock,$buf,strlen($buf),0,$server_ip,$port)){
echo "send error\n";
socket_close($sock);
exit();
}

//服务端30秒后自动关闭，接收的数据保存在同目录下的data.txt中。
//set_time_limit(0); // 执行时间为无限制，php默认的执行时间是30秒
//set_time_limit(0); // 执行时间为无限制，php默认的执行时间是30秒
$socket =@socket_create(AF_INET,SOCK_DGRAM,SOL_UDP);
$name = '127.0.0.1';
$port = '80';
socket_bind($socket, '127.0.0.1', '80');
while (true)
{
sleep(1);
socket_recvfrom($socket, $content, 1024, 0, $name, $port);
if($content == $buf){
	break;
	}
}
//24546346234623454
socket_close($socket);


echo "1234567890";
$fh = fopen('index.html','r');
echo $fh;


?>