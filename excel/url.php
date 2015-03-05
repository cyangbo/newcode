<?php

$cc = "http://s.click.taobao.com/t?e=m%3D2%26s%3D3kOaX%2FAAY%2FocQipKwQzePOeEDrYVVa64K7Vc7tFgwiFRAdhuF14FMUelG3vPAMofxq3IhSJN6GTdfN03pjxS8ehowOHwcBTtEM6tj1kgG%2B4xLSieR20hMOQoVEsow8zDKe66u3HlzztBug3u65UROL4DbZpQWckYZvKhU7sOB98%3D";

$nn = "http://s.click.taobao.com/t_js?tu=http%3A%2F%2Fs.click.taobao.com%2Ft%3Fe%3Dm%253D2%2526s%253D3kOaX%252FAAY%252FocQipKwQzePOeEDrYVVa64K7Vc7tFgwiFRAdhuF14FMUelG3vPAMofxq3IhSJN6GTdfN03pjxS8ehowOHwcBTtEM6tj1kgG%252B4xLSieR20hMOQoVEsow8zDKe66u3HlzztBug3u65UROL4DbZpQWckYZvKhU7sOB98%253D%26ref%3D%26et%3D5NrEDkUGwMJiMHYnpONDl4sVFIu%252FWryC";
$url = 'http://t.cn/h5mwx';
$headers = get_headers($nn, TRUE); 
print_r($headers);

//输出跳转到的网址
// $dd = $headers['Location'];
// echo $dd;
//$headers2 = get_headers($dd, TRUE); 
 
 
//echo $headers2['Location'];


?>