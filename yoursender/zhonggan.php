<?php
set_time_limit(1800) ;
/**
 * 
 * 509060016~509070004
 * 尾数6加4，其它数加11
 * 
 */
static $a = 608930005;
$b = array ();
do {
	if (substr ( $a, - 1 ) == 6) {
		$a = $a + 4;
		echo $a . "\t\n";
		//$b [$a] = $a;
	} else {
		$a = $a + 11;
		echo $a . "\t\n";
		//$b [$a] = $a;
	}
} while ( $a < 609000005 );

/* foreach ( $b as $d ) {
	echo $d . "\t\n";
} */

