<?php

	//����һ������,
	//ʲô���ͣ����ͣ��ַ����������ͣ�������
	//����������ʱ��ͨ����ֵ��ȷ���������ͣ�
	$sum = 0;
	$total = 1.22;
	$sum = $total;	
	echo $sum;
	
	
	echo "<br>";
//�������͵�ת��
//	$sum = 0;
//	$total = 1.22;
//	$sum = $total;   //��ʽת��
	$sum = 0;
	$total = (float)$sum;   //��ʾת��
	//�õ���������gettype($var);
	echo gettype($total);
	
	
	
	echo "<br>";
	//��������settype() 
	$sum = 100;	
	//��;��$sum����ת�����ַ�����
	settype($sum,"string");	
	//���ʱ��$sum��100�������֣������ַ���"100"
	echo gettype($sum);
	
	echo "<br>";	
	//isset()��unset()
	//�ж�һ�������Ƿ����
	//����һ������
	$a = 5;	
	//����$a�Ѿ����ڡ�	
	//unset($a);	
	//���$a������������Ǵ��ڵģ���ôisset($a)����һ������ֵ1,����ǿ�,�Ͳ�������κζ���,����0
	echo isset($a);	
	$b = 0;   //���ַ�������Ϊ�ǿ�,�վͷ�����,true ,1
	echo empty($b);

	
	
		//�����жϺ���
	echo "<br>�����жϺ���";
	$sum = "100";
	$cc = 99;
	echo is_integer($sum);
	echo is_integer($cc);
	
	
	//$sum �Ǹ�����
		echo "<br>������<br>";
	$sum = 22.22;
	
	//intval($sum)������������,
	echo intval($sum)."<br>";
	echo gettype($sum)."<br>";
	settype($sum,"integer");
//	echo $sum;
	
	//����$sumĿǰ��ʲô����
	echo gettype($sum);
	

?>