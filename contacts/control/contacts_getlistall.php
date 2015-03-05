<?php
    $stype = getgpc('stype','R');
    $skey = getgpc('skey','R');
    if($stype == "" || $skey == "")
    {
        $cts_list = $_ENV['contacts']->get_cts("SELECT * FROM contacts");   
    }
    else
    {
        $cts_list = $_ENV['contacts']->get_cts("SELECT * FROM contacts 
                                                WHERE ".$stype." LIKE '%".$skey."%'");
    }   
    $base->view->assign("cts_list",$cts_list);  
    $base->view->display('showlist.html');
?>