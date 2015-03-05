<?php
echo "cccc";
$wenben = "测试哦,一二三死";
$wei1=strcspn($wenben,"哦");
$wei2 = strcspn($wenben,"三");
echo $wei1;
echo $wei2;
var_dump($wei1);
var_dump($wei2);
echo substr($wenben,$wei1,$wei2);

$rang = rand(4, 15);
echo rand();
echo getrandmax();
?>