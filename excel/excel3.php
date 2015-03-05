  
<?php  
require_once 'Excel/reader.php';    
$data = new Spreadsheet_Excel_Reader();   
$data->setOutputEncoding('utf-8'); 
$conn= mysql_connect('localhost','root','root') or die("连接错");  
mysql_query("set names utf8'");//设置编码输出  
mysql_select_db('cyangbo2'); //选择数据库  
if(@$_POST['Submit'])  
{  
	$data->read($_POST['file']);  
	  
	for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {  
		  $sql = "INSERT INTO excel VALUES(null,'".$data->sheets[0]['cells'][$i][6]."')";   
		  $query=mysql_query($sql);  
		  if($query)  
		    {  
			     echo "chenggong";  
			     }else{  
			     echo "eee";  
			     }  
	}  
}  
?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-cn">
<head></head>
<body>
<form id="form1" name="form1" method="post" action="">  
  <label>  
  <input name="file" type="file" id="file13"/>  
  <input type="submit" name="Submit" value="提交" />  
  </label>  
</form> 
</body>
</html>




