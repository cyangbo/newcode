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
//���ټ��س�����
function L($lib)
{
        require_once(T_ROOT.'lib/'.$lib.".class.php");
        return $obj = new $lib();
}
//���ټ��ؿ��Ʋ� $t ǰ̨���̨
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
            //echo showmsg('����������ʧ��!',2,'/');
        }
    }
    else
    {
        //���غ�̨������        
    }
}
//��ȡ�ύ�Ĳ���
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