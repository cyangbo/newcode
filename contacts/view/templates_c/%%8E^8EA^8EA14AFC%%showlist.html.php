<?php /* Smarty version 2.6.26, created on 2009-11-24 10:12:17
         compiled from showlist.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('title' => "通讯录")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="mainbox">
    <form action="?m=contacts&a=getlist" method="post">
        搜索 <select name="stype" id="stype">
            <option selected="selected" value="id" >ID</option>
            <option value="name">姓名</option>
            <option value="email">邮箱</option>
        </select>
        <input name="skey" type="text" id="skey" />
        <select name="order">
            <option selected="selected" value="name,">姓名排序</option>
            <option value="sex,">性别排序</option>
            <option value="mobile,">手机号排序</option>
        </select>
        <input type="submit" value="提交搜索" />
    </form>
</div>
<div class="mainbox">
    <table id="myTable" class="tablesorter" cellspacing="1" cellpadding="0" border="0">
        <thead>
    　　    <tr>
                <th class="header">编号</th>　　　　　 　
                <th class="header">姓名</th>
    　　　　    <th class="header">性别</th>
    　　　　　  <th class="header">手机</th>
    　　　　　  <th class="header">邮箱</th>
    　　　　 　 <th class="header">地址</th>
                <td>操作</td>
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
            <tr>
                <td><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['id']; ?>
</td>　　　　 　 　
                <td><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['name']; ?>
</td>
    　　　 　 　<td><?php if ($this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
    　　　 　 　<td><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['mobile']; ?>
</td>
    　　　 　 　<td><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['email']; ?>
</td>
    　　　　 　 <td><?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['address']; ?>
</td>
                <td><a href="?m=contacts&a=edit&id=<?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['id']; ?>
">编辑</a>|<a href="?m=contacts&a=del&id=<?php echo $this->_tpl_vars['cts_list'][$this->_sections['cts_list']['index']]['id']; ?>
">删除</a></td>
    　　　　 </tr>
        <?php endfor; endif; ?>
        </tbody>
    </table>    
    <div id="pager" class="pager">
        <form>
            <img src="include/first.png" class="first"/>
            <img src="include/prev.png" class="prev"/>
            <input type="text" class="pagedisplay"/>
            <img src="include/next.png" class="next"/>
            <img src="include/last.png" class="last"/>
            <select class="pagesize">
                <option selected="selected"  value="3">3</option>
                <option value="5">5</option>
                <option value="7">7</option>
                <option  value="9">9</option>
            </select>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $("#myTable")
            .tablesorter({sortList: [[0,0]],widthFixed: true, widgets: ['zebra']})
            .tablesorterPager({container: $("#pager")});
    });
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>