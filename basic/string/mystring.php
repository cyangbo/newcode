<?php

/**
 * 判断字符串是否是6位数字
 */

$str = "112654";
$long = mb_strlen($str);

if(mb_strlen($str) == 6){
    echo "====";
}

if(mb_strlen($str)== 6 && is_numeric($str) == 1){
    echo "xxxxx";
}

$is_n = is_numeric($str);

print_r($is_n);

if($is_n){
    echo "yes";
}else{
    echo "no";
}

print_r($long);