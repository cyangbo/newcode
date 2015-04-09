<?php

/**
 * 功能说明:
 * 从数据库表order_address_book中获取数据:省/市/区,传入xml作为参数
 * post提交到圆通url
 * 得到回调的目的地号码
 *      如果是获取不到,处理错误
 *      如果获取到了,写入数据库order_address_book
 */

//圆通提供的api-key
$url = 'http://58.32.246.70:8002';
$app_key = "hE2Ib1";
//$format = "XML";
$format = "json";

$method = "yto.Marketing.WaybillTrace";

$user_id = "xindaguoji";
$ver = "1.0";
$secret = "xlNKIg"; 

$number = '200126913492';

        $timestamp = date('Y-m-d H:i:s');
/*         $param = '';
        $param .= "<?xml version=\"1.0\"?>";
        $param .= "<ufinterface>";
        $param .= "<Result>";
        $param .= "<WaybillCode>";
        $param .= "<Number>".$number."</Number>";
        $param .= "</WaybillCode>";
        $param .= "</Result>";
        $param .= "</ufinterface>"; */
        
        $param = '';
        $param .= "[{'Number':".$number."}]";
       
        
        //构造sign
        $a = "app_key".$app_key."format".$format."method".$method."timestamp".$timestamp."user_id".$user_id."v".$ver;
        $b = $secret.$a;
        $sign = strtoupper(md5($b,false));
        $a1 = "app_key=".$app_key."&format=".$format."&method=".$method."&timestamp=".$timestamp."&user_id=".$user_id."&v=".$ver;
        $b1 = "sign=".$sign."&".$a1;
        $sign1 = $b1."&param=".$param;
        
        //print_r($sign1);
        //echo "\t\n";
        
        //发送post请求
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1 );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $sign1);
        
        //获取回调信息
        $tmpInfo = curl_exec($curl);
        curl_close($curl);
        unset($timestamp);
        unset($param);
        
        //print_r($tmpInfo);
        
       // $respondData	= simplexml_load_string($tmpInfo);
     //  $transferCenterCode = strval($respondData->TransferCenterCode);     //圆通回调的目的地号
       
        //print_r($v['order_code']);
        //print_r($respondData);
        
        $yto = json_decode($tmpInfo);
        print_r($yto);


echo "[" . date('Y-m-d H:i:s') . "] End run\r\n";





