
/** jquery **/

$(document).ready(function(){
	
	//文档加载后就自动弹出对话框
	//alert("文档加载后弹出了这个");
	
	//
	$("p").click(function(){
		//用this来指引,点击哪一个p元素就隐藏哪一个
		$(this).hide();
	})
	
});