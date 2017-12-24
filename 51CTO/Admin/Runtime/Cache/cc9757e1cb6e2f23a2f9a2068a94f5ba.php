<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--  自定义样式 -->
<link rel="stylesheet" type="text/css" href="__TMPL__/Public/Css/index.css" />
<!-- Ext核心类及系统变量的初始化 -->
<link rel="stylesheet" type="text/css" href="../Public/Ext/resources/css/ext-all.css" />
<link rel="stylesheet" type="text/css" href="../Public/css/lovecomobox.css" />
<script src="../Public/Ext/adapter/ext/ext-base.js"></script>
<script src="../Public/Ext/ext-all.js"></script>
<script src="../Public/Ext/src/locale/ext-lang-zh_CN.js"></script>

<script type="text/javascript">
	var Company="<?php echo (C("Company")); ?>";
	var Appname="<?php echo (C("Appname")); ?>";
	var url = "__URL__" ,
		app = "__APP__" ,
		public = "__PUBLIC__" ,
		tpl = "__TMPL__",
                myadmin= "tp17/admin"; 
</script>

<script src="../Public/Module/Plugins/Ext.goods.CrudPanel.js"></script>
<script src="../Public/Module/Plugins/TreeComoBox.js"></script>
<script src="../Public/Module/Plugins/GridComobox.js"></script>
<script src="../Public/Module/Plugins/Ext.ux.form.LovCombo.js"></script>
<script src="../Public/Module/Plugins/search.js"></script>
<script src="../Public/Module/Plugins/TreeCheckNodeUI.js"></script>
<script src="../Public/Module/Plugins/ComboBoxCheckTree.js"></script>
<!-- 组成系统主界面的核心类 -->

<script src="../Public/Module/Index/hearder.js"></script>
<script src="../Public/Module/Index/left.js"></script>
<script src="../Public/Module/Index/main.js"></script>
<script src="../Public/Module/Index/index.js"></script>


<!-- Ext外部扩展类 -->



<title><?php echo ($title); ?></title>
</head>
<body>
   
</body>
</html>