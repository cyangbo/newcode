<form action="" method="post">
     <p>���Ա���:<input type="text" name="title" /></p>
     <p>��������:<textarea name="data" id="" cols="60" rows"10"></textarea></p>
     <p><input type="submit" value="POST" /></p>
<br />
<br />
<br />
<?php
if(count($_POST)==2){
  //��ʾ�б��ύ��...
$title = $_POST['title'];
$data = $_POST['data'];


if($title==''){
 echo '�ύ���ⲻ��Ϊ��...';
 return ;
}
if($data==''){
 echo '�ύ���ݲ���Ϊ��...';
 return ;
}

$title=str_replace("\n",'\n',$title);
$data=str_replace("\n",'\n',$data);
//��д��֮ǰӦ���ж�һ��,�û��ύ�������Ƿ����"|",����...�Ҳ���==!!...
$fn = fopen('.\data.txt','a');//���ļ�.�����ļ���.��������Ӧ����int.
fwrite($fn,$title.'|'.$data."\n");//д������
fclose($fn);//�ر��ļ���

echo '���ݳɹ�д��...<br />';
}




$data_Array = explode("\n",file_get_contents('.\data.txt'));//����data.txt,����\n���зָ�.
for($i=0;$i != count($data_Array);$i++){

	$Array1 = explode('|',$data_Array[$i]);
	
	if(count($Array1)!=2){
		echo '���ִ���.�������.';
		return ;
	}
	

 echo '<li>����:',str_replace('\n',"\n",$Array1[0]),'</li>';
 echo '<li>����:',str_replace('\n',"\n",$Array1[1]),'</li>';

 echo str_repeat('<br />',3);//ȡ3��'<br />'
}
?>