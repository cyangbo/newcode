<?php

//获得要跳转的网址，进行下一步操作
function curl_post_302($url, $data = null) {
	$ch = curl_init ();
	//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	//需要获取的URL地址，也可以在curl_init()函数中设置。
	curl_setopt ( $ch, CURLOPT_URL, $url );
	//在发起连接前等待的时间，如果设置为0，则无限等待。
	//curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 30 );
	//设置cURL允许执行的最长秒数。
	//curl_setopt ( $ch, CURLOPT_TIMEOUT, 30 );
	//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。 
	
	//curl_setopt ( $ch, CURLOPT_POST, 1 );
	
	//curl_setopt ( $ch, CURLOPT_POSTFIELDS, $vars );
	//启用时会将服务器服务器返回的"Location: "放在header中递归的返回给服务器，使用CURLOPT_MAXREDIRS可以限定递归返回的数量。 
	curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION,100); // 获取转向后的内容             
	$data = curl_exec ( $ch );
	
	$Headers = curl_getinfo ( $ch );
	//print_r($Headers);
	curl_close ( $ch );
	if ($data != $Headers) {
		//return $Headers ["url"];
		return print_r($Headers);
	} else {
		return false;
	}
}
//$url = "http://s.click.taobao.com/t?e=m%3D2%26s%3D3kOaX%2FAAY%2FocQipKwQzePOeEDrYVVa64K7Vc7tFgwiFRAdhuF14FMUelG3vPAMofxq3IhSJN6GTdfN03pjxS8ehowOHwcBTtEM6tj1kgG%2B4xLSieR20hMOQoVEsow8zDKe66u3HlzztBug3u65UROL4DbZpQWckYZvKhU7sOB98%3D";
$url  = "http://s.click.taobao.com/t_js?tu=http%3A%2F%2Fs.click.taobao.com%2Ft%3Fe%3Dm%253D2%2526s%253D3kOaX%252FAAY%252FocQipKwQzePOeEDrYVVa64K7Vc7tFgwiFRAdhuF14FMUelG3vPAMofxq3IhSJN6GTdfN03pjxS8ehowOHwcBTtEM6tj1kgG%252B4xLSieR20hMOQoVEsow8zDKe66u3HlzztBug3u65UROL4DbZpQWckYZvKhU7sOB98%253D%26ref%3D%26et%3D5NrEDkUGwMJiMHYnpONDl4sVFIu%252FWryC";
echo curl_post_302($url); //得到要跳转的地址
?>