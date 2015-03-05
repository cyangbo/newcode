<?php
    $todo = getgpc('todo', 'P');
    if ($todo)
    {
        if($_ENV['contacts']->saveadd())
        {
            $showrs = "添加成功<BR />";
            $showrs = $showrs."<A href=?m=contacts&a=getlist >返回列表</A>";
			$base->view->assign('showrs', $showrs);
            $base->view->display('showrs.html');
			exit;
        }
    }
    $base->view->display('add.html');
?>