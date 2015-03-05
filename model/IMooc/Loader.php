<?php 
/*
2015-1-25PHP
*/

/*
 * 这个文件实现所有文件自动载入的功能
 * 
 */

namespace IMooc;

class Loader{
	static  function autoload($class){
		
		require BASEDIR.'/'.str_replace('\\', '/', $class).'.php';;
		
		//目录路径是反斜杠,命名空间是斜杠,这里转一下
		//$file = BASEDIR.'/'.str_replace('\\', '/', $class).'.php';
		//var_dump($file);
		//E:\wamp\www\mycode\model/IMooc/Object.php
		

	}
}