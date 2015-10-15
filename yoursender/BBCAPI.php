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
 
/**
 * 24服务器,testimport数据库
 */
function createOrderAction(){
    $HeaderRequest['customerCode'] = 'C0089';
	/* $HeaderRequest['appToken'] = '773D02ABC262F84F';
	$HeaderRequest['appKey'] = '4b35ace154e18a8e7b05d62e2de43591';	 */
    
    $HeaderRequest['appToken'] = '7A5A184F5F4A1267';
    $HeaderRequest['appKey'] = '06cfc680df36a1cd66ae68be29480160';
	
	$paragram['HeaderRequest']= $HeaderRequest;
	
	$paragram['OrderInfo'] = array(
            'orderModel'        => 0,                   //订单模型:备货模式为0,集货模式为1
	        'warehouseCode'     => 'GZBYWLCK',          //交货仓库
	        'toWarehouseCode'   => 'GZBYWLCK',         //目的仓库
            'smCode'            => 'YTO',               //快递代码
            'oabCounty'         => 'CN',            //收件人国家,2位英文大写的代码
            'oabStateName'      => '广东省',            //收件人省份
            'oabCity'           => '深圳',            //收件人城市
	        'oabDistrict'           => '福田区',      //收件人区或者县
            'oabPostcode'       => '700123',
            'oabStreetAddress1' => '测试数据地址1111',       //具体地址(不用包括省市区)
            'oabName'           => '天天',               //收件人姓名
            'idType'            => '身份证',               //收件人证件类型
            'idNumber'          => '445102199001212335',        //收件人证件号
            'oabPhone'          => '13888888889',           //收件人手机
            'oabEmail'          => 'test@ningxia.com',      //收件人邮箱
            'referenceNo'       => 'abcccssesu223ees',            //交易订单号
            'trackingNumber'    => '9898000066',     
            'grossWt'           => 40,              //毛重
            'currencyCode'      => 'RMB',
	        'remark'           => '这个是API订单的备注哦',
	        'orderStatus'      =>'4',              //订单状态,4是已提交,1是草稿,2是确认
	        'shippingFeeEstimate'  =>'11',     //运费
	        'shipperPhone'		=>  '233233233',
			'shipperAddress'	=>	'地址cccccccccccccccc',
            'orderProduct'     => array(
              array(
                    'productSku'        => 'testcccc',          //产品SKU
                    'opQuantity'        => 1,                   //产品数量
                    'dealPrice'         => 35.5,                //产品价格
                    'transactionPrice'  => 71,                  //成交总价
                ),  
                 array(
                    'productSku'        => 'ponytest2',
                    'opQuantity'        => 2,
                    'dealPrice'         => 35.5,
                    'transactionPrice'  => 71,
                ),  
            ),
        );
	$wsdlurl = "http://yoms.com/default/order-soap";
	//$wsdlurl = 'http://test-import.ehaiwaigou.cn/default/order-soap';
	// $paragram['createExchangeOrderInfo'] = $array;
	$soap = new SoapClient($wsdlurl,array( 'trace' => 1 ));
	$stock = $soap->createOrder($paragram);
	//header( 'Content-Type:textml;charset=utf-8 ');
	//echo "<pre />";print_r($stock);
    echo ($soap->__getLastResponse());
    echo ($soap->__getLastRequest());
 }
 
 //createOrderAction();
 //print_r("ssee");
 
 function getTrackingAction($smCode,$trackingNumber){
 	/* $HeaderRequest['customerCode'] = 'C0089';
 	$HeaderRequest['appToken'] = '7A5A184F5F4A1267';
 	$HeaderRequest['appKey'] = '06cfc680df36a1cd66ae68be29480160'; */
 	
 	/* $HeaderRequest['customerCode'] = 'C0134';
 	$HeaderRequest['appToken'] = 'DED9C5BB8546F2A5';
 	$HeaderRequest['appKey'] = 'df803a5d30f6af2b5101af9225a82aac'; */
 	
 	$HeaderRequest['customerCode'] = 'C0089';
 	$HeaderRequest['appToken'] = '0D78CF2A0D17C4CE';
 	$HeaderRequest['appKey'] = 'bb7eff27a70c33c619471e3e288f3cac';
 	
 	$paragram['HeaderRequest']= $HeaderRequest;
 	
 	 /* $smCode = 'ZTO';
 	$trackingNumber = '359395405926';		//中通  */
 	
 	/* $smCode = 'YTO';
 	$trackingNumber = '803268674512';		//圆通   */
 	
 	/* $smCode = 'CNEXP';
 	$trackingNumber = '9974406213502';		//邮政 */
 	
 	/* $smCode = 'SM';
 	$trackingNumber = '8001690541';		//思迈 */
 	
 $smCode = 'SF';
 	$trackingNumber = '444029867505';		//思迈 
 	
 	
 	
 	
 	
 	$paragram['smCode'] = $smCode;
 	$paragram['trackingNumber'] = $trackingNumber;
 	
 	//$wsdlurl = "http://yoms.com/default/order-soap";
 	$wsdlurl = "http://import.ehaiwaigou.cn/default/order-soap";
 	//http://import.ehaiwaigou.cn/default/order-soap/web-service
 	$soap = new SoapClient($wsdlurl,array( 'trace' => 1 ));
 	$stock = $soap->getTracking($paragram);
 	
 	
 	//print_r("ppp".$stock."qqq");
 	echo ($soap->__getLastResponse());
 	//var_dump ( $soap->__getFunctions () );//获取服务器上提供的方法
 	//var_dump ( $soap->__getTypes () );
 	//echo ($soap->__getLastRequest());
 	
 	
 }
 
 //getTrackingAction('yyyyy','ss');
 
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

 
 /**
  * 正式环境中,境外淘订单更新测试
  */
 function updateOrderTestAction(){
 	$HeaderRequest['customerCode'] = 'C0166';
 	$HeaderRequest['appToken'] = '48A9723502C2C089';
 	$HeaderRequest['appKey'] = '28739c8b4395c27f997b61617cbb8faa';
 
 	$paragram['HeaderRequest']= $HeaderRequest;
 
 	$paragram['OrderInfo'] = array(
 			'orderCode'         => 'SOC01660002594',
 			'orderModel'        => 0,
 			'warehouseCode'     => 'GZBYWLCK',          //交货仓库
 			'toWarehouseCode'   => 'GZBYWLCK',         //目的仓库
 			'smCode'            => 'SM',
 			'oabCounty'         => 'CN',
 			'oabStateName'      => '河南',
 			'oabCity'           => '郑州市',
 			'oabDistrict'           => '中原区',
 			//'oabPostcode'       => '750001',
 			'oabStreetAddress1' => '河南省郑州市中原区郑州市西环路与028公路交叉口东南角郑州水工质量检测中心',
 			'oabName'           => '刘建春',
 			'idType'            => '1',
 			'idNumber'          => '220104197901174133',
 			'oabPhone'          => '13937533789',
 			//'oabEmail'          => 'test@ningxia.com',
 			'referenceNo'       => '15101013152210',
 			'grossWt'           => 3.200,
 			'currencyCode'      => 'RMB',
 			//'orderStatus'      =>'1',              //订单状态,4是已提交,1是草稿,2是确认
 			'shippingFeeEstimate'  =>0,     //运费
 			'orderProduct'     => array(
 					array(
 							'productSku'        => 'J4008976022336',
 							'opQuantity'        => 4,
 							'dealPrice'         => 124,
 							'transactionPrice'  => 496,
 					),
 					/*   array(
 					 'productSku'        => '117100096',
 							'opQuantity'        => 2,
 							'dealPrice'         => 35.5,
 							'transactionPrice'  => 71,
 					), */
 			),
 	);
 	$wsdlurl = "http://import.ehaiwaigou.cn/default/order-soap/";
 	// $paragram['createExchangeOrderInfo'] = $array;
 	$soap = new SoapClient($wsdlurl,array( 'trace' => 1 ));
 	$stock = $soap->updateOrder($paragram);
 	header( 'Content-Type:textml;charset=utf-8 ');
 	//echo "<pre />";print_r($stock);
 	echo ($soap->__getLastResponse());
 	echo ($soap->__getLastRequest());
 }
updateOrderTestAction();
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