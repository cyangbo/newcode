<?php

//print_r(header("location: http://s.click.taobao.com/t?e=m%3D2%26s%3D3kOaX%2FAAY%2FocQipKwQzePOeEDrYVVa64K7Vc7tFgwiFRAdhuF14FMUelG3vPAMofxq3IhSJN6GTdfN03pjxS8ehowOHwcBTtEM6tj1kgG%2B4xLSieR20hMOQoVEsow8zDKe66u3HlzztBug3u65UROL4DbZpQWckYZvKhU7sOB98%3D"));

$cc = "http://s.click.taobao.com/t?e=m%3D2%26s%3D3kOaX%2FAAY%2FocQipKwQzePOeEDrYVVa64K7Vc7tFgwiFRAdhuF14FMUelG3vPAMofxq3IhSJN6GTdfN03pjxS8ehowOHwcBTtEM6tj1kgG%2B4xLSieR20hMOQoVEsow8zDKe66u3HlzztBug3u65UROL4DbZpQWckYZvKhU7sOB98%3D";

     //初始化
     $curl = curl_init("http://s.click.taobao.com/t?e=m%3D2%26s%3D3kOaX%2FAAY%2FocQipKwQzePOeEDrYVVa64K7Vc7tFgwiFRAdhuF14FMUelG3vPAMofxq3IhSJN6GTdfN03pjxS8ehowOHwcBTtEM6tj1kgG%2B4xLSieR20hMOQoVEsow8zDKe66u3HlzztBug3u65UROL4DbZpQWckYZvKhU7sOB98%3D");
     //执行
     curl_exec($curl);
     //关闭
     curl_close($curl);


?>