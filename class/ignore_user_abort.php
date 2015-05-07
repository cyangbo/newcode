<?php
//PHP实现的计划（定时）任务
//有时候为了定时去调接口，需要程序自动运行。从网上搜到有两种方法可以实现 1、ignore_user_abort() ignore_user_abort()函数搭配set_time_limit(0)和sleep($interval)即可实现程序自动运行更新。
//即使Client断开(如关掉浏览器)，PHP脚本也可以继续执行.
ignore_user_abort();
// 执行时间为无限制，php默认的执行时间是30秒，通过set_time_limit(0)可以让程序无限制的执行下去
set_time_limit(0);
// 每隔5分钟运行
$interval=60*5;
do{
    $url = "http://www.codeSnippet.cn";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    $result = curl_exec($ch);
    curl_close($ch);
    // 等待5分钟
    sleep($interval);
}while(true);
//该片段来自于http://www.codesnippet.cn/detail/051120127.html