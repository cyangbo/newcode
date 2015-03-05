<?php /* Smarty version 2.6.26, created on 2009-11-24 06:21:17
         compiled from edit.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('title' => "通讯录")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form id="addform1" name="form1" method="post" action="?m=contacts&a=edit">
    <p>姓名：<input name="name" type="text" id="name" value="<?php echo $this->_tpl_vars['cts']['name']; ?>
" /></p>
    <p class="sex">性别：
        <input type="radio" name="sex" value="0" checked="checked" />女士
        <input type="radio" name="sex" value="1" <?php if ($this->_tpl_vars['cts']['sex'] == 1): ?> checked="checked" <?php endif; ?> />先生
    </p>
    <p>手机：<input name="mobi" type="text" id="mobi" value="<?php echo $this->_tpl_vars['cts']['mobile']; ?>
"　/></p>
    <p>邮箱：<input name="email" type="text" id="email" value="<?php echo $this->_tpl_vars['cts']['email']; ?>
"  /></p>
    <p>地址：<input name="addr" type="text" id="addr" value="<?php echo $this->_tpl_vars['cts']['address']; ?>
" /></p>
    <p>
        <input type="hidden" name="todo" value="saveedit" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['cts']['id']; ?>
" />
        <input type="submit" name="Submit" value="修改" />
    　　<input type="reset" name="Submit2" value="重写" />
    </p>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>