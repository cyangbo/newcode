<?php 
use IMooc\User;
define('BASEDIR', __DIR__);
include BASEDIR.'/IMooc/Loader.php';
spl_autoload_register('\\IMooc\\Loader::autoload');
echo '<meta http-equiv="content-type" content="text/html;charset=utf-8">';



//ORM
$user = new User(1);
$user->mobile='18933333333';
$user->name = 'test';
$user->regtime =time();