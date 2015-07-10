<?php 
/**
 * 邮政快递物流轨迹跟踪demo
 * 
 */
header("Content-Type: text/html;charset=utf-8");
//require_once ("lib/nusoap.php");

$url = 'http://211.156.220.124:7700/ECWS/xfire/services/MailTtService?wsdl';      //测试url          								//接口方法9974406213502
$object = array('in0'=>'1','in1'=>'1','in2'=>'9974406213502');
$client = new SoapClient($url);

var_dump($client->__getFunctions ());
var_dump ( $client->__getTypes () );

$result = $client->getMails($object);
//var_dump ($result);
print_r($result);

/* $client = new nusoap_client('http://211.156.220.124:7700/ECWS/xfire/services/MailTtService?wsdl','wsdl');
$client->soap_defencoding = 'utf-8';
$client->decode_utf8 = false;
$client->xml_encoding = 'utf-8'; 
//print_r($client);
$func= 'getMails';
$result = $client->call($func, $object); */



//$result = $client->getMails($func, $object);

//print_r($result);
//var_dump($client->__getFunctions ());
//var_dump ( $client->__getTypes () );



//cnexp::trace($url,$object,$func);
class cnexp{
    /**
     * 快件追踪接口 (mail.trace)
     * 
     * @param unknown $order_code   订单号
     * @param unknown $url          测试url
     * @param unknown $style        参数类型
     * @param unknown $partner      测试用户名
     * @param unknown $pass         测试密码
     * @param unknown $datetime     当前时间
     * @param string $func          接口方法
     */
    public static function trace($url,$object,$func){
    	
    	print_r('ccccc');
    	
    	$soap = new SoapClient($url);
    	$method = $func;
    	$params[] = array('In0'=>'0','In1'=>'1','In1'=>'9974406213502');
    	try{
    		$result = $soap->$method($params);
    		print_r($result);
    	}catch(Exception $e) {
    		echo "Exception: " . $e->getMessage();
    	}
        /* $contentDetail = '{ "mailno":"'.$order_code.'" }';
        //print_r($contentDetail);
        $content = base64_encode($contentDetail);                           //编码好的内容        
        $verify = md5($partner.$datetime.$content.$pass);                   //加密     
        //发送的url
        $post = $url."style=".urlencode($style)."&func=".urlencode($func)."&partner=".urlencode($partner)."&datetime=".urlencode($datetime)."&content=".urlencode($content)."&verify=".urlencode($verify); 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        curl_close($curl);
        $respondData = json_decode($data);      //转换成数组的返回值
        //print_r($respondData);
        return $respondData; */
    }
    
    //快件状态查询 (mail.status)
    public function status($order_code,$url,$style,$partner,$pass,$datetime,$func = "mail.status"){
        $contentDetail = '{ "mailno":"'.$order_code.'" }';
        //print_r($contentDetail);
        $content = base64_encode($contentDetail);                           //编码好的内容
        $verify = md5($partner.$datetime.$content.$pass);                   //加密
        //发送的url
        $post = $url."style=".urlencode($style)."&func=".urlencode($func)."&partner=".urlencode($partner)."&datetime=".urlencode($datetime)."&content=".urlencode($content)."&verify=".urlencode($verify);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        curl_close($curl);
        $respondData = json_decode($data);      //转换成数组的返回值
        //print_r($respondData);
        return $respondData;
    }
}