-- phpMyAdmin SQL Dump
-- version 2.6.4
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2009 年 11 月 25 日 17:50
-- 服务器版本: 4.0.21
-- PHP 版本: 4.3.11
-- 
-- 数据库: `sqlmntour`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `contacts`
-- 

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(20) NOT NULL default '',
  `sex` int(1) NOT NULL default '0',
  `mobile` varchar(20) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `address` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
);

-- 
-- 导出表中的数据 `contacts`
-- 

INSERT INTO `contacts` VALUES (1, 'sdfasd', 1, 'sdfa', 't@t.cn', 'sdfasd');
INSERT INTO `contacts` VALUES (12, 'test1126', 0, '13576614360', 'email@e.com', 'email@e.com');
INSERT INTO `contacts` VALUES (4, 'sdfasd', 1, 'sdfa', 'dfasd', '通讯录管理系统');
INSERT INTO `contacts` VALUES (7, 'wwwbbd', 1, 'sdfa', 'dfasd@vv.cn', 'wwwbbd');
INSERT INTO `contacts` VALUES (10, 'test1127', 1, '13575514360', 'test1124@test1124.cc', 'test1124@test1124.cc');
INSERT INTO `contacts` VALUES (15, '你好', 0, '你好吗', '12333@中国.cn', '12333@中国.cn');
INSERT INTO `contacts` VALUES (16, '手动阀', 0, '士大夫', '多发@是.cn', 'dfadf多发');
INSERT INTO `contacts` VALUES (17, '手动阀', 0, '士大夫', '多发@是.cn', '');
INSERT INTO `contacts` VALUES (18, '错错错', 0, '痴痴缠缠@dd.cc', '痴痴缠缠@dd.cc', '错错错');
