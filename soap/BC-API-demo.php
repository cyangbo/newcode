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
			/* $HeaderRequest['appToken'] = 'D50FFE2F6A010622';
			$HeaderRequest['appKey'] = 'd274bccfbb86e15a2941798946c8065b'; */
			
			$HeaderRequest['appToken'] = '8D7F152F7675830B';
			$HeaderRequest['appKey'] = '8d6858ad8700036650401ddbf2b24e04';
			
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
	/* $HeaderRequest['appToken'] = '773D02ABC262F84F';
	$HeaderRequest['appKey'] = '4b35ace154e18a8e7b05d62e2de43591';	 */
    
    $HeaderRequest['appToken'] = 'D50FFE2F6A010622';
    $HeaderRequest['appKey'] = 'd274bccfbb86e15a2941798946c8065b';
	
	$paragram['HeaderRequest']= $HeaderRequest;
	
	$paragram['OrderInfo'] = array(
            'orderModel'        => 1,						//订单模型:备货模式为0,集货模式为1
            'oabCounty'         => 'CN',					//收件人国家,2位英文大写的代码
            'oabStateName'      => '广东',					//收件人省份
            'oabCity'           => '深圳',					//收件人城市
	        'oabDistrict'           => '福田区',				//收件人区或者县
			'smCode'            => 'YTO',               	//快递代码
			'referenceNo'       => 'abcccssestts3aaf',			//交易订单号
			'oabName'           => '测试姓名',				//收件人姓名
			'oabCompany'		=> '收件人公司名称',			//收件人公司名称			(选填)
            'oabPostcode'       => '700123',				//收件人邮编				(选填)
            'oabStreetAddress1' => '测试数据地址1111',		//具体地址(包括省市区的完整地址)
			'oabPhone'          => '13888888889',           //收件人手机
			'oabEmail'          => 'test@ningxia.com',      //收件人邮箱				(选填)
			'grossWt'           => 40,						//毛重(单位:千克)
			'netWt'				=> 35,						//净重					(选填)
			'currencyCode'      => 'RMB',					//币种
            'idType'            => '身份证',					//收件人证件类型
            'idNumber'          => '445102199001212335',	//收件人证件号(必须是真实有效的号码)
			'remark'           => '这个是API订单的备注',		//订单备注				(选填)
			'orderStatus'      =>'1',              			//订单状态:1是草稿,2是确认(只能是1或者2)      
            'trackingNumber'    => '9898023233aaaf',			//国际运单号				(选填)
            'trackingInternal'	=> '233233322aaaf',			//国内运单号				(选填)
			'shippingFeeEstimate'  =>'11',     				//运费					(选填)
            'orderProduct'     => array(
            array(
                    'productSku'        => 'test001002',		//产品SKU
                    'opQuantity'        => 2,                   //产品数量
                    'dealPrice'         => 35.5,                //产品价格
                    'transactionPrice'  => 71,                  //成交总价
                ), 
                 array(
                    'productSku'        => 'cong0513',
                    'opQuantity'        => 1,
                    'dealPrice'         => 35.5,
                    'transactionPrice'  => 35.5,
                ),  
            ),
        );
	$wsdlurl = "http://bcoms.com/default/order-soap";
	//$wsdlurl = 'http://test-import.ehaiwaigou.cn/default/order-soap';
	// $paragram['createExchangeOrderInfo'] = $array;
	$soap = new SoapClient($wsdlurl,array( 'trace' => 1 ));
	$stock = $soap->createOrder($paragram);
	//header( 'Content-Type:textml;charset=utf-8 ');
	//echo "<pre />";print_r($stock);
    echo ($soap->__getLastResponse());
    echo ($soap->__getLastRequest());
 }
 
createOrderAction();
 
function updateOrderAction(){
    $HeaderRequest['customerCode'] = 'C0089';
	$HeaderRequest['appToken'] = '412598D5F1154D81';
	$HeaderRequest['appKey'] = 'ce504a7d474f6d07e59185a37045454e';	
	
	$paragram['HeaderRequest']= $HeaderRequest;
	
	$paragram['OrderInfo'] = array(
            'orderCode'         => 'SOC00890000160',
            'orderModel'        => 0,
	        'warehouseCode'     => 'GZBYWLCK',          //交货仓库
	        'toWarehouseCode'   => 'GZBYWLCK',         //目的仓库
            'smCode'            => 'YTO',
            'oabCounty'         => 'CN',
            'oabStateName'      => '广东',
            'oabCity'           => '潮州',
	        'oabDistrict'           => '潮安县',
            'oabPostcode'       => '750001',
            'oabStreetAddress1' => '银川市兴庆区民族南街名人国际大厦88楼808室',
            'oabName'           => '好好好c',
            'idType'            => '身份证',
            'idNumber'          => '440105199008030030',
            'oabPhone'          => '13888888889',
            'oabEmail'          => 'test@ningxia.com',
            'referenceNo'       => 'abc32178965s',
            'grossWt'           => 5.68,
            'currencyCode'      => 'RMB',
	        'orderStatus'      =>'4',              //订单状态,4是已提交,1是草稿,2是确认
	        'shippingFeeEstimate'  =>'11',     //运费
            'orderProduct'     => array(
                array(
                    'productSku'        => '2014120108',
                    'opQuantity'        => 2,
                    'dealPrice'         => 35.5,
                    'transactionPrice'  => 71,
                ),
              /*   array(
                    'productSku'        => '117100096',
                    'opQuantity'        => 2,
                    'dealPrice'         => 35.5,
                    'transactionPrice'  => 71,
                ), */
            ),
        );
	$wsdlurl = "http://moms.com/default/order-soap/";
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