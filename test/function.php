<?php 


define('WMS_URL','http://'.$_SERVER['HTTP_HOST']);


print_r($_SERVER['HTTP_HOST']);exit;


$aa = new test();

$aa->aa()
   ->bb();

class test{
	
	public function aa(){
		echo "aa";
	}
	
	public function bb(){
		echo "bb";
	}
	
}