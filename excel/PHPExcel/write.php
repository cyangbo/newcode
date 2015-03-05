<?php  
  
/** 
 * PHPEXCEL生成excel文件 
* @desc 支持任意行列数据生成excel文件，暂未添加单元格样式和对齐 
*/  
  
require_once 'lib/PHPExcel.php';  
require_once 'lib/PHPExcel/Writer/Excel2007.php';  
require_once 'lib/PHPExcel/Writer/Excel5.php';  
require_once 'lib/PHPExcel/IOFactory.php';  
  
$fileName = "test_excel";  
$headArr = array("姓名","学号","成绩");  
$data = array(array("蔡依林","2038010501","90"),array("潘玮柏","2038010502","91"),array("柳下惠","2038010503","80"));  
getExcel($fileName,$headArr,$data);  
  
  
function getExcel($fileName,$headArr,$data){  
    if(empty($data) || !is_array($data)){  
        die("data must be a array");  
    }  
    if(empty($fileName)){  
        exit;  
    }  
    $date = date("Y_m_d",time());  
    $fileName .= "_{$date}.xlsx";  
  
    //创建新的PHPExcel对象  
    $objPHPExcel = new PHPExcel();  
    $objProps = $objPHPExcel->getProperties();  
  
    //设置表头,从第二列开始  
    $key = ord("B");  
    foreach($headArr as $v){  
        $colum = chr($key);  
        $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);  
        $key += 1;  
    }  
  
    $column = 2;  
    $objActSheet = $objPHPExcel->getActiveSheet();  
    //遍历二维数组的数据  
    foreach($data as $key => $rows){   
        $span = ord("B");  
        // 列写入  
        foreach($rows as $keyName=>$value){  
            $j = chr($span);  
            //按照B2,C2,D2的顺序逐个写入单元格数据  
            $objActSheet->setCellValue($j.$column, $value);  
            //移动到当前行右边的单元格  
            $span++;  
        }  
        //移动到excel的下一行  
        $column++;  
    }  
  
    $fileName = iconv("utf-8", "gb2312", $fileName);  
    //重命名表  
    $objPHPExcel->getActiveSheet()->setTitle('Simple');  
    //设置活动单指数到第一个表,所以Excel打开这是第一个表  
    $objPHPExcel->setActiveSheetIndex(0);  
      
      
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
    //脚本方式运行，保存在当前目录  
    //$objWriter->save($fileName);   
      
    // 输出文档到页面    
    header('Content-Type: application/vnd.ms-excel');    
    header('Content-Disposition: attachment;filename="test.xls"');    
    header('Cache-Control: max-age=0');    
    $objWriter->save("php://output");    
    exit;  
  
}  
  
?>  