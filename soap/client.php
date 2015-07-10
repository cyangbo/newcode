<?php

/**
 * 
 * SOAP CLIENT v.0.1
 * 
 * @file
 * Provides an example PHP SOAP client
 * 
 * 
 */

try{
	

	$client = new SoapClient("simple.wsdl");
	//echo "sss";
	$response = array();
	
	$response['helloResponse'] = $client->getHello();
	echo "sss";
	$response['goodbyeResponse'] = $client->getGoodbye();
	
	print "<pre>";
		//print_r($response);
	print "</pre>";
	
} catch(SoapFault $e){
	
	//var_dump($e);
echo "tt";
}

?>


