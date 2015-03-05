<?php 

$mystring = "[39]=>{[url]=>http://detail.tmall.com/item.htm?id=41599939196,[img]=>http://gi3.md.alicdn.com/bao/uploaded/i3/TB1eVsoGXXXXXaOXXXXXXXXXXXX_!!0-item_pic.jpg_290x290.jpg,[title]=>大码宽松加厚套头卫衣M-2XL 原价198元 折扣价29元多数地区包邮,[pirce]=>29,[opirce]=>198},";


$myarr = preg_split('/[>,}]/', $mystring);

$mytable = "yufu_tuan";
$myday = 7;
$mycid = 212;

$myurl = $myarr[2];
$mypic = substr($myarr[4],0,-12);
$myid = substr($myurl,-11);
$mytitle = $myarr[6];
$myprice = $myarr[8];
$myoldp = $myarr[10];
$mytime = time();
$mylong = time()+($myday*24*60*60);


//INSERT INTO `$mytable`(`$mycid`,`sitetitle`,`keywords`,`title`,`price`,`hdprice`,`starttime`,`endtime`,`buyurl`,`thumb`,`brand`,`create_time`,`update_time`)VALUES(42,'$mytitle','$mytitle','$mytitle',$myoldp,$myprice,$mytime,$mylong,'$mypic','$myid',$mytime,$mytime);
$myinsert = "INSERT INTO `$mytable`(`catid`,`sitetitle`,`keywords`,`title`,`price`,`hdprice`,`starttime`,`endtime`,`buyurl`,`thumb`,`brand`,`create_time`,`update_time`)
VALUES($mycid,'$mytitle','$mytitle,'$mytitle',$myoldp,$myprice,$mytime,$mylong,'$myurl','$mypic','$myid',$mytime,$mytime);
";

print_r ($myinsert);


/*
 * 
 * print_r(preg_split('/[>,}]/', $mystring));
Array
(
    [0] => [39]=
    [1] => {[url]=
    [2] => http://detail.tmall.com/item.htm?id=41599939196
    [3] => [img]=
    [4] => http://gi3.md.alicdn.com/bao/uploaded/i3/TB1eVsoGXXXXXaOXXXXXXXXXXXX_!!0-item_pic.jpg_290x290.jpg
    [5] => [title]=
    [6] => 大码宽松加厚套头卫衣M-2XL 原价198元 折扣价29元多数地区包邮
    [7] => [pirce]=
    [8] => 29
    [9] => [opirce]=
    [10] => 198
    [11] => 
    [12] => 
)

*/

?>