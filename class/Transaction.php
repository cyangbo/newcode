 
<?php
/*PHP简单的事务测试用例
php-mysql 事务测试
mysql> show engines;
+--------------------+---------+----------------------------------------------------------------+--------------+------+------------+
| Engine             | Support | Comment                                                        | Transactions | XA   | Savepoints |
+--------------------+---------+----------------------------------------------------------------+--------------+------+------------+
| FEDERATED          | NO      | Federated MySQL storage engine                                 | NULL         | NULL | NULL       |
| MRG_MYISAM         | YES     | Collection of identical MyISAM tables                          | NO           | NO   | NO         |
| MyISAM             | YES     | MyISAM storage engine                                          | NO           | NO   | NO         |
| BLACKHOLE          | YES     | /dev/null storage engine (anything you write to it disappears) | NO           | NO   | NO         |
| CSV                | YES     | CSV storage engine                                             | NO           | NO   | NO         |
| MEMORY             | YES     | Hash based, stored in memory, useful for temporary tables      | NO           | NO   | NO         |
| ARCHIVE            | YES     | Archive storage engine                                         | NO           | NO   | NO         |
| InnoDB             | DEFAULT | Supports transactions, row-level locking, and foreign keys     | YES          | YES  | YES        |
| PERFORMANCE_SCHEMA | YES     | Performance Schema                                             | NO           | NO   | NO         |
+--------------------+---------+----------------------------------------------------------------+--------------+------+------------+
// schemal
create table transaction_tbl (
    name char(10) not null
) engine=innodb;
  
*/
  
class Transaction 
{
    // 判断插入查询是否成功
    private $error = 0;
      
    // 连接资源
    private $conn_id = null;
      
    public function __construct()
    {
        $this->connect();
    }
      
    public function test()
    {
        echo "BEGIN TEST\\n";
  
        //开始事务
        $this->beginTransaction();
        // 插入测试数据
        // name 的大小限制为10
        $str1 = str_repeat("a", mt_rand(1, 13));
        $str2 = str_repeat("b", mt_rand(1, 13));
  
        $this->query("INSERT INTO `transaction_tbl` (`name`) VALUES ('$str1')");
        $this->query("INSERT INTO `transaction_tbl` (`name`) VALUES ('$str2')");         
          
        //提交查询
        if ($this->error == 0)
        {
            $this->commit();
        }
        else
        {
            $this->rollback();
        }
          
        echo "END TEST\\n";
    }
      
    private function query($sql)
    {
        echo $sql."\\n";
        (mysql_query($sql, $this->conn_id) == FALSE) && ++$this->error;
    }
      
    // 开始事务
    private function beginTransaction()
    {
        mysql_query("BEGIN", $this->conn_id);
    }
    //回滚
    private function rollback()
    {
        echo "ROLLBACK\\n";
        mysql_query("ROLLBACK", $this->conn_id); 
    }
    //提交
    private function commit()
    {
        echo "save done\\n";
        mysql_query("COMMIT", $this->conn_id);
    }
      
    // 连接数据库
    private function connect()
    {
        $this->conn_id = @mysql_connect("127.0.0.1", "root", "") or die("can\\'t connect: ". mysql_error());
        mysql_select_db("test", $this->conn_id) or die("can\\'t use test: ". mysql_error());
    }
    // 关闭数据
    private function close()
    {
        mysql_close($this->conn_id);
    }   
      
    public function __destruct()
    {
        $this->close();
    }       
}
  
$trans = new Transaction();
$trans->test();
//该片段来自于http://www.codesnippet.cn/detail/0605201512496.html