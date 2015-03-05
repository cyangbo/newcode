<?php
echo "cccc";
$wenben = "测试哦,呵";
$wei1=strcspn($wenben,"哦");
$wei2 = strcspn($wenben,"呵");
echo substr($wenben,$wei1,$wei2);

echo date('Y-m-d H:i:s',1414941360);
echo date('Y-m-d H:i:s',1415546160);
echo 1415546160-1414941360;
echo "<br>";
echo rand(0,10);


?>