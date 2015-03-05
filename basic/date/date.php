<?php

	//验证时间
	//checkdate()  1.月份，2.日 3.年
	//checkdate()判断这个日期是否是合法的日期，
	//不合法的日期，试一试
	if (checkdate(7,16,2010)) {
		echo '这个日期是合法有效的';
	} else {
		echo '这个日期是非法的';
	}
	echo "<br>";
	
	//date()，彻底研究一下
	//date()可以存放两个参数，第一参数是日期和时间的格式化，[第二参数是时间戳]
	//Y表示四位数的年份，y表示两位数的年份	
	//M表示英文的月份缩写，m表示阿拉伯数字的月份	
	//D表示英文下的日缩写，d表示阿拉伯数字的日
	//第一个参数的格式化可以放一些无关紧要的字符串	
	//只要无关紧要的字符串不再format的目录里，就不会被识别	
	//时分秒=H表示24小时制的小时，	
	//明明是19点，为什么显示11点呢，东八区，差8个小时	
	//现在没有经过任何设置，所以，时间在默认时区上。
	echo date('现在的日期是：Y-m-d H:i:sa');	
	//现在的日期是：2014-10-25 16:59:41pm
	//重点在年月日，时分秒	
	//echo date('Z');
	echo "<br>";
	
	
	//取得当前的时间，返回一个数组
	//"sec" - 自 Unix 纪元起的秒数 	
	//"usec" - 微秒数 	
	//"minuteswest" - 格林威治向西的分钟数 	
	//"dsttime" - 夏令时修正的类型 
	//第一数组的元素就是时间戳	
	//gettimeofday()就是取得的当前时间的时间戳。
	//$a = gettimeofday();	
	//sec取得当前时间的时间戳	
	//转换成人可以看得懂的时间	
	//第二个参数，对于本例来讲，放于不放，是一样的。	
	//echo date('Y-m-d H:i:s',$a['sec']);
	print_r(gettimeofday(0));	
	//Array ( [sec] => 1414256400 [usec] => 9126 [minuteswest] => 0 [dsttime] => 0 ) 
	echo "<br>";
	echo gettimeofday(1);
	//1414256400.0092
	echo "<br>";
	
	
	
	//将时间戳转换成人可以看的懂的时间
	//date()函数的第二个参数就是时间戳
	//如果第二个参数沈略了，那么就返回当前时间	
	//如果第二个参数没有省略，那么就返回那个时间戳的时间
	echo date('Y-m-d H:i:s',1184557366);
	//2007-07-16 03:42:46
	echo "<br>";
	
	
	
	
	//getdate()也可以转换时间戳
	//print_r(getdate());
	//$t = getdate();
	//echo $t['mon'];
	//传递一个时间戳
	$t = getdate(1184557366);
	print_r(getdate(1184557366));
	/*
	 Array
	(
	    [seconds] => 46
	    [minutes] => 42
	    [hours] => 3
	    [mday] => 16
	    [wday] => 1
	    [mon] => 7
	    [year] => 2007
	    [yday] => 196
	    [weekday] => Monday
	    [month] => July
	    [0] => 1184557366
	)
	 */
	echo "<br>";
	echo $t['mon'];
	//7
	echo "<br>";
	
	
	//直接获取当前时间戳
	echo time();
	//1414256740
	echo "<br>";
	echo date('Y-m-d H:i:s',time());
	//2014-10-25 17:05:40
	echo "<br>";	
	//这个time()可以调整时间，
	//time()很有用处，可以过去现在和将来,当前时间增加7天
	echo date('Y-m-d H:i:s',time()+(7*24*60*60));
	//2014-11-01 17:05:40
	echo "<br>";
	
	
	
	//获取特定指定时间的时间戳 
	//我要取得2008-08-08 08:08:08
	$beijing2008 = mktime(8,8,8,8,8,2008);
	echo date('Y-m-d H:i:s',$beijing2008);
	//2008-08-08 08:08:08
	echo "<br>";
	
	
	
	//使用时间戳计算时间差
	$now = time();  //当前的时间戳	
	$wnow = mktime(0,0,0,8,16,2010);	
	//两个时间戳相减可以得到差秒
	echo round(($wnow - $now)/60/60,2).' Hour';
	//-36761.14 Hour
	echo "<br>";
	
	
	
	//将人可读的时间，字符串形式，转换成时间戳 strtotime()
	$a = strtotime('2010-7-16 15:15:15')-strtotime('2010-7-16 15:15:00');
	if ($a >= 60) {
		echo '请这位先生休息一会儿！';
	} else {
		echo $a;
	}
	echo "<br>";
	
	
	//获取当前文件的修改时间戳getlastmod()
	echo date('Y-m-d H:i:s',getlastmod());
	echo "<br>";
	
	
	
	//配置系统环境变量
	echo date('Y-m-d H:i:s',time());
	echo '<br />';
	//我开始设置时区
	putenv('TZ=Asia/Shanghai');
	echo date('Y-m-d H:i:s',time());
	echo '<br />';
	
	
	
	//获取当前时区，
	echo date_default_timezone_get();
	//UTC
	echo '<br />';	
	//开始配置默认时区	
	date_default_timezone_set('Asia/Shanghai');	
	echo date('Y-m-d H:i:s');	
	echo '<br />';	
	echo date_default_timezone_get();
	//Asia/Shanghai	
	echo '<br />';
	
	
	date_default_timezone_set('Asia/Shanghai');
	print_r(localtime(time(),true));
	/*
	 Array
	(
	    [tm_sec] => 57
	    [tm_min] => 13
	    [tm_hour] => 1
	    [tm_mday] => 26
	    [tm_mon] => 9
	    [tm_year] => 114
	    [tm_wday] => 0
	    [tm_yday] => 298
	    [tm_isdst] => 0
	)
	 */
	
	
?>