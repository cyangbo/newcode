<?php 

namespace IMooc;

class MaleUserStrategy implements UserStrategy{
	
	function showAd(){
		echo "IPhone6";
	}
	function showCategory(){
		echo "电子产品";
	}
	
}