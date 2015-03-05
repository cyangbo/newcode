<?php
    $todo = getgpc('todo', 'P');
    if ($todo)
    {
        if($_ENV['contacts']->saveedit())
        {
            $showrs = "修改成功<BR />";
            $showrs = $showrs."<A href=?m=contacts&a=getlist >返回列表</A>";
            $base->view->assign('showrs', $showrs);
            $base->view->display('showrs.html');
            exit;
        }
    }
    $cts = $_ENV['contacts']->edit();
    $base->view->assign('cts',$cts);
    $base->view->display('edit.html');
?>