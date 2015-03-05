<?php
	$cc = pack('H*','633a5c77696e646f77735c74656d705c2e53595344554d505c2e576830416d492e434f5245');
	echo $cc;
	$binarydata = "C:\ADFS\Wh0AmI.php";
	$tt = unpack('H*',$binarydata);
	var_dump($tt);

?>