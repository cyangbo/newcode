<?php 
/*
2015-1-25PHP
*/

//命名空间和目录名保持一致
namespace IMooc;

//类名和文件名完全一致
//一个文件只能有一个类
class Object{
/*	static function test(){
		
	}*/
	
	protected $array = array();
	
	//定义set魔术方法
	function __set($key,$value){
		$this->array[$key] = $value;
	}
	function __get($key){
		//打印方法的名称
		var_dump(__METHOD__);
		//string 'IMooc\Object::__get' (length=19)
		return $this->array[$key];
	}
	
	//$func是方法名称,$param是方法的参数
	function __call($func,$param){
		
		var_dump($func,$param);
		return "magic function";
	}
	
	
	
	//$func是方法名称,$param是方法的参数
	static function __callstatic($func,$param){
		
		var_dump($func,$param);
		return "magic static function";
	}
	
	function __toString(){
		return __CLASS__;
	}
	
	function __invoke($param){
		var_dump($param);
		return "invoke";
	}
}
