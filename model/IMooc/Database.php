<?php 

namespace IMooc;

interface IDatabase{
	
	function connect($host,$user,$passwd,$dbname);
	function query($sql);
	function close();
}

class Database{
	
	protected $db;
	
	//构造方法
	private function __construct(){
		
	}
	
	//获取实例
	static function getInstance(){
		if(self::$db){
			return self::$db;
		}else{
			self::$db = new self();
			return self::$db;
		}
		
	}
	
	function where($where){
		return $this;
		
	}
	function order($order){
		return $this;
		
	}
	function limit($limit){
		return $this;
		
	}
}