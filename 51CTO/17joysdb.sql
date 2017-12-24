/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : 17joysdb

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-07-14 22:12:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `c` int(11) NOT NULL DEFAULT '0',
  `cname` char(12) DEFAULT NULL,
  `T` int(11) DEFAULT NULL,
  PRIMARY KEY (`c`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '12', '1');

-- ----------------------------
-- Table structure for `goods_product`
-- ----------------------------
DROP TABLE IF EXISTS `goods_product`;
CREATE TABLE `goods_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_class_id` int(11) NOT NULL,
  `product_danwei_id` int(11) NOT NULL,
  `product_modelnumber` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_standard` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_purchasing_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_sell_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_amount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_tax` varchar(20) COLLATE utf8_unicode_ci DEFAULT '0',
  `product_updatetime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods_product
-- ----------------------------
INSERT INTO `goods_product` VALUES ('1', '3', '5', 'X-404', '', '', '', '1200', '2200', '7', '0', '2009-08-28', '1251430866.jpg', '1');
INSERT INTO `goods_product` VALUES ('2', '1', '1', 'X-129', '', 'ͭ', null, '20', '40', '21', '0', '2009-08-27', '1251441362.gif', '1');
INSERT INTO `goods_product` VALUES ('3', '7', '5', 'S-505', 'c4', '', null, '980', '1500', '7', '0', '2008-11-04', '1251501322.jpg', '1');
INSERT INTO `goods_product` VALUES ('4', '6', '5', 'C-120', '', '', '    ', '5000', '8000', '8', '0', '2006-03-21', '1251501698.jpg', '1');
INSERT INTO `goods_product` VALUES ('5', '7', '5', 'G-A93', '', 'ѩӥѹ', null, '790', '1400', '10', '20', '2004-08-10', '1251501988.jpg', '1');
INSERT INTO `goods_product` VALUES ('8', '7', '5', 'G-A93', '', 'ѩӥѹ', null, '810', '1400', '11', '25', '2009-09-01', null, '1');

-- ----------------------------
-- Table structure for `goods_product_danwei`
-- ----------------------------
DROP TABLE IF EXISTS `goods_product_danwei`;
CREATE TABLE `goods_product_danwei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods_product_danwei
-- ----------------------------
INSERT INTO `goods_product_danwei` VALUES ('1', '');
INSERT INTO `goods_product_danwei` VALUES ('2', '');
INSERT INTO `goods_product_danwei` VALUES ('3', '');
INSERT INTO `goods_product_danwei` VALUES ('4', '');
INSERT INTO `goods_product_danwei` VALUES ('5', '̨');
INSERT INTO `goods_product_danwei` VALUES ('6', 'ֻ');

-- ----------------------------
-- Table structure for `goods_system`
-- ----------------------------
DROP TABLE IF EXISTS `goods_system`;
CREATE TABLE `goods_system` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `module` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `operand` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods_system
-- ----------------------------
INSERT INTO `goods_system` VALUES ('1', 'product_view', '1');

-- ----------------------------
-- Table structure for `joys_access`
-- ----------------------------
DROP TABLE IF EXISTS `joys_access`;
CREATE TABLE `joys_access` (
  `role_id` smallint(5) unsigned DEFAULT NULL,
  `node_id` smallint(5) unsigned DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `pid` smallint(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_access
-- ----------------------------
INSERT INTO `joys_access` VALUES ('1', '1', '1', '0');
INSERT INTO `joys_access` VALUES ('2', '1', '1', '0');
INSERT INTO `joys_access` VALUES ('1', '2', '2', '1');
INSERT INTO `joys_access` VALUES ('2', '2', '2', '1');
INSERT INTO `joys_access` VALUES ('1', '3', '3', '2');
INSERT INTO `joys_access` VALUES ('2', '3', '3', '2');
INSERT INTO `joys_access` VALUES ('1', '3', '2', '1');
INSERT INTO `joys_access` VALUES ('1', '6', '3', '4');
INSERT INTO `joys_access` VALUES ('1', '7', '3', '4');
INSERT INTO `joys_access` VALUES ('2', '6', '3', '4');
INSERT INTO `joys_access` VALUES ('1', '4', '2', '1');

-- ----------------------------
-- Table structure for `joys_article`
-- ----------------------------
DROP TABLE IF EXISTS `joys_article`;
CREATE TABLE `joys_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `title_alias` varchar(255) NOT NULL,
  `introtext` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `sectionid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modifiled` datetime NOT NULL,
  `modifiled_by` int(11) NOT NULL,
  `publish_up` datetime NOT NULL,
  `publish_down` datetime NOT NULL,
  `order` int(11) NOT NULL,
  `access` tinyint(3) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `hits` int(11) NOT NULL,
  `metadata` text NOT NULL,
  `params` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_article
-- ----------------------------
INSERT INTO `joys_article` VALUES ('1', '游戏技', '66', '', 'asdasd ', '1', '1', '5', '0000-00-00', '52', '0000-00-00 00:00:00', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '', '', '1', '', null);
INSERT INTO `joys_article` VALUES ('3', '为', ' 请问', '', '0', '1', '1', '5', '0000-00-00', '52', '0000-00-00 00:00:00', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '1', '', '', '2', '', null);
INSERT INTO `joys_article` VALUES ('5', 'asd', 'asd', '', '0', '1', '1', '4', '0000-00-00', '52', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '1', '', '', '1', '', null);

-- ----------------------------
-- Table structure for `joys_category`
-- ----------------------------
DROP TABLE IF EXISTS `joys_category`;
CREATE TABLE `joys_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `order` int(11) NOT NULL,
  `access` tinyint(3) NOT NULL,
  `sectionid` int(11) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_category
-- ----------------------------
INSERT INTO `joys_category` VALUES ('1', '擦擦', '互', '擦擦', '0', '0', '0', '1', '1111');
INSERT INTO `joys_category` VALUES ('4', '呵呵', '呵呵', '呵呵', '0', '0', '0', '1', '');
INSERT INTO `joys_category` VALUES ('5', '请问请问 ', '请问', '', '1', '0', '0', '1', '');
INSERT INTO `joys_category` VALUES ('6', '日3人', '人', '', '0', '0', '0', '1', '');
INSERT INTO `joys_category` VALUES ('7', '阿斯达啊', 'asdad', '', '1', '0', '0', '1', '');
INSERT INTO `joys_category` VALUES ('8', '速度 的', '安定', '', '1', '0', '0', '1', '');
INSERT INTO `joys_category` VALUES ('9', '123', '123', '', '1', '0', '0', '1', '');
INSERT INTO `joys_category` VALUES ('10', '后台项目', '啊啊', '', '1', '0', '0', '6', '');

-- ----------------------------
-- Table structure for `joys_component`
-- ----------------------------
DROP TABLE IF EXISTS `joys_component`;
CREATE TABLE `joys_component` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `option` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `enabled` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_component
-- ----------------------------
INSERT INTO `joys_component` VALUES ('1', '单元模型', 'Section', 'view', '0', '1');
INSERT INTO `joys_component` VALUES ('2', '分类模型', 'Category', 'view', '0', '1');
INSERT INTO `joys_component` VALUES ('3', '文章模型', 'Articel', 'view', '0', '1');

-- ----------------------------
-- Table structure for `joys_menu`
-- ----------------------------
DROP TABLE IF EXISTS `joys_menu`;
CREATE TABLE `joys_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `menutype` varchar(75) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_menu
-- ----------------------------
INSERT INTO `joys_menu` VALUES ('1', '主菜单', 'mainmenu', '主要的菜单');
INSERT INTO `joys_menu` VALUES ('2', '导航菜单', 'topmenu', '导航栏菜单');
INSERT INTO `joys_menu` VALUES ('3', 'qweqqqqqqqqqqqqqqqqqqqq', 'er', 'trtr');
INSERT INTO `joys_menu` VALUES ('4', '434', '343', '23');
INSERT INTO `joys_menu` VALUES ('7', '123', '123', '123');
INSERT INTO `joys_menu` VALUES ('9', '555', '666', '9666');
INSERT INTO `joys_menu` VALUES ('10', 'df', 'sdf', 'sdf');

-- ----------------------------
-- Table structure for `joys_menu_item`
-- ----------------------------
DROP TABLE IF EXISTS `joys_menu_item`;
CREATE TABLE `joys_menu_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `menuid` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL,
  `link` text,
  `type` varchar(50) NOT NULL,
  `published` tinyint(1) DEFAULT '0',
  `pid` int(11) DEFAULT NULL,
  `path` text,
  `componentid` int(11) DEFAULT '0',
  `order` int(11) DEFAULT '0',
  `browserNav` tinyint(4) DEFAULT '0',
  `access` tinyint(4) DEFAULT '0',
  `params` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_menu_item
-- ----------------------------
INSERT INTO `joys_menu_item` VALUES ('1', '主菜单项1', '1', '', 'index.php/Category/view/id/7', 'Category', '1', '0', '0', '1', '0', '2', '1', '0');
INSERT INTO `joys_menu_item` VALUES ('3', '主菜单1-1', '1', '', 'index.php/Category/view/id/5', 'Category', '1', '2', '0-1', '0', '0', '2', '0', '0');
INSERT INTO `joys_menu_item` VALUES ('5', '主菜单项1-1-3', '1', '', null, 'Articel', '1', '1', '0-1-3', '0', '0', '0', '0', null);
INSERT INTO `joys_menu_item` VALUES ('6', '主菜单1-2', '1', '', null, 'Articel', '1', '1', '0-1', '0', '0', '0', '0', null);
INSERT INTO `joys_menu_item` VALUES ('7', '主菜单项2-1-1', '1', '', 'index.php/Category/view/id/7', 'Category', '1', '4', '0', '0', '0', '2', '3', null);
INSERT INTO `joys_menu_item` VALUES ('8', '44', '2', '', 'index.php/Category/view/id/1', 'Category', '1', '0', null, '0', '0', '2', '3', null);
INSERT INTO `joys_menu_item` VALUES ('9', '阿斯达', '2', '', 'index.php/Category/view/id/5', 'Category', '1', '0', '0', '0', '0', '2', '0', null);
INSERT INTO `joys_menu_item` VALUES ('10', '导航一', '2', '', 'index.php/Category/view/id/1', 'Category', '1', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `joys_menu_item` VALUES ('11', '导航', '2', '', 'index.php/Category/view/id/1', 'Category', '1', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `joys_menu_item` VALUES ('12', '阿三', '2', '', 'index.php/Category/view/id/5', 'Category', '1', '0', '0', '0', '0', '0', '2', null);
INSERT INTO `joys_menu_item` VALUES ('13', '阿三', '2', '', 'index.php/Category/view/id/5', 'Category', '1', '0', '0', '0', '0', '0', '2', null);
INSERT INTO `joys_menu_item` VALUES ('14', '导航', '2', '', 'index.php/Category/view/id/1', 'Category', '1', '0', '0', '0', '0', '1', '3', null);
INSERT INTO `joys_menu_item` VALUES ('26', '111', '2', '', 'index.php/Category/view/id/5', 'Category', '1', '8', '-8', '0', '0', '2', '3', null);
INSERT INTO `joys_menu_item` VALUES ('27', 'asd', '1', '', 'index.php/Category/view/id/', 'Category', '1', '5', '0-1-3-5', '0', '0', '2', '3', null);

-- ----------------------------
-- Table structure for `joys_modules`
-- ----------------------------
DROP TABLE IF EXISTS `joys_modules`;
CREATE TABLE `joys_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) NOT NULL,
  `access` tinyint(3) NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_modules
-- ----------------------------
INSERT INTO `joys_modules` VALUES ('1', '主菜单', '', '0', 'right', '1', 'Menu', '0', '1', 'id=1\nstyle=verticalmenu');
INSERT INTO `joys_modules` VALUES ('2', '右侧菜单', '', '0', 'right', '1', 'Menu', '0', '1', 'id=2\nstyle=verticalmenu');
INSERT INTO `joys_modules` VALUES ('3', '导航栏菜单', '', '0', 'top', '1', 'Menu', '0', '1', 'id=2\nstyle=rankmenu');
INSERT INTO `joys_modules` VALUES ('4', '相关文章', '', '0', 'foot', '1', 'LatestNews', '0', '1', 'sid=1\ncid=1\nstyle=verticalmenu');
INSERT INTO `joys_modules` VALUES ('5', '最新文章', '', '0', 'foot', '1', 'LatestNews', '0', '1', 'sid=2\ncid=7\nstyle=verticalmenu');

-- ----------------------------
-- Table structure for `joys_modules_menu`
-- ----------------------------
DROP TABLE IF EXISTS `joys_modules_menu`;
CREATE TABLE `joys_modules_menu` (
  `modulesid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  PRIMARY KEY (`modulesid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_modules_menu
-- ----------------------------
INSERT INTO `joys_modules_menu` VALUES ('1', '0');
INSERT INTO `joys_modules_menu` VALUES ('2', '0');
INSERT INTO `joys_modules_menu` VALUES ('3', '0');
INSERT INTO `joys_modules_menu` VALUES ('4', '0');
INSERT INTO `joys_modules_menu` VALUES ('5', '0');
INSERT INTO `joys_modules_menu` VALUES ('6', '0');

-- ----------------------------
-- Table structure for `joys_node`
-- ----------------------------
DROP TABLE IF EXISTS `joys_node`;
CREATE TABLE `joys_node` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `sort` smallint(5) NOT NULL,
  `pid` smallint(5) NOT NULL,
  `level` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_node
-- ----------------------------
INSERT INTO `joys_node` VALUES ('1', 'Admin', '后台项目', '1', '项目权限', '0', '0', '1');
INSERT INTO `joys_node` VALUES ('2', 'Index', '默认控制模块', '1', '控制器', '0', '1', '2');
INSERT INTO `joys_node` VALUES ('3', 'index', '默认动作', '1', '操作动作', '0', '2', '3');
INSERT INTO `joys_node` VALUES ('4', 'User', '用户控制模块', '1', '控制器', '0', '1', '2');
INSERT INTO `joys_node` VALUES ('5', 'Section', '单元控制模块', '1', '控制器', '0', '1', '2');
INSERT INTO `joys_node` VALUES ('6', 'index', '用户默认操作', '1', '操作动作', '0', '4', '3');
INSERT INTO `joys_node` VALUES ('7', 'add', '用户添加操作', '1', '操作动作', '0', '4', '3');
INSERT INTO `joys_node` VALUES ('8', 'index', '单元默认动作', '1', '操作动作', '0', '5', '3');
INSERT INTO `joys_node` VALUES ('9', 'add', '单元添加操作', '1', '操作动作', '0', '5', '3');

-- ----------------------------
-- Table structure for `joys_product`
-- ----------------------------
DROP TABLE IF EXISTS `joys_product`;
CREATE TABLE `joys_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_class_id` int(11) NOT NULL,
  `product_danwei_id` int(11) NOT NULL,
  `product_modelnumber` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_standard` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_purchasing_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_sell_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_amount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_tax` varchar(20) COLLATE utf8_unicode_ci DEFAULT '0',
  `product_updatetime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of joys_product
-- ----------------------------

-- ----------------------------
-- Table structure for `joys_product_class`
-- ----------------------------
DROP TABLE IF EXISTS `joys_product_class`;
CREATE TABLE `joys_product_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of joys_product_class
-- ----------------------------
INSERT INTO `joys_product_class` VALUES ('1', '');
INSERT INTO `joys_product_class` VALUES ('2', '');
INSERT INTO `joys_product_class` VALUES ('3', '');
INSERT INTO `joys_product_class` VALUES ('5', 'ˮ');
INSERT INTO `joys_product_class` VALUES ('6', '');
INSERT INTO `joys_product_class` VALUES ('7', 'ѹ');
INSERT INTO `joys_product_class` VALUES ('8', '555');

-- ----------------------------
-- Table structure for `joys_role`
-- ----------------------------
DROP TABLE IF EXISTS `joys_role`;
CREATE TABLE `joys_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_role
-- ----------------------------
INSERT INTO `joys_role` VALUES ('1', '超级管理员', '0', '1', '超级管理员权限');
INSERT INTO `joys_role` VALUES ('2', '普通管理员', '0', '1', '普通管理员权限');
INSERT INTO `joys_role` VALUES ('3', '注册用户', '0', '1', '注册用户权限');
INSERT INTO `joys_role` VALUES ('6', '23', '0', '1', '2322');

-- ----------------------------
-- Table structure for `joys_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `joys_role_user`;
CREATE TABLE `joys_role_user` (
  `role_id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_role_user
-- ----------------------------
INSERT INTO `joys_role_user` VALUES ('1', '31');
INSERT INTO `joys_role_user` VALUES ('0', '34');
INSERT INTO `joys_role_user` VALUES ('0', '40');
INSERT INTO `joys_role_user` VALUES ('0', '41');
INSERT INTO `joys_role_user` VALUES ('1', '42');
INSERT INTO `joys_role_user` VALUES ('0', '43');
INSERT INTO `joys_role_user` VALUES ('1', '44');
INSERT INTO `joys_role_user` VALUES ('1', '45');
INSERT INTO `joys_role_user` VALUES ('0', '46');
INSERT INTO `joys_role_user` VALUES ('1', '47');
INSERT INTO `joys_role_user` VALUES ('1', '48');
INSERT INTO `joys_role_user` VALUES ('0', '49');
INSERT INTO `joys_role_user` VALUES ('0', '50');
INSERT INTO `joys_role_user` VALUES ('0', '51');
INSERT INTO `joys_role_user` VALUES ('1', '52');
INSERT INTO `joys_role_user` VALUES ('1', '53');

-- ----------------------------
-- Table structure for `joys_section`
-- ----------------------------
DROP TABLE IF EXISTS `joys_section`;
CREATE TABLE `joys_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `order` int(11) NOT NULL,
  `access` tinyint(3) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joys_section
-- ----------------------------
INSERT INTO `joys_section` VALUES ('1', '通宵', '通宵', '通宵', '1', '0', '1', '011');
INSERT INTO `joys_section` VALUES ('3', '啊是打算', '啊是大三的', '', '1', '0', '0', '');
INSERT INTO `joys_section` VALUES ('4', '通宵', '通宵', '', '0', '0', '0', '');
INSERT INTO `joys_section` VALUES ('5', 'qq', '啊啊', '', '0', '0', '0', '');
INSERT INTO `joys_section` VALUES ('6', '厉害的', '哈哈', '', '1', '0', '0', '');
INSERT INTO `joys_section` VALUES ('7', '闻气味', 'aaa', '', '1', '0', '1', '');
INSERT INTO `joys_section` VALUES ('8', 'sdf', 'sdf', '', '1', '0', '0', '');

-- ----------------------------
-- Table structure for `joys_trade`
-- ----------------------------
DROP TABLE IF EXISTS `joys_trade`;
CREATE TABLE `joys_trade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trade_order` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sell_product_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sell_product_class` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `actual_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `leave_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `trade_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of joys_trade
-- ----------------------------
INSERT INTO `joys_trade` VALUES ('6', 'all', '20090905102905', '', '', '8000', '8000', '', '2009-09-05');
INSERT INTO `joys_trade` VALUES ('7', 'all', '20090907192615', 'ѩӥѹ', 'ѹ', '3600', '3600', '0', '2009-09-07');
INSERT INTO `joys_trade` VALUES ('8', 'sale', '20090909144007', 'ѩӥѹ', 'ѹ', '1600', '1500', '100', '2009-09-09');
INSERT INTO `joys_trade` VALUES ('9', 'sale', '20090911143721', '', 'ѹ', '1580', '1500', '80', '2009-09-13');
INSERT INTO `joys_trade` VALUES ('10', 'all', '20090911143820', 'ѩӥѹ', 'ѹ', '1400', '1400', '', '2009-08-21');
INSERT INTO `joys_trade` VALUES ('11', 'part', '20090911143844', '', '', '2200', '2000', '200', '2009-07-10');
INSERT INTO `joys_trade` VALUES ('12', 'all', '20090911143854', '', '', '8000', '8000', '', '2008-05-01');
INSERT INTO `joys_trade` VALUES ('13', 'all', '20090911143908', 'ѩӥѹ', 'ѹ', '1400', '1400', '', '2008-01-19');
INSERT INTO `joys_trade` VALUES ('14', 'all', '20090911143917', '', 'ѹ', '2900', '2900', '', '2007-11-11');

-- ----------------------------
-- Table structure for `joys_trade_connect`
-- ----------------------------
DROP TABLE IF EXISTS `joys_trade_connect`;
CREATE TABLE `joys_trade_connect` (
  `con_trade_order` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `con_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_remarks` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`con_trade_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of joys_trade_connect
-- ----------------------------
INSERT INTO `joys_trade_connect` VALUES ('20090907192615', 'Eric', 'Qust', '', '');
INSERT INTO `joys_trade_connect` VALUES ('20090911143844', '234', 'edsfsd', '324', 'sdf');

-- ----------------------------
-- Table structure for `joys_trade_have_product`
-- ----------------------------
DROP TABLE IF EXISTS `joys_trade_have_product`;
CREATE TABLE `joys_trade_have_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trade_order` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `sell_amount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of joys_trade_have_product
-- ----------------------------
INSERT INTO `joys_trade_have_product` VALUES ('1', '20090905102905', '4', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('2', '20090907192615', '8', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('3', '20090907192615', '1', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('4', '20090909144007', '8', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('5', '20090909144007', '2', '5', '1');
INSERT INTO `joys_trade_have_product` VALUES ('6', '20090911143721', '3', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('7', '20090911143721', '2', '2', '1');
INSERT INTO `joys_trade_have_product` VALUES ('8', '20090911143820', '5', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('9', '20090911143844', '1', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('10', '20090911143854', '4', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('11', '20090911143908', '8', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('12', '20090911143917', '3', '1', '1');
INSERT INTO `joys_trade_have_product` VALUES ('13', '20090911143917', '8', '1', '1');

-- ----------------------------
-- Table structure for `joys_tree`
-- ----------------------------
DROP TABLE IF EXISTS `joys_tree`;
CREATE TABLE `joys_tree` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `layoutpath` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jspath` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `iconcls` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of joys_tree
-- ----------------------------
INSERT INTO `joys_tree` VALUES ('1', 'product', '会员资料管理', '/tp17/Admin/Tpl/default/Public/Layout/product.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/Product/product.js\'}]', '/Goods/Goods_Manage/Tpl/default/Public/Images/product.gif', 'product');
INSERT INTO `joys_tree` VALUES ('5', 'user', '会员资料管理', '/tp17/Admin/Tpl/default/Public/Layout/user.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/User/user.js\'}]', '', '');
INSERT INTO `joys_tree` VALUES ('6', 'user ', '会员分组管理', '/tp17/Admin/Tpl/default/Public/Layout/role.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/User/role.js\'}]', '', '');
INSERT INTO `joys_tree` VALUES ('7', 'user', '会员功能管理', '/tp17/Admin/Tpl/default/Public/Layout/node.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/User/node.js\'}]', '', '');
INSERT INTO `joys_tree` VALUES ('8', 'menu', '菜单管理', '/tp17/Admin/Tpl/default/Public/Layout/menu.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/Menu/menu.js\'}]', '', '');
INSERT INTO `joys_tree` VALUES ('9', 'content', '文章管理', '/tp17/Admin/Tpl/default/Public/Layout/article.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/Content/article.js\'}]', '', '');
INSERT INTO `joys_tree` VALUES ('10', 'content', '单元管理', '/tp17/Admin/Tpl/default/Public/Layout/section.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/Content/section.js\'}]', '', '');
INSERT INTO `joys_tree` VALUES ('11', 'content', '分类管理', '/tp17/Admin/Tpl/default/Public/Layout/category.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/Content/category.js\'}]', '', '');
INSERT INTO `joys_tree` VALUES ('12', 'modules', '模块管理', '/tp17/Admin/Tpl/default/Public/Layout/modules.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/Modules/modules.js\'}]', '', '');
INSERT INTO `joys_tree` VALUES ('13', 'access', '权限管理', '/tp17/Admin/Tpl/default/Public/Access/Access.html', '[{\'js\':\'Admin/Tpl/default/Public/Module/Content/category.js\'}]', '', '');

-- ----------------------------
-- Table structure for `joys_user`
-- ----------------------------
DROP TABLE IF EXISTS `joys_user`;
CREATE TABLE `joys_user` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` char(15) CHARACTER SET utf8 NOT NULL,
  `password` char(32) NOT NULL,
  `reg_date` datetime NOT NULL,
  `last_login_date` date NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `params` text NOT NULL,
  `email` char(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of joys_user
-- ----------------------------
INSERT INTO `joys_user` VALUES ('51', 'www', 'wwww', '0000-00-00 00:00:00', '0000-00-00', 'www', '1', '', 'ww@w.com');
INSERT INTO `joys_user` VALUES ('50', 'asdas', 'fgdfg', '0000-00-00 00:00:00', '0000-00-00', 'adas', '1', '', 'dasd@qq.com');
INSERT INTO `joys_user` VALUES ('49', 'nnn', 'nn', '0000-00-00 00:00:00', '0000-00-00', 'nnn', '1', '', 'nn@qq.com');
INSERT INTO `joys_user` VALUES ('48', 'pppppp', 'pppp', '0000-00-00 00:00:00', '0000-00-00', 'ppp', '1', '', 'pp@pp.com');
INSERT INTO `joys_user` VALUES ('41', 'fffff', 'ffffffffffffffffffff', '0000-00-00 00:00:00', '0000-00-00', 'fffffffffffffffffffff', '1', '', 'fff@ee.com');
INSERT INTO `joys_user` VALUES ('40', 'admina', 'admi', '0000-00-00 00:00:00', '0000-00-00', 'ad', '1', '', 'ww@q.vom');
INSERT INTO `joys_user` VALUES ('46', 'cccccccc', 'cccccccccccccc', '0000-00-00 00:00:00', '0000-00-00', 'ccccccccccccccc', '1', '', 'cccccccccc@cc.com');
INSERT INTO `joys_user` VALUES ('47', 'xx', 'xxx', '0000-00-00 00:00:00', '0000-00-00', 'xx', '1', '', 'xx@xx.com');
INSERT INTO `joys_user` VALUES ('45', 'yyyyy', 'yyy', '0000-00-00 00:00:00', '0000-00-00', 'yyy', '1', '', 'yy@yy.com');
INSERT INTO `joys_user` VALUES ('44', 'ggggg', 'gggggggggggggggggg', '0000-00-00 00:00:00', '0000-00-00', 'ggggggggggggggggg', '1', '', 'gggggggggggg@ww.com');
INSERT INTO `joys_user` VALUES ('43', 'sssss', 'ssssss', '0000-00-00 00:00:00', '0000-00-00', 'sssss', '1', '', 'ss@aa.com');
INSERT INTO `joys_user` VALUES ('42', 'bbbbbbbbbbbb', 'bbbbbbbbbbbbbbbb', '0000-00-00 00:00:00', '0000-00-00', 'bbbbbbbbbbb', '1', '', 'bb@qq.com');
INSERT INTO `joys_user` VALUES ('52', 'qweqwe', 'efe6398127928f1b2e9ef3207fb82663', '2012-06-15 23:51:17', '0000-00-00', 'qwe', '1', '', 'qw@qq.com');
INSERT INTO `joys_user` VALUES ('53', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2012-06-16 13:56:21', '2012-07-04', 'admin', '1', '', 'admin@qq.com');
