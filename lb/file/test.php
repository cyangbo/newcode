<?php
	$string = "http://.com/www.baicu.com/";

	$substring = explode(' ',$string);
	
	$subarray = (array)$substring[0];
	
	print_r(preg_grep('/.com\/$/',$substring[0]));
	print_r(preg_grep('/((.com\/)|(.cn\/)|(.net\/)|(.cc\/)|(.org\/)|(.tv\/)|(.me\/)|(.mobi\/)|(.com)|(.cn)|(.net)|(.cc)|(.org)|(.tv)|(.me)|(.mobi))$/',$subarray));
	print_r(preg_grep('/(.(?=com|cn|net))$/',$subarray));
	if(!preg_grep('/.com\/$/',$subarray)){
		echo "cc";
	}
	//Array ( [0] => php [1] => asp [2] => jsp )
	echo "<br>";

?>