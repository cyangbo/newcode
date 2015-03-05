<?php 

namespace IMooc;
class Factory{
	static function createDatabase(){
		//$db = new Database;
		
		//工厂加单例
		$db = Database::getInstance();
		
		//db1注册到$db对象上面
		Register::set('db1', $db);
		return $db;
		
	}
}