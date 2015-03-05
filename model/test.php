<?php 

/*require 'Test1.php';
require 'Test2.php';
//在test1.php中有命名空间Test1,应用:	命名空间\方法;
Test1\test();
*/


/*var_dump(__DIR__);
Test1::test();
Test2::test();
function __autoload($class){
	require __DIR__.'/'.$class.'.php';
}*/

Test1::test();
Test2::test();
spl_autoload_register('autoload1');
function autoload1($class){
	require __DIR__.'/'.$class.'.php';
}
