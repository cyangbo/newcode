<?php
//数组
//echo下一行是输出内容


	//创建一个数组变量
	$userNames = array('李彦宏','周鸿祎','马云','俞敏洪','李开复','吴祁');
	//将这个数组打印出来
	echo $userNames;
	//Array
	
	echo "<br>";
	echo $userNames[2];
	//马云
	
	echo "<br>";
	echo print_r($userNames);
	//Array ( [0] => 李彦宏 [1] => 周鸿祎 [2] => 马云 [3] => 俞敏洪 [4] => 李开复 [5] => 吴祁 ) 1
	
	//修改数组内容
	$userNames[5] = '李炎恢';
	echo "<br>";
	echo $userNames[5];	
	//李炎恢
	
	//创建数组range('a', 'i'),a到i
	foreach (range('a', 'i') as $letter) {
    echo $letter;
	}
	//abcdefghi
	
	$letters = range('a','c');
	print_r($letters);
	//Array ( [0] => a [1] => b [2] => c )
	echo $letters[2];
	// c
	
	echo "<br>";
	//通过循环来显示数组里的所有值
	for ($i=0;$i<count($userNames);$i++) {
		echo ($i+1).'----'.$userNames[$i];
		echo '<br />';
	}
	/*
	1----李彦宏
	2----周鸿祎
	3----马云
	4----俞敏洪
	5----李开复
	6----李炎恢
	 */
	
	echo "<br>";
	//如果key不是从0开始，或者说，压根不是数字，那么就无法用for循环来实现显示数据列表
	//通过foreach循环来遍历数组，这方式好处，不需要去考虑key
	//foreach遍历 $key => $value
	//所以，你要先做个判断
		if (is_array($userNames)) {  //判断一下到底是不是数组	
		foreach ($userNames as $key => $value) {
			echo $key.'---'.$value.'<br />';
		}
	} else {
		echo $userNames;
	}
	
	 //创建自定义键(key)的数组
	//如果你不去声明元素的key，那么从开始0计算
	$userNames = array('baidu'=>'李彦宏','taobao'=>'马云','360'=>'周鸿祎');
	//print_r($userNames);
	echo $userNames['baidu'];
	echo $userNames['360'];
	
	//先创建只有一个元素的数组
	 $userAges = array('吴祁'=>19);
	 //将以前的数组，追加两条，这里说的下标，键，key是一个东西
	 $userAges['李炎恢'] = 27;
	 $userAges['胡心鹏'] = 23;

	 //list只能认识key为数字的
	//自定义的字符串key是无法使用list来识别的
	$a = array('aaaa','bbbb','cccc','dddd');
	//list($var1,$var2)就是将
	//	//$var1 = 'aaaa'
	//	//$var2 = 'bbbb'
	list($var1,$var2,$var3,$var4) = $a;
	echo $var4;
	//dddd
	echo $a[3];
	//dddd
	
	//array_unique -- 移除数组中重复的值
	$numbers = array(1,2,4,2,3,6,1,5,6,3,6,3,2,2);
	//print_r($numbers);	
	$newNumbers = array_unique($numbers);
	print_r($newNumbers);
	//Array ( [0] => 1 [1] => 2 [2] => 4 [4] => 3 [5] => 6 [7] => 5 )

	echo "<br>";
	//array_flip -- 交换数组中的键和值
	$userAges = array('吴祁'=>19,'李炎恢'=>27,'胡心鹏'=>23);   
	print_r($userAges);	
	//Array ( [吴祁] => 19 [李炎恢] => 27 [胡心鹏] => 23 ) 
	echo '<br />';
	$newUserAges = array_flip($userAges);
	print_r($newUserAges);
	//Array ( [19] => 吴祁 [27] => 李炎恢 [23] => 胡心鹏 )
	
	//二维数组
	echo "<br>";
	$products = array(
						array('苹果',6,28.8),
						array('猪肉',2,32.1),
						array('饼干',3,45.3)
	);
		
	echo "|".$products[0][0]."|".$products[0][1]."|".$products[0][2]."|<br />";
	echo "|".$products[1][0]."|".$products[1][1]."|".$products[1][2]."|<br />";
	echo "|".$products[2][0]."|".$products[2][1]."|".$products[2][2]."|<br />";
	/*
	 |苹果|6|28.8|
	|猪肉|2|32.1|
	|饼干|3|45.3|
	 */
	//echo count($products);
	for ($i=0;$i<count($products);$i++) {
		for ($j=0;$j<count($products[$i]);$j++) {
			echo $products[$i][$j].'|';
		}
		echo '<br />';
	}
	/*
	 |苹果|6|28.8|
	|猪肉|2|32.1|
	|饼干|3|45.3|
	 */
	
	echo '<br />';
	$products = array(
						array('产品名'=>'苹果','数量'=>6,'价格'=>28.8),
						array('产品名'=>'猪肉','数量'=>2,'价格'=>32.1),
						array('产品名'=>'饼干','数量'=>3,'价格'=>45.3)
	);
	for ($i=0;$i<count($products);$i++) {
		while (!!list($key,$value) = each($products[$i])) {
			echo $key.'--'.$value.'|';
		}
		echo '<br />';
	}
	/*
	产品名--苹果|数量--6|价格--28.8|
	产品名--猪肉|数量--2|价格--32.1|
	产品名--饼干|数量--3|价格--45.3|
	 */
	
	//原始的
	$fruit = array('banner','orange','apple'); 	
	echo '原始的：';
	print_r($fruit);
	//保持原始的key的关联asort
	arsort($fruit);
	echo '<br />';
	echo '排序后的：';
	print_r($fruit);
	//原始的：Array ( [0] => banner [1] => orange [2] => apple ) 
	//排序后的：Array ( [1] => orange [0] => banner [2] => apple ) 
	
	//按照键(key)名排序
	echo '<br />';
	$fruit = array('c'=>'banner','a'=>'orange','b'=>'apple');  
	krsort($fruit);
	print_r($fruit);
	//Array ( [c] => banner [b] => apple [a] => orange )
	
	
	
	echo '<br />';
	$userName = array('吴祁');
	//这个函数的返回值将得到，目前数组的元素个数
	//在开头插入数据
	array_unshift($userName,'胡心鹏');
	//在结尾插入数据
	array_push($userName,'李炎恢');
	print_r($userName);
	//Array ( [0] => 胡心鹏 [1] => 吴祁 [2] => 李炎恢 )
	
	
	$fruit = array('banner','orange','apple'); 
	//这个函数用来获取一个数组中的键(key)
	//第二个参数表明随即获取几个
	$a = array_rand($fruit,2);
	echo $fruit[$a[0]];
	echo $fruit[$a[1]];
	//bannerapple
	
	//在数组中浏览：each()、current()、reset()、end()、next()、pos()、prev();
	echo '<br />';
	$userAges = array('吴祁','李炎恢','胡心鹏');
	//默认情况下，指针在第一条数据
	//获取指针的当前元素，current并没有将指针移到下一步
	echo current($userAges);
	echo current($userAges);
	//吴祁吴祁
	echo next($userAges);
	//李炎恢
	echo prev($userAges);
	//吴祁
	
	echo sizeof($userAges);  //3
	echo count($userAges);	//3
	
	//array_count_values -- 统计数组中所有的值出现的次数
	print_r(array_count_values($userAges));
	//Array ( [吴祁] => 1 [李炎恢] => 1 [胡心鹏] => 1 )
	
	
	
?>