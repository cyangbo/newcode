<?php
require_once 'simple_html_dom.php';
//get_meta_tags
//tb-selected
$url='http://detail.tmall.com/item.htm?id=40843141485&ali_trackid=2:mm_25624552_5296365_21484824:1415284186_2k5_1110300062';
//$subject = file_get_contents($url);
//echo $subject;
//$cc = get_meta_tags($url);


$html = file_get_html($url);
foreach($html->find('.tb-selected') as $element) {

    $pattern = '/http.*?\.jpg/';
	preg_match($pattern, $element, $matches);
	echo ($matches[0]);
}
    
    


/*
<li class="tb-selected">  				 				
<a href="#">
<img src="http://gi2.md.alicdn.com/bao/uploaded/i2/TB1r3LQGFXXXXXlXFXXXXXXXXXX_!!0-item_pic.jpg_60x60q90.jpg" /></a>  			
</li>*/





//print_r($matches);
?>