<?php

require_once 'Excel/reader.php';   //加载引用操作excel的类  
$data = new Spreadsheet_Excel_Reader(); //实例化  
$data->setOutputEncoding('utf-8');      //编码  
$data->read('test.xls');            //读取的文件  
$conn= mysql_connect('localhost','root','root') or die("连接错");    
mysql_query("set names utf8'");//设置编码输出  
mysql_select_db('cyangbo2'); //选择数据库  
print_r($data->sheets[0]);
print_r($data->sheets[0]['cells'][3][6]);
for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {  
  $sql = "INSERT INTO excel VALUES(null,'".$data->sheets[0]['cells'][$i][6]."')";    
echo $sql.'<br />';    
mysql_query($sql);  
} 
//注意:  
 //for $i=1 是从表的第一行开始，如果第一行是文字说明，那么$i=2  
 //$data>sheets[0]['cells'][$i][1] 代表读取表中的第一个列，如果要取得二个就是 $data>sheets[0]['cells'][$i][2]（但要和数据库中字段数一致）  
?>

