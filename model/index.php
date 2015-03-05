<?php 
/*
2015-1-25PHP
*/

//echo __DIR__;
//E:\wamp\www\mycode\model


/*
 * 
PSR-0规范:
1.命名空间必须与绝对路径一致
2.类名首字母必须大写
3.除入口文件,其他".php"必须只有一个类

开发符合PSR-0规范的基础框架:
1.全部使用命名空间
2.所有php文件必须自动载入,不能有include/require
3.单一入口
 */

//当前文件
define('BASEDIR', __DIR__);
//echo BASEDIR.'/IMooc/Loader.php';
//E:\wamp\www\mycode\model/IMooc/Loader.php
include BASEDIR.'/IMooc/Loader.php';
//加载E:\wamp\www\mycode\model/IMooc/Loader.php的autoload方法
//用来自动加载命名空间
spl_autoload_register('\\IMooc\\Loader::autoload');

//现在可以自动加载命名空间
//IMooc\Object::test();
//App\Controller\Home\Index::test();

/*
 * 四种常见的数据结构
 */

//栈的数据结构,先进后出
$stack = new SplStack();
$stack->push("data1\n");
$stack->push("data2\n");
echo $stack->pop();
echo $stack->pop();
//data2 data1 

//队列,先进先出
$queue = new SplQueue();
$queue->enqueue("qq1");
$queue->enqueue("qq2");
echo $queue->dequeue();
echo $queue->dequeue();
//qq1qq2

//堆,先进先出
$heap = new SplMinHeap();
$heap->insert("hhh1");
$heap->insert("hhh2");
echo $heap->extract();
echo $heap->extract();
//hhh1hhh2

//固定长度的数组,例如声明4,然后可以通过下标直接访问
$array = new SplFixedArray(4);
$array[0] = 123;
$array[3] = 555;
var_dump($array);
/*object(SplFixedArray)[4]
  public 0 => int 123
  public 1 => null
  public 2 => null
  public 3 => int 555*/

/*
 * PHP链式操作的实现
 * 假如有一个数据库类Database
 */
//$db = new IMooc\Database();
/*
 * 传统要写4行
 * $db->where("id=1");
$db->where("name=2");
$db->order("id desc");
$db->limit(10);*/
/*
 * 现在,在每个方法返回return $this;
 * 下面就可以链式操作
 */
//$db->where("id=1")->where("name=2")->order("id desc")->limit(10);




/*
 * 
PHP魔术方法的使用:
1.__get/__set		//用来对象属性的接管
2.__call/__callStatic		//控制php对象方法调用
3.__toString			//将php对象转换成字符串
4.__invoke		
 */
$obj = new IMooc\Object();

//访问不存在属性时,会抛出错误
//当定义了__get/__set方法后,对不存在属性的调用

//当对一个对象不存在属性进行赋值的时候,自动调用__set()方法
$obj->title = "hello";

//当读取一个对象不存在的属性的时候,自动调用__get()魔术方法
echo $obj->title;

//当调用一个方法不存在,会报错,__call可以用来容错
echo $obj->test("hellcc",133);
/*string 'test' (length=4)
array (size=2)
  0 => string 'hellcc' (length=6)
  1 => int 133
magic function*/


//当调用的静态方法不存在,__callstatic可以用来容错
echo IMooc\Object::test("helloo",1234);
/*string 'test' (length=4)
array (size=2)
  0 => string 'helloo' (length=6)
  1 => int 1234
magic static function*/

//当echo一个对象的时候,对象本身不能当成一个字符串
//对象要转换成字符串,就会去回调__toString
echo "</br>";
echo $obj;
//IMooc\Object


//如果把一个对象当成函数应用,自动回调__invoke()魔术方法
echo $obj("eess");
/*string 'eess' (length=4)
invoke
*/


/*
 * 
 * 3中基本设计模式
 * 1.工厂模式:工厂方法或者类生成对象,而不是在代码中直接new
 * 2.单例模式:使某个类的对象仅允许创建一个
 * 3.注册模式:全局共享和交换对象
 * 
 */

/*
 * 工厂模式
 */
//不用工厂模式的话,直接new
//$db = new IMooc\Database();
//上面要修改Database()要修改很多地方,用了工厂模式,只要在工厂createDatabase();方法中修改就好
//$db = IMooc\Factory::createDatabase();


/*
 * 单例模式:
 * 
 */
$db = new SplFixedArray(10);
//$db = new IMooc\Database();

//这里用了单例模式,无论创建多少次,只会创建一次链接(具体看getInstance方法)
//$db = IMooc\Database::getInstance();
//$db = IMooc\Database::getInstance();

/*
 * 注册器模式:
 * 用来将一些对象注册到全局的树上面,然后就可以被任何地方直接访问
 * Register.php
 * 在Factory.php文件中
 * Register::set('db1', $db);
 * 这样就可以注册(一般环境初始化就可以做),在业务中就可以把注册的get('db1');读取出来就可以
 */
$db = \IMooc\Register::get('db1');







