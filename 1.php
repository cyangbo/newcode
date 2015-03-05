<?php
$t='3.txt';
$arr=file('2.txt');
for($num=0;$num<count($arr);$num++)
{
	$p=fopen($t,'a');
	$ar2=explode('?',$arr[$num]);
	fwrite($p, $ar2[0]."¡¡");
	fwrite($p, $ar2[1]."\r\n");
	fclose($p);
	
}
?>  
