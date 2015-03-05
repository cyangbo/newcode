<?php /* Smarty version 2.6.26, created on 2009-11-24 08:53:01
         compiled from showlist_phppager.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('title' => "通讯录")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="mainbox">
    <form action="?m=contacts&a=getlist" method="post">
        搜索 <select name="stype" id="stype">
            <option value="id" <?php if ($this->_tpl_vars['stype'] == 'id'): ?>selected="selected"<?php endif; ?>>ID</option>
            <option value="name" <?php if ($this->_tpl_vars['stype'] == 'name'): ?>selected="selected"<?php endif; ?>>姓名</option>
            <option value="email" <?php if ($this->_tpl_vars['stype'] == 'email'): ?>selected="selected"<?php endif; ?>>邮箱</option>
        </select>
        <input name="skey" type="text" id="skey" value="<?php echo $this->_tpl_vars['skey']; ?>
" />
        <input type="submit" value="提交搜索" />
    </form>
</div>
<table id="myTable" class="tablesorter" cellspacing="1" cellpadding="0" border="0">
    <thead>
        <tr>
            <th id="id" class="header" width="60">编号</th>
            <th id="name" class="header" width="90">姓名</th>
            <th id="sex" class="header" width="60">性别</th>
            <th id="mobile" class="header" width="90">手机</th>
            <th id="email" class="header" width="180">邮箱</th>
            <th id="address" class="header">地址</th>
            <td width="100" class="acenter">操作</td>
        </tr>
    </thead>
    <tbody>
    <?php unset($this->_sections['cts_list']);
$this->_sections['cts_list']['name'] = 'cts_list';
$this->_sections['cts_list']['loop'] = is_array($_loop=$this->_tpl_vars['cts_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cts_list']['show'] = true;
$this->_sections['cts_list']['max'] = $this->_sections['cts_list']['loop'];
$this->_sections['cts_list']['step'] = 1;
$this->_sections['cts_list']['start'] = $this->_sections['cts_list']['step'] > 0 ? 0 : $this->_sections['cts_list']['loop']-1;
if ($this->_sections['cts_list']['show']) {
    $this->_sections['cts_list']['total'] = $this->_sections['cts_list']['loop'];
    if ($this->_sections['cts_list']['total'] == 0)
        $this->_sections['cts_list']['show'] = false;
} else
    $this->_sections['cts_list']['total'] = 0;
if ($this->_sections['cts_list']['show']):

            for ($this->_sections['cts_list']['index'] = $this->_sections['cts_list']['start'], $this->_sections['cts_list']['iteration'] = 1;
                 $this->_sections['cts_list']['iteration'] <= $this->_sections['cts_list']['total'];
                 $this->_sections['cts_list']['index'] += $this->_sections['cts_list']['step'], $this->_sections['cts_list']['iteration']++):
$this->_sections['cts_list']['rownum'] = $this->_sections['cts_list']['iteration'];
$this->_sections['cts_list']['index_prev'] = $this->_sections['cts_list']['index'] - $this->_sections['cts_list']['step'];
$this->_sections['cts_list']['index_next'] = $this->_sections['cts_list']['index'] + $this->_sections['cts_list']['step'];
$this->_sections['cts_list']['first']      = ($this->_sections['cts_list']['iteration'] == 1);
$this->_sections['cts_list']['last']       = ($this->_sections['cts_list']['iteration'] == $this->_sections['cts_list']['total']);
?>
        <tr class="<?php if ((1 & $this->_sections['cts_list']['index'])): ?>odd<?php endif; ?>">
            <td class="acenter"><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['id']; ?>
</td>
            <td><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['name']; ?>
</td>
            <td class="acenter"><?php if ($this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
            <td><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['mobile']; ?>
</td>
            <td><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['email']; ?>
</td>
            <td><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['address']; ?>
</td>
            <td class="acenter"><a href="?m=contacts&a=edit&id=<?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['id']; ?>
">编辑</a>&nbsp;|&nbsp;<a href="javascript:void()" onclick="javascript:del(<?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['id']; ?>
)" >删除</a></td>
        </tr>
    <?php endfor; endif; ?>
    </tbody>
</table>
<script type="text/javascript">
    $("#<?php echo $this->_tpl_vars['stype']; ?>
").removeClass("desc","asc");
    $("#<?php echo $this->_tpl_vars['ordobj']; ?>
").addClass("<?php echo $this->_tpl_vars['ordtype']; ?>
");
    $(function() {
        $("#myTable .header").bind(
                                    "click", function()
                                            {
                                                var ordobj = $(this).attr("id");
                                                var ordtype = $(this).attr("class");
                                                var url="?m=contacts&a=getlist&stype=<?php echo $this->_tpl_vars['stype']; ?>
&skey=<?php echo $this->_tpl_vars['skey']; ?>
&ordobj="+ordobj;
                                                if (ordtype.indexOf("asc") >= 0)
                                                {
                                                    location.href=url+"&ordtype=desc";
                                                }
                                                else
                                                {
                                                    location.href=url+"&ordtype=asc";
                                                }
                                            }
                                    );
    });
    function del(id)
    {
        if(confirm("确认删除?")){location.href="?m=contacts&a=del&id="+id;}
    }
</script>
    <div class="pager mainbox">记录总数:<?php echo $this->_tpl_vars['pager_Total']; ?>
&nbsp;&nbsp;  <?php echo $this->_tpl_vars['pager_PageID']; ?>
/<?php echo $this->_tpl_vars['pager_Number']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['pager_Links']; ?>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>