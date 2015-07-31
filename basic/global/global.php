<?php
/**
*2015年7月31日PHP
*PHP 中的许多预定义变量都是“超全局的”，这意味着它们在一个脚本的全部作用域中都可用。在函数或方法中无需执行 global $variable; 就可以访问它们。
*  $GLOBALS，$_SERVER，$_GET，$_POST，$_FILES，$_COOKIE，$_SESSION，$_REQUEST，$_ENV
*/

/**
 * $GLOBALS — 引用全局作用域中可用的全部变量
 * 与所有其他超全局变量不同，$GLOBALS在PHP中总是可用的
 */


function test() {
	$foo = "local variable";

	echo '$foo in global scope: ' . $GLOBALS["foo"] . "\n";
	echo '$foo in current scope: ' . $foo . "\n";
}
$foo = "Example content";
test();

/**输出:
 * $foo in global scope: Example content
 *$foo in current scope: local variable
 *要访问外部的$foo必须使用 $GLOBALS数组。对于通过include文件进来的外部全局变量也适用。
 */


/*
End of file
Location:global.php
*/