<?php /* Smarty version 2.6.26, created on 2009-11-25 02:35:50
         compiled from header.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type"content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="history" content="" />
<meta name="author" content="Chaim.Hong" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-latest.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>
<body>
<h1 class="top">通讯录管理系统</h1>
<div class="mainbox">
<ul class="nav">
	<li><a href="?">首页</a></li>
    <li><a href="?m=contacts&a=getlist">列表</a></li>
    <li><a href="?m=contacts&a=add">添加</a></li>
    <li><a href="javascript:void()" onclick="javascript:history.go(-1)">返回</a></li>
    <li style="clear:both"></li>
</ul>
</div>