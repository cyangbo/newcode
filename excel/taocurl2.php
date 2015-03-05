<?php
     //初始化
     $curl = curl_init("http://www.baidu.com");
     
     curl_setopt($curl, CURLOPT_HEADER, true);
     
     preg_match('/^Location: (?P<location>.*?)$/m', $hmtl，$match);
     //执行
     curl_exec($curl);
     //关闭
     curl_close($curl);
?>
