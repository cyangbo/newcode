<?php
     //初始化
     $curl = curl_init("http://www.baidu.com");
     //执行
     curl_exec($curl);
     //关闭
     curl_close($curl);
     
?>

