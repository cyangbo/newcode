<?php



$info="PHP������ҳ�ı��滻 Labs.net.cn";

error_reporting(7);

ob_start();

$mtime = explode(' ', microtime());

$starttime = $mtime[1] + $mtime[0];



/*===================== �������� =====================*/



// �Ƿ���Ҫ������֤,1Ϊ��Ҫ��֤,��������Ϊֱ�ӽ���.����ѡ������Ч

$admin['check'] = "shishi";

// �����Ҫ������֤,���޸ĵ�½����

$admin['pass']  = "labs.net.cn";



/*===================== ���ý��� =====================*/



// ��������� register_globals = off �Ļ����¹���

$onoff = (function_exists('ini_get')) ? ini_get('register_globals') : get_cfg_var('register_globals');



if ($onoff != 1) {

	@extract($_POST, EXTR_SKIP);

	@extract($_GET, EXTR_SKIP);

}



$self = $_SERVER['PHP_SELF'];

$dis_func = get_cfg_var("disable_functions");



/*===================== �����֤ =====================*/



if($admin['check'] == "1") {

	if ($_GET['action'] == "logout") {

		setcookie ("adminpass", "");

		echo "<meta http-equiv=\"refresh\" content=\"3;URL=".$self."\">";

		echo "<span style=\"font-size: 12px; font-family: Verdana\">ע��ɹ�......<p><a href=\"".$self."\">������Զ��˳��򵥻������˳�������� &gt;&gt;&gt;</a></span>";

		exit;

	}



	if ($_POST['do'] == 'login') {

		$thepass=trim($_POST['adminpass']);

		if ($admin['pass'] == $thepass) {

			setcookie ("adminpass",$thepass,time()+(1*24*3600));

			echo "<meta http-equiv=\"refresh\" content=\"3;URL=".$self."\">";

			echo "<span style=\"font-size: 12px; font-family: Verdana\">��½�ɹ�......<p><a href=\"".$self."\">������Զ���ת�򵥻�������������� &gt;&gt;&gt;</a></span>";

			exit;

		}

	}

	if (isset($_COOKIE['adminpass'])) {

		if ($_COOKIE['adminpass'] != $admin['pass']) {

			loginpage();

		}

	} else {

		loginpage();

	}

}

/*===================== ��֤���� =====================*/

?>

<html>

<head>

<title><?php echo $info;?></title>

<style type="text/css">

body{

	font-size:12px;

	font-family:"MS Sans Serif", "Helvetica", "sans-serif";

	text-align:center;

	margin:0 0 0 0;



}

textarea {

	font: 12px "Verdana", "Tahoma", "sans-serif";

	padding: 4px;

}

input {font-family: "Verdana";font-size: "11px";BACKGROUND-COLOR: "#FFFFFF";height: "18px";border: "1px solid #666666";}

form{

margin:0 0 0 0;

}

div{

padding:2 5 2 5;

margin:2 2 2 2;

}

a:link,a:visited,a:active {

	color: "#000000";

	text-decoration: underline;

}

a:hover {

	color: "#465584";

	text-decoration: none;

}

.main{

	width:800;

	height:;

	text-align:left;

}

.header{

	width:100%;

}

.title{

	font-weight:bold;

	float:left;

}

.menu{

	float:right

}

.msg{

	border-top:1px solid #000000;

}

.about{

	border-top:1px solid #000000;

	width:100%;

}

.step{

	border-top:1px solid #000000;

	width:100%;

}

.text{



}

.form{

	border-top:1px solid #000000;

}

.item{

	width:100%;

	text-align:center;

}

.button{

	width:100%;

	text-align:center;

}

.footer{

	margin-top:20;

	width:100%;

	border-top:1px solid #000000;

}

.copyright{

float:left;

}

.run{

float:right;

}

</style>

</head>

<body>





<?php

/*

//������

echo "<pre>\n";

echo "_POST\n";

print_r($_POST);

echo "_GET\n";

print_r($_GET);

echo "</pre>\n";

*/

?>





<div class="main">

<div class="header"><div class="title"><?php echo $info;?></div><div class="menu">

<?php

if($admin['check'] == "1"){?>

<a href="?action=logout">ע��</a><?php }

?>

</div>

</div>

<div class="msg">

<?php



if($_GET['action']=="replace"){

	if(!$_POST['submit']){	

		$_POST['dir']==""?$dir=".":$dir=$_POST['dir'];		//�趨Ŀ¼

		$count=$_POST['count'];

//���ú���

		listfiles($dir);

		echo "<font color=\"red\">�滻���!</font><br>\n";

	

	}

}

else if($_GET['action']=="post"){

	$count=$_POST['count'];

	info();

}

else{

	if(empty($count))$count=1;else $count=$_GET['count'];

	info();

}

if($count<1)$count=1;

?>

</div>

<div class="about">

Coze by <a href="http://labs.net.cn">Labs.Net.cn</a><br />

Last update on Dec 30 2006<br />

</div>

<div class="step">

ʹ�÷���:

<ol>

<li>

���滻֮ǰ�뽫Ҫ�滻���ļ�����ȫ���޸�Ϊ 0777 (WINDOWS����������ʡ�Դ˲���)

</li>

<li>

�޸��滻����

</li>

<li>

�趨��Ҫ�滻��Ŀ¼

</li>

<li>

�趨�滻�ļ��ĺ�׺

</li>

<li>

...

</li>

</ol>

<font color="red">ע��:���ñ�����,һ�����?�����޷��ָ�,ʹ�����������ɾ��,����κκ���Ը�.</font>
<?php 
echo  "<br>".$_SERVER['DOCUMENT_ROOT']."<br>"; 
?>

</div>

<div class="form">

	<div class="text">

	<form id="form1" name="form1" method="post" action="?action=post">

 		<label>�滻����:

 		<input name="count" type="text" maxlength="3" />

 		</label>

 		<label>

	 	<input type="submit" name="Submit" value=" �޸� "  />

	 	</label>

	</form>

	</div>

		<form name="form" method="post" action="?action=replace">

	<div class="text">

		<input name="count" type="hidden" value="<?php echo $count; ?>">

		<label>Ŀ��Ŀ¼:

		<input type="text" name="dir" value="" />

		��Ҫ�滻��Ŀ¼,��:dir/dirname</label>

	</div>

	<div class="text">

		<label>�ļ�����:

		<input type="text" name="type" value="" />

		����д�ļ���׺,���ֺ�׺����"|"�ָ�,��:txt|html|htm,����Ϊ�滻ȫ������</label>

	</div>

	<div class="text">

<?php

for($i=1;$i<=$count;$i++){

	print("<div class=\"item\"><textarea name=\"a[{$i}]\" cols=\"50\" rows=\"10\"></textarea>  <textarea name=\"b[{$i}]\" cols=\"50\" rows=\"10\"></textarea></div>");

}

?>

	</div>

<div class="button">

<input type="submit" name="Submit" value=" �޸� " />

<input type="reset" name="Submit2" value=" ���� " />

</div>

		</form>

</div>

<div class="footer">

	<div class="copyright">Copyright (C) 2006 m4ker.net All Rights Reserved.</div>

	<div class="run"><?php

	debuginfo();

	ob_end_flush();	

	?></div></div>

</div>
<?php 
echo $_SERVER['HTTP_HOST']."<br>"; 
?>
</body>

</html>







<?php

/*===================== ���庯��========================*/

function listfiles($dir="."){//����Ŀ¼���滻

	$hAndle=opendir($dir);//��Ŀ¼

	while(fAlse!=($file=reAddir($hAndle))){//�Ķ�Ŀ¼

		if($file!='.'&&$file!='..'){//�г������ļ���ȥ��'.'��'..

			if(is_dir("$dir/$file")){//�г��ļ���Ŀ¼

				echo "<font color=\"yellow\">$dir/$file</font><br />";//���Ŀ¼��[��ɫ]

				listfiles("$dir/$file");//�ݹ����

			}

			else if("$dir/$file"!=selfname()){//�ж�����

				echo "$dir/$file";//����ļ���

				//��ȡ�ļ�����

				if(checktype(selftype("$dir/$file"),types($_POST['type'])) and $_POST['type']!=""){

					if(filesize("$dir/$file")>0){

						if(is_writable("$dir/$file")){

							$fp=fopen("$dir/$file","r");

							$con=addslashes ( freAd($fp,filesize("$dir/$file")));

//==========================�滻����

							$con=replace($_POST['a'],$_POST['b'],$con);

							fclose($fp);//�ر��ļ�����

							$fd=fopen("$dir/$file","w");//���ļ�

							$A=fputs($fd,stripslashes ($con));//д���滻�������

							fclose($fd);//�ر��ļ�����

							echo "<br />";

						}

						else{

							echo "<font color=\"red\">&nbsp;����д</font><br />";

						}

					}

				}

				else if($_POST['type']==""){

					if(filesize("$dir/$file")>0){

						if(is_writable("$dir/$file")){

							$fp=fopen("$dir/$file","r");

							$con=addslashes ( freAd($fp,filesize("$dir/$file")));

//==========================�滻����

							$con=replace($_POST['a'],$_POST['b'],$con);

							fclose($fp);//�ر��ļ�����

							$fd=fopen("$dir/$file","w");//���ļ�

							$A=fputs($fd,stripslashes ($con));//д���滻�������

							fclose($fd);//�ر��ļ�����}

							echo "<br />";

						}

						else{

							echo "<font color=\"red\">&nbsp;����д</font><br />";

						}

					}

				}

				else{

				echo "<font color=\"red\">&nbsp;���Ͳ�ƥ��</font><br />";

				}

			}

}

}

}

function selfname(){//���ر��ļ���

	$a=explode("/", $_SERVER['PHP_SELF']);

	return "./".$a[count($a)-1];

}



function selftype($filepath){//�����ļ���׺

	$a=explode(".", $filepath);

	return $a[count($a)-1];

}



function checktype($selftype,$type){

	for($i=0;$i<count($type);$i++){

		$a=0;

		if($type[$i]==$selftype){

		$a=1;

		break;

		}

	}

	return $a;

}



function types($types){

	$type=explode("|",$types);

	return $type;

}



function replace($a,$b,$c){

	for($i=1;$i<=count($a);$i++){

		$c=str_replAce($a[$i],$b[$i],$c);

	}

	return $c;

}//end replace()

function info(){

?>

<div align="center">

<a href="http://labs.net.cn" target="_blank">Labs Of China</a>��������,���� <a href="http://labs.net.cn" target="_blank">�й�����ʵ����</a> �������°汾�Լ��ṩ����֧��</div>

<?php

}

	// ��½���

	function loginpage() {

?>

<style type="text/css">

input {font-family: "Verdana";font-size: "11px";BACKGROUND-COLOR: "#FFFFFF";height: "18px";border: "1px solid #666666";}

</style>

<form method="POST" action="">

<font color="red" style="font-size:12px;">Ĭ������:labs.net.cn,�뾡���޸��������.</font><br />

<span style="font-size: 11px; font-family: Verdana">Password: </span><input name="adminpass" type="password" size="20">

<input type="hidden" name="do" value="login">

<input type="submit" value="Login">

</form>

<?php

		exit;

	}//end loginpage()

		// ҳ�������Ϣ

	function debuginfo() {

		global $starttime;

		$mtime = explode(' ', microtime());

		$totaltime = number_format(($mtime[1] + $mtime[0] - $starttime), 6);

		echo "Processed in $totaltime second(s)";

	}
?> 