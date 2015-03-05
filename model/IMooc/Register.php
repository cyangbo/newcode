<?php 

namespace IMooc;

class Register{
	protected static  $objects;
	//表示将一个对象注册到全局的树上面
	static function set($alias,$object){
		self::$objects[$alias] = $object;
		
	}
	
	function _unset($alias){
		unset(self::$objects[$alias]);	
	}
	
	static function get($name){
		return self::$objects[$name];
	}
	
}