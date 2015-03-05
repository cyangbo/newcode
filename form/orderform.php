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
		<tr><td>您的商品</td><td>价格</td><td>数量</td></tr>
		<tr><td>苹果</td><td>2.6元/斤</td><td><input type="text" size="5" name="apple" /></td></tr>
		<tr><td>猪肉</td><td>13.2元/斤</td><td><input type="text" size="5" name="pig" /></td></tr>
		<tr><td>饼干</td><td>21元/盒</td><td><input type="text" size="5" name="biscuit" /></td></tr>
		<tr><td colspan="3" align="center"><input type="submit" value="发送订单" /></td></tr>
	</table>
</form>

</body>
</html>