<?php 


function trimall($str)//删除空格
{
	$qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
	return str_replace($qian,$hou,$str);
}

$cc = "广东省 深圳市 罗湖区新安路4号森威大厦雍景园17楼B";

$bb = trimall($cc);

print_r($bb);