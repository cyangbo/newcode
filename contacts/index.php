<?php
/*+-------------------------------------------------------------------------------------------+
  首页index.php                         
  +-------------------------------------------------------------------------------------------+
*/

//TEST_ROOT是项目根目录
define('TEST_ROOT', str_replace("\\","/",dirname(__FILE__))."/");
//echo dirname(__FILE__);
//E:\wamp\www\mycode\contacts
//echo TEST_ROOT;
//E:/wamp/www/mycode/contacts/

define('TEST_DBHOST', 'localhost');	//你的数据库IP,一般为localhost
define('TEST_DBUSER', 'root');	//你的数据库用户名
define('TEST_DBPW', 'ccmiu');	//你的数据库密码
define('TEST_DBNAME', 'contacts');	//你的数据库名
define('TEST_DBCHARSET', 'utf8');	
define('TEST_CHARSET', 'utf-8');
define('TEST_DBTABLEPRE', '');
define('TEST_DBCONNECT', 0);
error_reporting(7);
mysql_query("SET NAMES 'UTF8'"); 
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");


//加载常用类
require (TEST_ROOT.'lib/global.php');
require (TEST_ROOT.'lib/db.class.php');

//模块 控制调用
$m = getgpc('m', 'R');
echo $m."mmm";
$a = getgpc('a', 'R');
echo "aaa".$m."aaa";


//基本模块
require TEST_ROOT.'model/base.php';
$base = new base();
if(empty($m) || empty($a)) 
{    
    $base->view->display('index.html');
    exit;
}
if(in_array($m, array('contacts', 'other')))
{    
//    include TEST_ROOT."control/$m.php";    
//    $classname = $m.'control';
//    $control = new $classname();
//    $method = 'on'.$a;
//    if(method_exists($control, $method) && $a{0} != '_')
//    {
//        $control->$method();
//        exit;
//    } 
//    elseif(method_exists($control, '_call'))
//    {
//        $data = $control->_call('on'.$a, '');
//        exit;
//    }
//    else
//    {
//        exit('Action not found!');
//    }
	if(file_exists(TEST_ROOT."control/".$m."_$a.php"))
	{
		$base->load("$m");
		require_once TEST_ROOT."control/".$m."_$a.php";
	}
	else
	{
		exit('Action not found!');
	}
}
else
{
    exit('Module not found!');
}
?>