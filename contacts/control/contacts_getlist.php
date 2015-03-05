<?php
    $stype = getgpc('stype', 'R');
    $skey = getgpc('skey', 'R');
    $ordobj = getgpc('ordobj','R');
    $ordtype = getgpc('ordtype','R');
    //分页处理 可将分页拿到公用库中
    $pager_Size = 5;
    $pager_URL = "?m=contacts&a=getlist&ordobj=$ordobj&ordtype=$ordtype&stype=$stype&skey=$skey";
    //获取总数量
    if($stype == "" || $skey == "")
    {
        $cts_num_arr = $_ENV['contacts']->get_cts("SELECT * FROM contacts");    
    }
    else
    {
        $cts_num_arr = $_ENV['contacts']->get_cts("SELECT * FROM contacts 
                                                    WHERE ".$stype." LIKE '%".$skey."%'");
    }   
    $cts_num = count($cts_num_arr); 
    if(isset($_GET['pager_PageID']) && !empty($_GET['pager_PageID']))
    { 
        $pager_PageID = intval($_GET['pager_PageID']); 
    }
    else
    { 
        $pager_PageID = 1; 
    }   
    if ($pager_PageID == 1 )
    { 
        $pager_StartNum = 0; 
    }
    else
    { 
        $pager_StartNum = ($pager_PageID -1) * $pager_Size; 
    } 
    $pager_EndNum = $pager_StartNum + $pager_Size;
    $pager_Number = ceil($cts_num/$pager_Size);
    $pager_EndNum = $pager_StartNum + $pager_Size; 
    if ($pager_PageID == 1 && $pager_Number>1)
    { 
        $pager_Links = "首页 | <a href=".$pager_URL."&pager_PageID=".($pager_PageID+1)." >下一页</a>"; 
    }
    elseif($pager_PageID == $pager_Number && $pager_Number>1)
    { 
        $pager_Links = "<a href=".$pager_URL."&pager_PageID=".($pager_PageID-1)." >上一页</a> | 尾页"; 
    }
    elseif ($pager_PageID > 1 && $pager_PageID <= $pager_Number)
    { 
        $pager_Links = "<a href=".$pager_URL."&pager_PageID=".($pager_PageID-1)." >上一页</a>
                        | <a href=".$pager_URL."&pager_PageID=".($pager_PageID+1)." >下一页</a>"; 
    }
    else
    { 
        $pager_Links = "上一页 | 下一页"; 
    } 
    //处理排序
    if($ordobj)
    {
        $ordersql = " ORDER BY $ordobj $ordtype ";
    }
    if($stype == "" || $skey == "")
    {
        $cts_list = $_ENV['contacts']->get_cts("SELECT * FROM contacts $ordersql LIMIT $pager_StartNum,$pager_Size");    
    }
    else
    {
        $cts_list = $_ENV['contacts']->get_cts("SELECT * FROM contacts 
                                                WHERE ".$stype." LIKE '%".$skey."%' $ordersql 
                                                LIMIT $pager_StartNum,$pager_Size");
    }
    $base->view->assign("cts_list", $cts_list);  
    $base->view->assign("stype", $stype);
    $base->view->assign("skey", $skey);
    $base->view->assign("ordobj", $ordobj);
    $base->view->assign("ordtype", $ordtype);
    $base->view->assign('pager_Total',$cts_num);  
    $base->view->assign('pager_PageID',$pager_PageID); 
    $base->view->assign('pager_EndNum',$pager_EndNum); 
    $base->view->assign('pager_Number',$pager_Number);
    $base->view->assign('pager_Links',$pager_Links);
    $base->view->display('showlist_phppager.html');
?>