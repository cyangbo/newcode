<?php /* Smarty version 2.6.26, created on 2009-11-24 05:48:41
         compiled from add.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('title' => "通讯录")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form id="addform1" name="form1" method="post" action="?m=contacts&a=add">
    <p>姓名：<input name="name" type="text" id="name" /></p>
　  <p class="sex">
　      性别：<input type="radio" name="sex" value="0" />女士<input type="radio" name="sex" value="1" />先生
　  </p>
　  <p>手机：<input name="mobi" type="text" id="mobi"/></p>
　  <p>邮箱：<input name="email" type="text" id="email" /></p>
　  <p>地址：<input name="addr" type="text" id="addr"　/></p>
　  <p>
　　    <input name="todo" type="hidden" value="saveadd"　/>
        <input type="submit" name="Submit" value="添加" />
　　　　<input type="reset" name="Submit2" value="重写" />
　  </p>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>