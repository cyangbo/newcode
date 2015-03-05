<?php 

namespace IMooc;

/*
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mobile` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `regtime` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 */

class User{
	public $id;
	public $name;
	public $mobile;
	public $regtime;
	
	protected $db;
	function __construct($id){
	$this->$db = new IMooc\Database\MySQLi();
	$this->$db->connect('127.0.0.1', 'root', 'ccmiu', 'mycode');
	$res = $this->$db->query("SELECT * FROM `user` WHERE `id`={$id} LIMIT 1");
	$data = $res->fetch_assoc();
	
	$this->id = $data['id'];
	$this->name = $data['name'];
	$this->mobile = $data['mobile'];
	$this->regtime = $data['regtime'];
	}
	
	function __destruct(){
		
	}
	
	
	
}