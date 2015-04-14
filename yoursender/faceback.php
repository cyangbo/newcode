<form action="" method="post">
     <p>留言标题:<input type="text" name="title" /></p>
     <p>留言内容:<textarea name="data" id="" cols="60" rows"10"></textarea></p>
     <p><input type="submit" value="POST" /></p>
<br />
<br />
<br />
<?php
if(count($_POST)==2){
  //表示有表单提交啦...
$title = $_POST['title'];
$data = $_POST['data'];


if($title==''){
 echo '提交标题不能为空...';
 return ;
}
if($data==''){
 echo '提交内容不能为空...';
 return ;
}

$title=str_replace("\n",'\n',$title);
$data=str_replace("\n",'\n',$data);
//在写入之前应该判断一下,用户提交的数据是否包含"|",但是...我不会==!!...
$fn = fopen('.\data.txt','a');//打开文件.返回文件号.数据类型应该是int.
fwrite($fn,$title.'|'.$data."\n");//写出数据
fclose($fn);//关闭文件号

echo '数据成功写入...<br />';
}




$data_Array = explode("\n",file_get_contents('.\data.txt'));//读入data.txt,并用\n进行分割.
for($i=0;$i != count($data_Array);$i++){

	$Array1 = explode('|',$data_Array[$i]);
	
	if(count($Array1)!=2){
		echo '发现错误.程序结束.';
		return ;
	}
	

 echo '<li>标题:',str_replace('\n',"\n",$Array1[0]),'</li>';
 echo '<li>内容:',str_replace('\n',"\n",$Array1[1]),'</li>';

 echo str_repeat('<br />',3);//取3个'<br />'
}
?>