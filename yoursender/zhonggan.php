<?php
set_time_limit(1800) ;
/**
 * 
 * 509060016~509070004
 * 尾数6加4，其它数加11
 * 
 */

$fp = fopen ( 'zhec/HK_BBC_BINGFAN_610300001_100000.txt', 'w' );

$outstring = "ssss";

//起始单号
//static $a = 609199995;

//起始单号:610199993 
//static $a = 610299990;
static $a = 611300006;

//个数
static $b = 0;

//$b = array ();
do {
	if (substr ( $a, - 1 ) == 6) {
		$a = $a + 4;
		echo $a . "\t\n";
		
		fwrite ($fp, $a . "\t\n");
		
		$b = $b + 1;
		
		//$b [$a] = $a;
	} else {
		$a = $a + 11;
		echo $a . "\t\n";
		//$b [$a] = $a;
		fwrite ($fp, $a . "\t\n");
		$b = $b + 1;
	}
} while ( $b < 10000 );

echo "最后单号:".$a;

//向文件里写入一些数据
//fwrite ($fp, $outstring);

//当打开一个文件的时候，习惯性的将它关闭掉
fclose ( $fp );

/* foreach ( $b as $d ) {
	echo $d . "\t\n";
} */

