<?php
	header('Content-Type: text/html; charset=UTF-8');
	//接受上传文件
	//$_FILES
	//存在，但是空值
	
	//[userfile][name]表示上传的文件名
	//[userfile][type]表示文件类型：例如，jpg的文件类型为：image/jpeg
	//[userfile][tmp_name]表示上传的文件临时存放的位置C:\WINDOWS\Temp\php5E1.tmp
	//[userfile][error]表示错误类型，0表示没有任何错误。
	//[userfile][size]表示上传文件的大小
	
	//is_uploaded_file()
	//判断文件是否是通过 HTTP POST 上传的
	//通过HTTP POST上传后，文件会存放在临时文件夹下
	
	//move_uploaded_file()
	//将上传的文件移动到新位置
	
	//还有两个问题要验证
		
	//第二个问题，只能允许jpg文件 
//	if ($_FILES['userfile']['type'] != 'image/jpeg' && $_FILES['userfile']['type'] != 'image/pjpeg') {
//		echo "<script>alert('本站只允许jpg图片！');history.back();</script>";
//		exit;
//	}
	
	//将所有的参数输出
	//print_r($_FILES);
	
	//创建一个常量
	define('MAX_SIZE',1000000);
	define('URL',dirname(__FILE__).'\upload');
//	$fileMimes = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
//	
//	//判断类型是否是数组里的一种
//	if (is_array($fileMimes)) {
//		if (!in_array($_FILES['userfile']['type'],$fileMimes)) {
//			 echo "<script>alert('本站只允许jpg、gif、png图片！');history.back();</script>";
//			 exit;
//		}
//	}

//	switch ($_FILES['userfile']['type']) {
//		case 'image/jpeg' :  //火狐
//			break;
//		case 'image/pjpeg' : //IE
//			break;
//		case 'image/gif' :
//			break;
//		case 'image/png' : //火狐
//			break;
//		case 'image/x-png' : //IE
//			break;
//		default: echo "<script>alert('本站只允许jpg、gif、png图片！');history.back();</script>";
//		    exit;	
//	}
	

	//第一问题，如果上传错误，怎么办
	if ($_FILES['userfile']['error'] > 0) {
		switch ($_FILES['userfile']['error']) {
			case 1: echo "<script>alert('上传文件超过约定值1');history.back();</script>";
				break;
			case 2: echo "<script>alert('上传文件超过约定值2');history.back();</script>";
				break;
			case 3: echo "<script>alert('部分被上传');history.back();</script>";
				break;	
			case 4: echo "<script>alert('没有任何文件被上传');history.back();</script>";
				break;	
		}
		exit;
	}
	
	//判断配置大小
	if ($_FILES['userfile']['size'] > MAX_SIZE) {
		echo "<script>alert('上传文件不得超过2M');history.back();</script>";
		exit;
	}
		
	
	//判断目录是否存在
	if (!is_dir(URL)) {
		mkdir(URL,0777);  //最大权限0777,意思是，如果没有这个目录，那么就创建
	} 

	if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
		//就在这里移动了。		
		//第一个参数，写上临时文件的地址，
		//第二个参数，第二个参数写上你要存放的地址
		
		//先去判断这个目录是否存在。
		
		//如果想屏蔽掉警告，直接加上@
		
		if (!@move_uploaded_file($_FILES['userfile']['tmp_name'],URL.'/'.$_FILES['userfile']['name'])) {
			//如果移动失败，就失败
			echo "<script>alert('移动失败');history.back();</script>";
			exit;
		}
		
	} else {
		echo "<script>alert('临时文件夹找不到上传的文件');history.back();</script>";
		exit;
	}
	
	//全部通过就上传成功了。
	//必须传一个值给Demo3.php
	//文件上传的地址
	echo "<script>alert('文件上传成功');location.href='demo3.php?url=".$_FILES['userfile']['name']."';</script>"
	

?>







