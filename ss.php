<?php
echo "cccc";
$wenben = "����Ŷ,һ������";
$wei1=strcspn($wenben,"Ŷ");
$wei2 = strcspn($wenben,"��");
echo $wei1;
echo $wei2;
var_dump($wei1);
var_dump($wei2);
echo substr($wenben,$wei1,$wei2);

$rang = rand(4, 15);
echo rand();
echo getrandmax();
?>