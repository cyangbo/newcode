<?php
	require_once ('../libs/Smarty.class.php');
	$smarty = new Smarty();
	
	//smarty的自编口诀"五配置两方法"
	//五配置的介绍
	
	$smarty->left_delimiter = "{";	//左定界符
	$smarty->right_delimiter = "}";	//右定界符
	$smarty->template_dir = "tpl";	//html模板的地址
	$smarty->compile_dir = "template_c";//模板编译生成的文件
	$smarty->cache_dir = "cache";	//缓存
	
	//以下是开启缓存的另外两个配置.因为通常不用smarty的缓存机制,所以此项为了解
	$smarty->caching = true;//开启缓存
	$smarty->cache_lifetime = 120;	//缓存时间
	
	//smarty常用的两种方法
	$smarty->assign('articletitle','文章标题');
	
	//一个关联数组
	$arrcc = array('title'=>'smarty的学习','author'=>'小明');
	$smarty->assign('arr',$arrcc);
	
	$smarty->assign('article','i ate an apple');
	
	//time()获取当前unix时间戳时间
	$smarty->assign('timeee',time());
	
	$smarty->assign('no_name','');
	
	//escape转码
	$smarty->assign('url_escape','http://www.baidu.com');
	
	//大小写变量调节器
	$smarty->assign('low_up','Hello World');
	
	//
	$smarty->assign('huanhang','开心
	意义
	二二');
	
	//条件判断使用
	$smarty->assign('score',91);
	
	
	//section循环
	$articlelist = array(
		array(
			"title"=>"第一篇文章",
			"author"=>"小王",
			"content"=>"第一篇文章该写点啥呢"
		),
		array(
			"title"=>"第二篇文章",
			"author"=>"小李",
			"content"=>"又写了一篇不知所云的文章"
		),		
	);
	$smarty->assign("art_section",$articlelist);
	
	
	//foreach循环
	$art_cc = array(
		array(
			"title"=>"第一篇文章",
			"author"=>"小王",
			"content"=>"第一篇文章该写点啥呢"
		),
		array(
			"title"=>"第二篇文章",
			"author"=>"小李",
			"content"=>"又写了一篇不知所云的文章"
		),		
	);
	$smarty->assign("art_foreach",$art_cc);
	
	
	//smarty类与对象的赋值与使用
	class My_Object{
		function meth1($params){
			return $params[0].'已经'.$params[1];
		}
	}
	$myobj = new My_Object();
	$smarty->assign('objcc',$myobj);
	
	//使用php内置函数和自定义函数
	$smarty->assign('timecc',time());
	
	//将abcdefghij里面的d替换成h,调用str_replace函数
	$smarty->assign('strc','abcdefghij');
	
	
	//
	function test($params){
		$p1 = $params['p1'];
		$p2 = $params['p2'];
		return '传入的参数1值为'.$p1.'传入的参数2值为'.$p2;
	}
	
	//f_test在smarty里面的名字,test是上面的函数名
	$smarty->registerPlugin('function', 'f_test', 'test');
	
	
	//在test.tpl中{test width=150 height=200}用来调用function.test.php这个文件的smarty_function_test方法
	
	//{$timett|test:'Y-m-d H:i:s'}  test是modifier.test.php中的test
	$smarty->assign('timett',time());
	
	//在test.tpl中,调用block.replacecc.php
	//{replacecc replace='true' maxnum=29}
	//{$str}
	//{/replacecc}	
	$smarty->assign('str','Hello,my name is HanMeimei.hwo are you ');
	
	
	
	//启用test.tpl这个模板
	$smarty->display('test.tpl','datetime.tpl');
	
	
?>