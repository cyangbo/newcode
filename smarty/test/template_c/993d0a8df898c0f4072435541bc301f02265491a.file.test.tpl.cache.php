<?php /* Smarty version Smarty-3.1.18, created on 2014-10-07 15:28:51
         compiled from "tpl\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32565433d4a9d3ce96-01721427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '993d0a8df898c0f4072435541bc301f02265491a' => 
    array (
      0 => 'tpl\\test.tpl',
      1 => 1412695725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32565433d4a9d3ce96-01721427',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5433d4a9d73f17_89096957',
  'variables' => 
  array (
    'articletitle' => 0,
    'arr' => 0,
    'article' => 0,
    'timeee' => 0,
    'no_name' => 0,
    'url_escape' => 0,
    'low_up' => 0,
    'huanhang' => 0,
    'score' => 0,
    'art_section' => 0,
    'art_foreach' => 0,
    'objcc' => 0,
    'timecc' => 0,
    'strc' => 0,
    'timett' => 0,
    'str' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5433d4a9d73f17_89096957')) {function content_5433d4a9d73f17_89096957($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'D:\\wamp\\www\\smarty\\libs\\plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\wamp\\www\\smarty\\libs\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_function_test')) include 'D:\\wamp\\www\\smarty\\libs\\plugins\\function.test.php';
if (!is_callable('smarty_modifier_test')) include 'D:\\wamp\\www\\smarty\\libs\\plugins\\modifier.test.php';
if (!is_callable('smarty_block_replace')) include 'D:\\wamp\\www\\smarty\\libs\\plugins\\block.replace.php';
?><?php echo $_smarty_tpl->tpl_vars['articletitle']->value;?>
	<br/>
<?php echo $_smarty_tpl->tpl_vars['arr']->value['title'];?>
<br/>
<?php echo $_smarty_tpl->tpl_vars['arr']->value['title'];?>
<br/>
<?php echo $_smarty_tpl->tpl_vars['arr']->value['author'];?>
<br/>
<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['article']->value);?>
<br/>
<?php echo ($_smarty_tpl->tpl_vars['article']->value).(".yesterday").("第三个参数");?>
<br/>
<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['timeee']->value,"%A,%B,%e,%Y,%H:%M:%S");?>
<br/>
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['no_name']->value)===null||$tmp==='' ? "i am a default name" : $tmp);?>
<br/>
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr']->value['author'])===null||$tmp==='' ? "nonono" : $tmp);?>
<br/>
<?php echo rawurlencode($_smarty_tpl->tpl_vars['url_escape']->value);?>
<br/>
<?php echo mb_strtolower($_smarty_tpl->tpl_vars['low_up']->value, 'UTF-8');?>
<br/>
<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['low_up']->value, 'UTF-8');?>
<br/>
<?php echo nl2br($_smarty_tpl->tpl_vars['huanhang']->value);?>
<br/>
<?php echo $_smarty_tpl->tpl_vars['huanhang']->value;?>
<br/>
<?php if ($_smarty_tpl->tpl_vars['score']->value>90) {?>
优秀
<?php } elseif ($_smarty_tpl->tpl_vars['score']->value>60) {?>
及格
<?php } else { ?>
不及格
<?php }?><br/>

<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['article'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['article']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['name'] = 'article';
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['art_section']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['max'] = (int) 5;
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['article']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['article']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['article']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['article']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['article']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['article']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['article']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['article']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['article']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['article']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['article']['total']);
?>
	<?php echo $_smarty_tpl->tpl_vars['art_section']->value[$_smarty_tpl->getVariable('smarty')->value['section']['article']['index']]['title'];?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['art_section']->value[$_smarty_tpl->getVariable('smarty')->value['section']['article']['index']]['author'];?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['art_section']->value[$_smarty_tpl->getVariable('smarty')->value['section']['article']['index']]['content'];?>
<br />
	<br />
<?php endfor; endif; ?>

<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['art_foreach']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
	<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
<br />
<br />
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['art_foreach']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
	<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
<br />
<br />
<?php } ?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('sitename'=>"我是一个网站标题"), 0);?>

<br />
<?php echo $_smarty_tpl->tpl_vars['objcc']->value->meth1(array('苹果','ss'));?>
<br />

<?php echo date("Y-m-d",$_smarty_tpl->tpl_vars['timecc']->value);?>
<br />


<?php echo str_replace('d','h',$_smarty_tpl->tpl_vars['strc']->value);?>
<br />
<?php echo test(array('p1'=>'abc','p2'=>'edf'),$_smarty_tpl);?>
<br />


<?php echo smarty_function_test(array('width'=>150,'height'=>200),$_smarty_tpl);?>
<br />


<?php echo smarty_modifier_test($_smarty_tpl->tpl_vars['timett']->value,'Y-m-d H:i:s');?>
<br />


<?php $_smarty_tpl->smarty->_tag_stack[] = array('replace', array('replace'=>'true','maxnum'=>29)); $_block_repeat=true; echo smarty_block_replace(array('replace'=>'true','maxnum'=>29), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	<?php echo $_smarty_tpl->tpl_vars['str']->value;?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_replace(array('replace'=>'true','maxnum'=>29), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
