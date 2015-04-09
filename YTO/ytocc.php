<?php
$url = 'http://58.32.246.70:8002';
$app_key = "hE2Ib1";
$format = "json";
$method = "yto.Marketing.WaybillTrace";
$user_id = "xindaguoji";
$ver = "1.0";
$secret = "xlNKIg";
//$number = '200126913492';
$number = '2001269134';

$timestamp = date('Y-m-d H:i:s');
$param = '';
$param .= "[{'Number':".$number."}]";

//构造sign
$a = "app_key".$app_key."format".$format."method".$method."timestamp".$timestamp."user_id".$user_id."v".$ver;
$b = $secret.$a;
$sign = strtoupper(md5($b,false));
$a1 = "app_key=".$app_key."&format=".$format."&method=".$method."&timestamp=".$timestamp."&user_id=".$user_id."&v=".$ver;
$b1 = "sign=".$sign."&".$a1;
$sign1 = $b1."&param=".$param;

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
//$ytoarr = json_decode($tmpInfo);
//$yto = $tmpInfo;
//print_r($yto);

//echo $yto;
//echo "ssgg";
//foreach ($yto )

/*foreach ($yto as $row){
    print_r($row);

}*/
  
    $arr=json_decode($tmpInfo,true);//将第二个参数为true时将转化为数组  
    print_r($arr);  
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    echo "最后一个ProcessInfo:". $arr[7]["ProcessInfo"];
    
    foreach ($arr as $k=>$v){
        print_r($k);
        echo '<br/>';
        
        print_r($v);
        echo '<br/>';
        echo '<br/>';
    }

