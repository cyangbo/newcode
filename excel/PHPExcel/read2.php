<?php  
/** 
 * 该文件只是单纯的读取excel文件 
 */  
header('Content-Type:text/html;charset=utf-8');//设置php页面字符集  
  


require_once 'lib/PHPExcel.php';  //phpexcel主程序文件
require_once 'lib/PHPExcel/Reader/Excel2007.php';  //07版excel配置文件
require_once 'lib/PHPExcel/Reader/Excel5.php';  
include_once 'lib/PHPExcel/IOFactory.php';  


  //创建新的PHPExcel对象  
$objexcel=new PHPExcel();  
$php_reader = new PHPExcel_Reader_Excel2007();  
  
//$objexcel->setActiveSheetIndex(0)->setCellValue('A1', '中文');  
  
$excelFileUrl = '01simple.xlsx';//xlsx文件路径  
$xlsFileUrl = '01simple.xls';//97-03版excel文件路径  
  
echo '<pre>';  
if(file_exists($excelFileUrl))  
{  
    $php_reader->canRead($excelFileUrl);  
  
    $objexcel = $php_reader->load($excelFileUrl);  
      
    $current_sheet =$objexcel->getSheet(0);  
      
    $all_column =$current_sheet->getHighestColumn();//获取excel文件里的最大列标  
    $all_row =$current_sheet->getHighestRow();//获取excel文件里的最大行标  
  
    $excelFileArray=array();  
    
    
    
    //循环列标和行标  
    //将取得内容组成一个二维数组 格式： Array['列标']['行标']['value']=值  
    for($c = 'A'; $c <= $all_column; $c++)  
    {  
        for($r = 0; $r <= $all_row; $r++)  
        {  
            $SerialNum = $c.$r;//excel文件里的坐标。即列标与行数结合  
            $content = $current_sheet->getCell($SerialNum)->getValue();//获取excel文件里当前坐标下（文本框）的内容  
              
            //如果当前坐标内的值为object对象类型  
            if(is_object($content))  
            {  
                $content = $content->__toString();  
            }  
              
            $excelFileArray[$c][$r]['content'] = $content;  
        }  
    }  
    var_dump($excelFileArray);  
      
}  
echo '</pre>'; 

//Add a hyperlink to the sheet 添加链接
/* $objPHPExcel->getActiveSheet()->setCellValue(‘E26′, ‘www.phpexcel.net’);
 $objPHPExcel->getActiveSheet()->getCell(‘E26′)->getHyperlink()->setUrl(‘http://www.phpexcel.net’);
 $objPHPExcel->getActiveSheet()->getCell(‘E26′)->getHyperlink()->setTooltip(‘Navigate to website’);
 $objPHPExcel->getActiveSheet()->getStyle(‘E26′)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);*/
?>