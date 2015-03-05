<?php
function D($model)
{
    $model = trim($model);
    $strFile = T_ROOT.'model/'.$model.'.php';
    if (@file_exists($strFile))
    {
        require_once($strFile);
            $d = new $model;
    }
    else
    {
        $d = null;
        trigger_error("$model Model load error!");
    }
    return $d;
}
//快速加载常用类
function L($lib)
{
        require_once(T_ROOT.'lib/'.$lib.".class.php");
        return $obj = new $lib();
}
//快速加载控制层 $t 前台或后台
function C($c, $t ='')
{
    if ($t == 'f' || $t == '')
    {
        if (is_file(T_ROOT.'control/'.$c.'.php'))
        {
            require(T_ROOT.'control/'.$c.'.php');
            $c = $c.'control';
            return $obj = new $c();
        }
        else
        {
            trigger_error("$c Load controller error!");
            exit();
            //echo showmsg('控制器加载失败!',2,'/');
        }
    }
    else
    {
        //加载后台控制器        
    }
}
//提取提交的参数
function getgpc($k, $var = 'R')
{
    switch($var)
    {
        case 'G':
			$var = &$_GET;
			break;
        case 'P':
			$var = &$_POST;
		    break;
        case 'C': 
			$var = &$_COOKIE;
		    break;
        case 'R':
			$var = &$_REQUEST;
		    break;
    }
    return isset($var[$k]) ? $var[$k] : NULL;
}
?>