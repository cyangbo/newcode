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
<title>�ҵĵ�һ��PHP����</title>
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
		<tr><td>������Ʒ</td><td>�۸�</td><td>С��</td></tr>
		<tr><td>ƻ��</td><td>2.6Ԫ/��</td><td><?echo $apple ?></td></tr>
		<tr><td>����</td><td>13.2Ԫ/��</td><td><?echo $pig ?></td></tr>
		<tr><td>����</td><td>21Ԫ/��</td><td><?echo $biscuit ?></td></tr>
		<tr><td colspan="3" align="center">һ��Ҫ֧��<?echo $sum ?>Ԫ [<a href="orderform.php">�����޸�</a>]</td></tr>
	</table>
</form>

</body>
</html>