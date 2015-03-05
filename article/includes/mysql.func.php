<?php


//把常用的功能代码写入函数库，以后直接调用即可。
//码有一个全局变量，用途是函数里创建，函数外也能访问。保证了资源句柄的可访问性。
function _connect() {
	//global 表示全局变量的意思，意图是将此变量在函数外部也能访问
	global $_conn;
	if (!$_conn = @mysql_connect(DB_HOST,DB_USER,DB_PWD)) {
		exit('数据库连接失败');
	}
}

/**
 * _select_db选择一款数据库
 * @return void
 */

function _select_db() {
	if (!mysql_select_db(DB_NAME)) {
		exit('找不到指定的数据库');
	}
}

function _set_names() {
	if (!mysql_query('SET NAMES UTF8')) {
		exit('字符集错误');
	}
}

/**
 * 
 * @param $_sql
 */
// mysql_query发送一条 MySQL 查询
function _query($_sql) {
	if (!$_result = mysql_query($_sql)) {
		exit('SQL执行失败');
	}
	return $_result;
}

/**
 * 
 * @param $_sql
 */
//array mysql_fetch_array ( resource $result [, int $ result_type ] )
//从结果集中取得一行作为关联数组，或数字数组，或二者兼有
//默认定义define ('MYSQL_ASSOC', 1);
//如果用了 MYSQL_BOTH，将得到一个同时包含关联和数字索引的数组。
//用 MYSQL_ASSOC 只得到关联索引（如同 mysql_fetch_assoc() 那样）
//用 MYSQL_NUM 只得到数字索引（如同 mysql_fetch_row() 那样）。
function _fetch_array($_sql) {
	return mysql_fetch_array(_query($_sql),MYSQL_ASSOC);
}

/**
 * 
 * @param $_sql
 * @param $_info
 */

function _is_repeat($_sql,$_info) {
	if (_fetch_array($_sql)) {
		_alert_back($_info);
	}
}

/**
 * _affected_rows表示影响到的记录数
 */

function _affected_rows() {
	return mysql_affected_rows();
}


/**
 * _fetch_array_list可以返回指定数据集的所有数据
 * @param $_result
 */

function _fetch_array_list($_result) {
	return mysql_fetch_array($_result,MYSQL_ASSOC);
}

function _num_rows($_result) {
	return mysql_num_rows($_result);
}


/**
 * _free_result销毁结果集
 * @param $_result
 */

function _free_result($_result) {
	mysql_free_result($_result);
}

/**
 * _insert_id
 * mysql_insert_id();取得上一步 INSERT 操作产生的 ID 
 */

function _insert_id() {
	return mysql_insert_id();
}

function _close() {
	if (!mysql_close()) {
		exit('关闭异常');
	}
}

?>