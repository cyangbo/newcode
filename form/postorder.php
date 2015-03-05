<?php
 
	$apple=$_POST['apple'];
	$pig=$_POST['pig'];
	$biscuit=$_POST['biscuit'];
	
	$apple=$apple*2.6;
	$pig=$pig*13.2;
	$biscuit=$biscuit*21;
	
	$sum=$apple+$pig+$biscuit;
?>
<!DOCTYPE	html PUBLIC	"-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>我的第一个PHP程序</title>
<style>
table {
	background:#ccc;
	width:200px;
	margin:20px auto;
}
table td {
	background:#fff;
}
</style>
</head>
<body>

<form method="post" action="postorder.php">
	<table>
		<tr><td>您的商品</td><td>价格</td><td>小记</td></tr>
		<tr><td>苹果</td><td>2.6元/斤</td><td><?echo $apple ?></td></tr>
		<tr><td>猪肉</td><td>13.2元/斤</td><td><?echo $pig ?></td></tr>
		<tr><td>饼干</td><td>21元/盒</td><td><?echo $biscuit ?></td></tr>
		<tr><td colspan="3" align="center">一共要支付<?echo $sum ?>元 [<a href="orderform.php">返回修改</a>]</td></tr>
	</table>
</form>

</body>
</html>