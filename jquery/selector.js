/** jquery **/

$(document).ready(function(){
	
  //通过bottun元素改变p元素
	$("button").click(function(){
		//直接指定p元素进行修改
		//$("p").text("p元素被修改了");
		
		//修改id是p的元素
		$("#p1").text("修改id是p的元素");
	})
	
	
	
});
