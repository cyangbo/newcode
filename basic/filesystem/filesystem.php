<?php


	//将一个路径赋给一个变量
	//它目前来说，只是一个字符串，字符串表示的是一个目录的路径
	
	//文件名包含，文件的名称+文件的扩展名
	$path = 'D:\wamp\www\Basic6\Demo1.php';
	echo basename($path);
	//Demo1.php
	echo '<br />';
	
	//dirname返回路径的目录部分
	echo dirname($path);
	//D:\wamp\www\Basic6
	echo '<br />';
	
	//获取路径文件的信息
	print_r(pathinfo($path));
	//Array ( [dirname] => D:\wamp\www\Basic6 [basename] => Demo1.php [extension] => php [filename] => Demo1 ) 
	echo '<br />ccc';
	echo pathinfo($path['dirname']);
	//Array
	echo '<br />sss';
	echo pathinfo($path[0]);
	//Array	
	echo '<br />';
	$array_path = pathinfo($path);
	echo $array_path['dirname']; //这个打印出的是目录
	//D:\wamp\www\Basic6
	echo '<br />';
	echo $array_path['basename']; //这个打印出的是文件名
	//Demo1.php
	
	
	echo '<br />';
	//这个叫做绝对路径
	//$path = 'D:\wamp\www\test\basic\filesystem\filesystem.php';
	//这个叫相对路径
	$path = 'filesystem.php';
	//转换之后可以变成绝对路径，如下		
	echo realpath($path);
	//D:\wamp\www\test\basic\filesystem\filesystem.php

	echo '<br />';
	//$path = '../index.php';  //这也是相对路径
	$path = '123/123.php';	//这也是相对路径
	echo realpath($path);
	//D:\wamp\www\test\basic\filesystem\123\123.php
	
	
	//得到文件大小filesize($path)
	echo '<br />';
	$path = 'e:\wamp\www\test\basic\filesystem\filesystem.php'; 
	echo round(filesize($path)/1024,2).'KB';
	//1.52KB
	
	//可用空间的查看disk_free_space
	echo round(disk_free_space('C:')/1024/1024/1024,2).'GB'; 
	echo '<br />';
	//5.96GB
	//总空间
	echo round(disk_total_space('C:')/1024/1024/1024,2).'GB';
	echo '<br />';
	//70GB
	
	$path = 'e:\wamp\www\test\basic\filesystem\filesystem.php'; 
	//我们要做的是将这个时间翻译成正常的日期
	//echo fileatime($path);
	//格式化一个本地日期
	//调整一下时区
	date_default_timezone_set('Asia/Shanghai');
	//获取最后的访问时间
	echo '最后访问：'.date('Y-m-d H:i:s',fileatime($path)).'<br />';
	//获取最后的改变时间，所有者，权限
	echo '权限所有者等：'.date('Y-m-d H:i:s',filectime($path)).'<br />';
	//获取最后的修改时间,文件里面的内容修改后的时间
	echo '内容修改时间：'.date('Y-m-d H:i:s',filemtime($path));
	
	/*
	 将数据写入一个文件，有3个步骤：
	1. 打开这个文件。如果文件不存在，需要先创建它。
	2. 将数据写入这个文件。
	3. 关闭这个文件
	 * 
	 */
	
	
	//打开一个文件
	//第一参数表明哪个文件,第二参数表明模式,w只写
	//w如果，file.txt已经有了，并且有数据了。那么，删除这个文件，重新创建
	//如果没有file.txt这个文件，那么，我就自行创建	
  	//fopen返回的是资源类型resource ，我们一般称它为句柄，或者叫资源句柄
	$fp = fopen('file.txt','w');
	
	//想文件里写入一些数据

	$outstring = 'This is a wq!He is 19';
	fwrite($fp,$outstring,strlen($outstring));
	
	//	//当打开一个文件的时候，习惯性的将它关闭掉
	fclose($fp);
	
	

	
	//实现同样功能，只有在PHP5的版本才可以使用，新建file2.txt,输入内容This is a wq!
	file_put_contents('file2.txt','This is a wq!');
	
	
	//\r\n可以让文本文件换行
	$fp = fopen('file.txt','a');
	$outputstring = "This is wq!\r\nThis is 18\r\n";
	fwrite($fp,$outputstring,strlen($outputstring));	
	fclose($fp);
	
	//现在要读出文件
	$fp = fopen('file.txt','r');

	//fgetc()：读出一个字符，并将指针移到下一个字符。
	echo fgetc($fp);
	echo fgetc($fp);
	
	//	//file是按照每行来分组存放在一个数组中
	$array_file = file('file.txt');
//	
//	//而这个打印出的是文件中的第1行。
	echo $array_file[0];
	
	
	echo "<br>";
	//file_get_contents可以读入数据到缓冲区，然后通过echo来打印
	echo file_get_contents('file.txt');
	
	//现在要读出文件,用参数r
	echo "<br>";
	$fp = fopen('file.txt','r'); 	
	//feof -- 测试文件指针是否到了文件结束的位置
	while (!feof($fp)) {
		echo fgetc($fp);
	}
	fclose($fp);
	
	//file_exists -- 检查文件或目录是否存在
	echo "<br>";
	if (file_exists('file.txt')) {
		echo '执行各种各样的文本读写操作！';
	} else {
		echo '此本文不存在，请管理员在后台重新生成一下！';
	}
	
	
	//文本大小，字节
	//echo filesize('file.txt'); 
	
	//删除一个文件
	//unlink('123.txt');
	
	
	//打开一个目录
	$dir = opendir('D:\wamp\www\test\basic\filesystem');
	//	//读出目录,使用一个循环来读出
	//	//字符串如果是布尔值，就是说，字符串不为空，那么就是真，为空就是假
	while (!!$file = readdir($dir)) {
		echo $file.'<br />';
	}
	//	//关闭
	closedir($dir);
	
	//	//删除一个目录,相对路径和绝对路径都是可以操作，
	//rmdir('file3.txt');
	//unlink('file3.txt');


?>