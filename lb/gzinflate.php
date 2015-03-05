<?php
$compressed   = gzdeflate('Compress me', 9);
$uncompressed = gzinflate($compressed);
echo $uncompressed;
echo $compressed;
?>