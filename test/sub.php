<?php 

$str = '广州转广州';
//从第3个数字之后开始,取出5位
echo mb_substr($str,0,2,'UTF-8');
//0.com
echo "<br>";