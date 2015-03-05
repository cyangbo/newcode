<?php 

define('BASEDIR', __DIR__);
include BASEDIR.'/IMooc/Loader.php';
spl_autoload_register('\\IMooc\\Loader::autoload');

//$db = \IMooc\Register::get('db1');

/*
 * 适配器模式:
 * 1.适配器模式,可以将截然不同的函数接口封装成统一的API
 * 2.实际应用举例,PHP的数据库操作有mysql,mysqli,pdo这3中种
 * 可以用适配器模式统一成一致.类似的场景还有cache适配器
 * 将memcache,redis,file,apc等不同的缓存函数,统一成一致
 * 以数据库操作为例:IDababase文件夹
 * 建立3个数据库链接文件Mysql.php	MySQLi.php	PDO.php
 */

//通过调用不同的数据库文件,来实现适配器接口文件IDababase.PHP定义的方法
//$db = new IMooc\Database\MySQL();
//$db = new IMooc\Database\PDO();
$db = new IMooc\Database\MySQLi();
$db->connect('127.0.0.1', 'root', 'ccmiu', 'mycode');
$db->query("show databases");
$db->close();
