<?php
/**
 * 有id,pic在txt中
 * 按行读取txt文件
 * 按照空格一行分成id,pic在数组0,1中
 * update yufu_tuan set thumb=pic where id=id;
 * 
 */

$array_file = file ( 'all.txt'  );
$con = mysql_connect('localhost','root','root');
mysql_select_db('cyangbo2');
mysql_query('set names utf8');

		//如果有一行数据,就执行下面操作
		foreach ( $array_file as $key => $value ) {

			$cc = $key+1;
			mysql_query("update yufu_tuan set thumb='$value' where id='$cc'");
		
		}	

mysql_close($con);

?>