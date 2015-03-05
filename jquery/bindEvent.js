/** jquery **/

$(document).ready(function(){
	
	//这种非常消耗内存
/*	$("#bindme").click(function(){
		alert("hello");
	});*/
	
	//选择id是bindme的元素,绑定事件,当事件是click的时候,绑定到自定义的clickHandler1
	$("#bindme").bind("click",clickHandler1);
	//当绑定了两个之后,可以同时触发
	$("#bindme").bind("click",clickHandler2);
	
	//解除绑定unbind,解除了clickHandler2的绑定,就没有输出console.log("点击了22");,只输入第一个
	//如果是$("#bindme").unbind("click");	那么什么都不会输出
	$("#bindme").unbind("click",clickHandler2);
	
	//在jquery1.7之后的版本,可以用on,off替换bind和unbind
	//$("#bindme").on("click",clickHandler1);
	function clickHandler1(e){
		console.log("点击了");
	}
	
	function clickHandler2(e){
		console.log("点击了22");
		
	}
	
	
});
