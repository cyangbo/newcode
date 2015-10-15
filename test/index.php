<?php 
$Titleline=file('5621.jpg');
$Contentline=file('6952.jpg');
$picurl='<center><a href="http://www.ln0vi.org" target="_blank"><img src="http://www.ln0vi.org/tt/mb/jjpo.jpg" alt="Ò»Ò¹ÇéÈË" /></a><center>';
$TC=count($Titleline);
$CC=count($Contentline);
function gettitle($id)
{
global $Titleline;
$str=$Titleline[$id];
return $str;
}
function getcontent($id)
{
global $Contentline;
$str=$Contentline[$id];
$str=str_replace("{title}","",$str);
return $str;	
}
    $a = ""; 
for ($i=0;$i<21;$i++)
{
$b=getcontent(rand(0,$CC));
$a.=$b;
}

$contents = $a;

date_default_timezone_set("PRC");
$d=strtotime('-12 Hours'); 
$timer = date("Y-m-d H:i:s",$d);

$Title0=trim(gettitle(rand(0,$TC)));
$Title1=trim(gettitle(rand(0,$TC)));
$link=trim(gettitle(rand(0,$TC)));
$link1=trim(gettitle(rand(0,$TC)));
$link2=trim(gettitle(rand(0,$TC)));
$link3=trim(gettitle(rand(0,$TC)));
$link4=trim(gettitle(rand(0,$TC)));
$link5=trim(gettitle(rand(0,$TC)));
$link6=trim(gettitle(rand(0,$TC)));
$link7=trim(gettitle(rand(0,$TC)));
$link8=trim(gettitle(rand(0,$TC)));
$link9=trim(gettitle(rand(0,$TC)));
$link10=trim(gettitle(rand(0,$TC)));
$link11=trim(gettitle(rand(0,$TC)));
$link12=trim(gettitle(rand(0,$TC)));
$link13=trim(gettitle(rand(0,$TC)));
$link14=trim(gettitle(rand(0,$TC)));
$link15=trim(gettitle(rand(0,$TC)));

$shang=trim(gettitle(rand(0,$TC)));
$xia=trim(gettitle(rand(0,$TC)));

$shang="<a href='?view_".rand(1,100000).".html'>".$shang."</a>";
$xia="<a href='?view_".rand(1,100000).".html'>".$xia."</a>";
$link="<a href='?view_".rand(1,100000).".html'>".$link."</a>";
$link1="<a href='?view_".rand(1,100000).".html'>".$link1."</a>";
$link2="<a href='?view_".rand(1,100000).".html'>".$link2."</a>";
$link3="<a href='?view_".rand(1,100000).".html'>".$link3."</a>";
$link4="<a href='?view_".rand(1,100000).".html'>".$link4."</a>";
$link5="<a href='?view_".rand(1,100000).".html'>".$link5."</a>";
$link6="<a href='?view_".rand(1,100000).".html'>".$link6."</a>";
$link7="<a href='?view_".rand(1,100000).".html'>".$link7."</a>";
$link8="<a href='?view_".rand(1,100000).".html'>".$link8."</a>";
$link9="<a href='?view_".rand(1,100000).".html'>".$link9."</a>";
$link10="<a href='?view_".rand(1,100000).".html'>".$link10."</a>";
$link11="<a href='?view_".rand(1,100000).".html'>".$link11."</a>";
$link12="<a href='?view_".rand(1,100000).".html'>".$link12."</a>";
$link13="<a href='?view_".rand(1,100000).".html'>".$link13."</a>";
$link14="<a href='?view_".rand(1,100000).".html'>".$link14."</a>";
$link15="<a href='?view_".rand(1,100000).".html'>".$link15."</a>";


$moban = file_get_contents('8583.jpg');
$moban = str_replace( "{title}", $Title0, $moban );
$moban = str_replace( "{title1}", $Title1, $moban );
$moban = str_replace( "{content}",$contents, $moban );
$moban = str_replace( "{timer}", $timer, $moban );
$moban = str_replace( "{shang}", $shang, $moban );
$moban = str_replace( "{xia}", $xia, $moban );
$moban = str_replace( "{link}", $link, $moban );
$moban = str_replace( "{link1}", $link1, $moban );
$moban = str_replace( "{link2}", $link2, $moban );
$moban = str_replace( "{link3}", $link3, $moban );
$moban = str_replace( "{link4}", $link4, $moban );
$moban = str_replace( "{link5}", $link5, $moban );
$moban = str_replace( "{link6}", $link6, $moban );
$moban = str_replace( "{link7}", $link7, $moban );
$moban = str_replace( "{link8}", $link8, $moban );
$moban = str_replace( "{link9}", $link9, $moban );
$moban = str_replace( "{link10}", $link10, $moban );
$moban = str_replace( "{link11}", $link11, $moban );
$moban = str_replace( "{link12}", $link12, $moban );
$moban = str_replace( "{link13}", $link13, $moban );
$moban = str_replace( "{link14}", $link14, $moban );
$moban = str_replace( "{link15}", $link15, $moban );
$moban = str_replace( "{pic}", $picurl, $moban);
echo $moban;
?>