<?php 

if (@$_GET['action'] == 'login') {
	
	if(@$_POST['url']!=null && @$_POST['catt']!=null){
		require_once 'collectb.php';
		$myurl = $_POST['url'];
		//echo $myurl;
		$myuid = $_POST['catt'];
		//echo $myuid;
		_zhe800($myurl,$myuid);		
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>采集数据</title>
</head>
<body>


	
			<form method="post" name="login" action="collectcc.php?action=login">
				折800:<input type="text" name="url" class="text" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="开始采集" class="button" /><br><br>
				<input type="radio" name="catt" value="37"> 女装
				<input type="radio" name="catt" value="38"> 鞋子
				<input type="radio" name="catt" value="39"> 包包
				<input type="radio" name="catt" value="40"> 亲子
				<input type="radio" name="catt" value="200">  男装 
				<input type="radio" name="catt" value="201">  配饰 
				<input type="radio" name="catt" value="202">  美食 
				<input type="radio" name="catt" value="203">  数码 
				<input type="radio" name="catt" value="204">  美妆 
				<input type="radio" name="catt" value="205">  文体
				</form>
				
				<br><br><br><br>
			<form method="post" name="login" action="login.php?action=login">
				折800:<input type="text" name="url" class="text" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="开始采集" class="button" /><br><br>
				<input type="radio" name="catt" value="37"> 女装
				<input type="radio" name="catt" value="38"> 鞋子
				<input type="radio" name="catt" value="39"> 包包
				<input type="radio" name="catt" value="40"> 亲子
				<input type="radio" name="catt" value="200">  男装 
				<input type="radio" name="catt" value="201">  配饰 
				<input type="radio" name="catt" value="202">  美食 
				<input type="radio" name="catt" value="203">  数码 
				<input type="radio" name="catt" value="204">  美妆 
				<input type="radio" name="catt" value="205">  文体
			</form>
	
	
	

</body>
</html>