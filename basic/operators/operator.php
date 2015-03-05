<?php
	$userName = "wq";

	//echo "His name is wq!";
	echo "His name is $userName!";
	
	$userName = "吴祁";
	
	echo "His name is ".$userName."，他今年19岁了，长大成人啦！";
	
	echo "<br />";
	
	echo "虽然他QQ\t号上有很多女生，\n但一个都不属于他！";
	
	
	echo '吴祁的变量是：\n$userName!';

	//array_count_values -- 统计数组中所有的值出现的次数
	$prices=array("c"=>"苹果","a"=>"猪肉","b"=>"饼干");

	print_r(array_count_values($prices));
?>