/** jquery **/

$(document).ready(function(){

	//给body绑定监听,点击事件
	$("body").on("click",bodyHand);
	
	$("div").on("click",divHand);
	
	function bodyHand(event){
		console.log("body");
		
		//这样可以产生很多信息
		//console.log(event);
		conlog(event);
		
	}
	
	function divHand(event){
		//点击div内容,先显示div,再显示body
		console.log("div");
		
		//console.log(event);
		conlog(event);
		
		//事件阻止,这样divHand就不会产生作用了,灭掉click事件的冒泡。
		//event.stopPropagation();
	}
	
	//因为不是所有的浏览器都支持console.log();
	//所以这里使用一个方法来替代
	function conlog(event){
		
		//使用的时候是conlog(event);
		//如果在使用的时候出现浏览器不支持,就注释掉下面这一句就可以了,方便
		console.log(event);
		
	}
	
});
