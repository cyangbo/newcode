<?php

	//echo $username; ���ּ�̷��������
	//�����������ͨ�����Ĺ�ϵ��
	
	//��һ��,�����ܵ��ı����ݸ�ֵ��һ������
	
	//����һ�ű���name�����Ƶ�valueֵ��ȡ����  value="����" name="username"
	//$_POST['username']�������ͻ᷵�س�"����"����ַ���
	
	$username = $_GET['username'];


//	$username =  $HTTP_POST_VARS['username'];
	
	echo "���ѧ���ǣ�".$username;
	
	//echo mt_rand(1,10);
	
	echo pi();
	

?>

<?php 
	$i = 123456;
	$si = number_format($i,2,".",",");
	echo $si;
?>