<?php
	
function getProductAction(){	

	$params = array();
	$HeaderRequest = array();
	$HeaderRequest['customerCode'] = 'C0132';
	$HeaderRequest['appToken'] = 'AC241DF87A6BC9BB';
	$HeaderRequest['appKey'] = 'f17f9542d8957b22cdf57854f386dacc';
	
	$params['HeaderRequest']= $HeaderRequest;

	$params['productSku'] = '126500013';
	
	$url = 'http://testfedex-import.ehaiwaigou.cn/default/product-soap';
	$client = new SoapClient($url,array( 'trace' => 1 ));
	try{
                $a = $client->getProduct($params);
	}catch(SoapFault $fault){
                echo $fault->faultcode;
                echo "<br>";
                echo $fault->faultstring; 
	}
            header( 'Content-Type:text/html;charset=utf-8 ');
           // print_r(unserialize($a->message));
		  print_r($a);
          echo ($client->__getLastResponse());
	
}
	
 //getProductAction();

 function createProductAction(){
    $params = array();
			$HeaderRequest = array();
			$HeaderRequest['customerCode'] = 'C0089';
			$HeaderRequest['appToken'] = 'D50FFE2F6A010622';
			$HeaderRequest['appKey'] = 'd274bccfbb86e15a2941798946c8065b';
			
			$params['HeaderRequest']= $HeaderRequest;

			//$params['ProductInfo'] = array(
			//	'skuNo'=>'888668102',
			//	'skuEnName'=>'时尚真皮针扣男士皮带',
			//	'skuName'=>'test',
			//	'skuCategory'=>'3',
			//	'UOM'=>'007',
			//	'barcodeType'=>0,
			//	'barcodeDefine'=>'',
			//	'length'=>'',
			//	'width'=>'',
			//	'height'=>'',
			//	'weight'=>'1',
			//	'netWeight'=>'0.8',
			//	'productDeclaredValue'=>'22',
			//	'distributorCode'=>'9406000010',
			//	'hsCode'=>'9406000010',
			//	'hsGoodsName'=>'name',
			//	'specificationsAndModels'=>'衣服',
			//	'originCountry'=>'CN',
			//	'brand'=>'老虎牌',
			//	'goodTaxCode'=>'04010100',
			//	'applyEnterpriseCode'=>'01010150',
			//	'productLink'=>'http://www.imoda.com',
			//);

            $params['ProductInfo'] = array(
				'skuNo'=>'1buybuyall12399',
				'skuEnName'=>'时尚真皮针扣男士皮带',
				'skuName'=>'buybuyall12399',
				'skuCategory'=>'3',
				'UOM'=>'007',
				'barcodeType'=>0,
				'barcodeDefine'=>'',
				'length'=>'',
				'width'=>'',
				'height'=>'',
				'weight'=>'1',
				'netWeight'=>'0.8',
				'productDeclaredValue'=>'22',
				'distributorCode'=>'9406000010',
				'hsCode'=>'9406000010',
				'hsGoodsName'=>'buybuyall123',
				'specificationsAndModels'=>'衣服',
				'originCountry'=>'CN',
				'brand'=>'百百购',
				'goodTaxCode'=>'04010100',
				'applyEnterpriseCode'=>'04010100',
				'productLink'=>'www.buybuyall.com',
			);
			// echo "<pre />";print_r($params);
			
			$url = 'http://fedex-import.ehaiwaigou.cn/default/product-soap';
			$client = new SoapClient($url,array( 'trace' => 1 ));
			try{
						$a = $client->createProduct($params);
						
			}catch(SoapFault $fault){
						echo $fault->faultcode;
						echo "<br>";
						echo $fault->faultstring; 
			}
					header( 'Content-Type:xml;charset=utf-8 ');
					//print_r(unserialize($a->message));
				  echo "<pre />";print_r($a);
 }
 
 //createProductAction();
 //
function createOrderAction(){
    $HeaderRequest['customerCode'] = 'C0089';
	$HeaderRequest['appToken'] = '683F0529AD4D3489';
	$HeaderRequest['appKey'] = '0abfe848f7ee82bfec1f0bdfc90673d3';	
	
	$paragram['HeaderRequest']= $HeaderRequest;
	
	$paragram['OrderInfo'] = array(
            'orderModel'        => 1,
            'smCode'            => 'FEDEX',
            'oabCounty'         => 'CN',
            'oabStateName'      => '宁夏',
            'oabCity'           => '银川',
            'oabPostcode'       => '750001',
            'oabStreetAddress1' => '银川市兴庆区民族南街名人国际大厦88楼808室',
            'oabName'           => '张三丰',
            'idType'            => '身份证',
            'idNumber'          => '440105199008030030',
            'oabPhone'          => '13888888889',
            'oabEmail'          => 'test@ningxia.com',
            'referenceNo'       => '99201501253689',
            'trackingNumber'    => '9898000011118',
            'grossWt'           => 51.68,
            'currencyCode'      => 'RMB',
            'orderProduct'     => array(
                array(
                    'productSku'        => 'demo03241',
                    'opQuantity'        => 2,
                    'dealPrice'         => 35.5,
                    'transactionPrice'  => 71,
                ),
                array(
                    'productSku'        => 'scc201503231',
                    'opQuantity'        => 2,
                    'dealPrice'         => 35.5,
                    'transactionPrice'  => 71,
                ),
            ),
        );
	$wsdlurl = "http://testfedex-import.ehaiwaigou.cn/default/order-soap/";
	// $paragram['createExchangeOrderInfo'] = $array;
	$soap = new SoapClient($wsdlurl,array( 'trace' => 1 ));
	$stock = $soap->createOrder($paragram);
	//header( 'Content-Type:textml;charset=utf-8 ');
	//echo "<pre />";print_r($stock);
    echo ($soap->__getLastResponse());
    echo ($soap->__getLastRequest());
 }
 
//createOrderAction();
 
function updateOrderAction(){
    $HeaderRequest['customerCode'] = 'C0132';
	$HeaderRequest['appToken'] = 'AC241DF87A6BC9BB';
	$HeaderRequest['appKey'] = 'f17f9542d8957b22cdf57854f386dacc';	
	
	$paragram['HeaderRequest']= $HeaderRequest;
	
	$paragram['OrderInfo'] = array(
            'orderCode'         => 'SOC01320000011',
            'orderModel'        => 1,
            'smCode'            => 'FEDEX',
            'oabCounty'         => 'CN',
            'oabStateName'      => '广西',
            'oabCity'           => '银川',
            'oabPostcode'       => '750001',
            'oabStreetAddress1' => '银川市兴庆区民族南街名人国际大厦88楼808室',
            'oabName'           => '张三丰',
            'idType'            => '身份证',
            'idNumber'          => '440105199008030030',
            'oabPhone'          => '13888888889',
            'oabEmail'          => 'test@ningxia.com',
            'referenceNo'       => '6020150125369',
            'grossWt'           => 5.68,
            'currencyCode'      => 'RMB',
            'orderProduct'     => array(
                array(
                    'productSku'        => '126500013',
                    'opQuantity'        => 2,
                    'dealPrice'         => 35.5,
                    'transactionPrice'  => 71,
                ),
                array(
                    'productSku'        => '117100096',
                    'opQuantity'        => 2,
                    'dealPrice'         => 35.5,
                    'transactionPrice'  => 71,
                ),
            ),
        );
	$wsdlurl = "http://testfedex-import.ehaiwaigou.cn/default/order-soap/";
	// $paragram['createExchangeOrderInfo'] = $array;
	$soap = new SoapClient($wsdlurl,array( 'trace' => 1 ));
	$stock = $soap->updateOrder($paragram);
	header( 'Content-Type:textml;charset=utf-8 ');
	//echo "<pre />";print_r($stock);
    echo ($soap->__getLastResponse());
    echo ($soap->__getLastRequest());
 }
 
//updateOrderAction();

function getOrderByCodeAction(){	

	$params = array();
	$HeaderRequest = array();
	$HeaderRequest['customerCode'] = 'C0132';
	$HeaderRequest['appToken'] = '683F0529AD4D3489';
	$HeaderRequest['appKey'] = '0abfe848f7ee82bfec1f0bdfc90673d3';
	
	$params['HeaderRequest']= $HeaderRequest;

	$params['orderCode'] = 'SOC01320000009';
	
	$url = 'http://testfedex-import.ehaiwaigou.cn/default/order-soap';
	$client = new SoapClient($url,array( 'trace' => 1 ));
	try{
                $a = $client->getOrderByCode($params);
	}catch(SoapFault $fault){
                echo $fault->faultcode;
                echo "<br>";
                echo $fault->faultstring; 
	}
            header( 'Content-Type:text/html;charset=utf-8 ');
           // print_r(unserialize($a->message));
		  //print_r($a);
          echo ($client->__getLastResponse());
          //echo ($client->__getLastRequest());
	
}
	
//getOrderByCodeAction();

function updateOrderStatusAction(){	

	$params = array();
	$HeaderRequest = array();
	$HeaderRequest['customerCode'] = 'C0132';
	$HeaderRequest['appToken'] = 'AC241DF87A6BC9BB';
	$HeaderRequest['appKey'] = 'f17f9542d8957b22cdf57854f386dacc';
	
	$params['HeaderRequest']= $HeaderRequest;

	$params['orderCode'] = 'SOC01320000009';
    $params['orderStatus'] = 1;
	
	$url = 'http://testfedex-import.ehaiwaigou.cn/default/order-soap';
	$client = new SoapClient($url,array( 'trace' => 1 ));
	try{
                $a = $client->updateOrderStatus($params);
	}catch(SoapFault $fault){
                echo $fault->faultcode;
                echo "<br>";
                echo $fault->faultstring; 
	}
            header( 'Content-Type:text/html;charset=utf-8 ');
           // print_r(unserialize($a->message));
		  print_r($a);
          echo ($client->__getLastResponse());
          echo ($client->__getLastRequest());
	
}
	
//updateOrderStatusAction();