<?php 

define('BASEDIR', __DIR__);
include BASEDIR.'/IMooc/Loader.php';
spl_autoload_register('\\IMooc\\Loader::autoload');
echo '<meta http-equiv="content-type" content="text/html;charset=utf-8">';

/*
 * 策略模式:
 * 1.策略模式,将一组特定的行为和算法封装成类,以适应某些特定的上下文环境
 * 这种模式就是策略模式
 * 2.实际应用举例,加入一个点上网站系统,针对男性女性用户要各自跳转到
 * 不同的商品类目,并且所有广告位展示不同的广告
 * 
 * 新建UserStrategy.php	//接口文件
 * 新建一个女性用户策略FemaleUserStrategy.php
 * 新建一个男性用户策略MaleUserStrategy.php
 * 
 * 3.使用策略模式可以实现Ioc,依赖倒置,控制反转
 * 
 */

class Page{
	
	protected $strategy;
	function index(){
		/*
		 * 传统写法,如果有一种新的分支逻辑,就要手动去写,麻烦
		 * if(isset($_GET['female'])){		
			}else{		
			}*/
		
		echo "AD:";
		$this->strategy->showAd();
		echo "<br/>";
		echo "cate:";
		$this->strategy->showCategory();
		//http://mycode.com/model/Strategy.php?female
		//cate:女装类目
		

	}
	function setStrategy(\IMooc\UserStrategy $strategy){
		$this->strategy = $strategy;
	}
}

$page = new Page();
if(isset($_GET['female'])){
	$strategy = new \IMooc\FemaleUserStrategy();
}else{
	$strategy = new \IMooc\MaleUserStrategy();
}
$page->setStrategy($strategy);
$page->index();

