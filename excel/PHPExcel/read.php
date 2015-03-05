<?php  
  
/** 
 * PHPEXCEL生成excel文件 
* @desc 支持任意行列数据生成excel文件，暂未添加单元格样式和对齐 
*/  
require_once 'lib/PHPExcel.php';  
require_once 'lib/PHPExcel/Reader/Excel2007.php';  
require_once 'lib/PHPExcel/Reader/Excel5.php';  
include_once 'lib/PHPExcel/IOFactory.php';  
  
$objReader = PHPExcel_IOFactory::createReader ( 'Excel2007' );  
$objReader->setReadDataOnly ( true );  
$objPHPExcel = $objReader->load ("test.xls");  
//$objWorksheet = $objPHPExcel->getActiveSheet ();  
$objWorksheet = $objPHPExcel->getSheet (0);  
//取得excel的总行数  
$highestRow = $objWorksheet->getHighestRow ();  
//取得excel的总列数  
$highestColumn = $objWorksheet->getHighestColumn ();  
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString ( $highestColumn );  
$excelData = array ();  
for($row = 2; $row <= $highestRow; $row++) {  
    for($col = 1; $col < $highestColumnIndex; $col++) {  
        $excelData[$row-2][] = $objWorksheet->getCellByColumnAndRow ( $col, $row )->getValue ();  
    }  
}  
echo "<pre>";  
print_r($excelData);  
echo "</pre>";  
  
?>  