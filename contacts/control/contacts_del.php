<?php
    if($_ENV['contacts']->del())
    {
		$showrs = "删除成功<BR />";
		$showrs = $showrs."<A href=?m=contacts&a=getlist >返回列表</A>";
		$base->view->assign('showrs', $showrs);
		$base->view->display('showrs.html');
        exit;
    }
?>