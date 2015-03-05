
collecta.php实现下面3个功能
 /*
  * 单一功能
  * 用来采集url中所有单个商品的代码,保存在t.txt中,
  */
  
/*
 * 读取一个页面的源码,如果一行是以[开头的,那么就拿到,其他行去掉,保存在文件tt.txt中
 * 
 */  
 
 /**
 * 读取tt.txt文件
 * 得到数据,处理成sql语句的样子,保存在t.txt中
 */
 
 
 
 collectb.php文件实现:
 /*
 * 把collecta.php文件实现的3个功能封装成一个函数,传入2个数据
 */
		
collectcc.php对collectb.php实现可视化	,可以传入2个参数


test.php
/**
 * 读取:leimu中的zhe800.txt
 * 逐行读取
 * 每一行url采集,存放到zhe800文件夹,文件名按照每个url后面的数字存放成txt
 * 调用collectbb.php文件
 */
 //后期可以把这个if判断放到collectbb.php,然后把_zhe800(),_zhe800a()两个方法合成一个方法.
 //按照文件名字filename来保存文件到zhe800文件夹中去
 
 
 总结:
 上面test.php实现了采集功能
 
insert.php
实现:把zhe800文件夹中的文件内容,全部按照sql语句插入到数据库中

select.php
实现:把数据库中的内容取出来
把商品链接url存放在updatea.txt
把商品id存放在updateb.txt


把updatea.txt放到转化中去转换成淘客链接,保存成updatec.txt

update.php
实现:按照id把updatec.txt里面的淘客链接,按照updateb.txt的id更新淘客链接



	