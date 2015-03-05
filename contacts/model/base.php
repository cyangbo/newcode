<?php

/*+-------------------------------------------------------------------------------------------+
  base.php

  +-------------------------------------------------------------------------------------------+
*/

class base
{
    var $time;
    var $onlineip;
    var $db;
    var $view;
    var $user = array();
    var $settings = array();
    var $cache = array();
    var $app = array();
    var $lang = array();
    var $input = array();

    
    function __construct()
    {
        $this->base();
    }

    function base()
    {
        $this->init_db();
        $this->init_template();
    }

    function init_db()
    {   
        require_once TEST_ROOT.'lib/db.class.php';
        
        $this->db = new db();
        $this->db->connect(TEST_DBHOST, TEST_DBUSER, TEST_DBPW, TEST_DBNAME, TEST_DBCHARSET, TEST_DBCONNECT, TEST_DBTABLEPRE);
    }

    function init_template()
    {
        require_once TEST_ROOT.'lib/Smarty.class.php';
        $this->view = new Smarty();
        $this->view->template_dir = TEST_ROOT. "view/";
        $this->view->cache_dir = TEST_ROOT."view/cache_tpl/";
        $this->view->compile_dir = TEST_ROOT."view/templates_c/";
        $this->view->left_delimiter = '<{';
        $this->view->right_delimiter = '}>';
    }

    function load($model, $base = NULL, $release = '')
    {       
        $base = $base ? $base : $this;
        if(empty($_ENV[$model])) {
            require_once TEST_ROOT."model/$model.php";
            eval('$_ENV[$model] = new '.$model.'($base);');
        }
        return $_ENV[$model];
    }
}
?>