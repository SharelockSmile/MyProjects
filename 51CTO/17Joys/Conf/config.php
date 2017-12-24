<?php
 
$config	=	require './config.inc.php';
$siteconfig	=	require './siteconfig.inc.php';
$array = array(
	//'配置项'=>'配置值'
	//'PAGESIZE'		=>	10,		//配置每页显示数据个数
	'APP_DEBUG'		=>	false,	//调试模式开关
	'DEFAULT_THEME'	=>	'default',	//默认模板主题
	'URL_MODEL'		=>	2,
	'URL_HTML_SUFFIX'	=>	'.html',
	'URL_ROUTER_ON'	=>	true,
	'URL_PATHINFO_DEPR'	=>	'-'
);

return array_merge($config,$siteconfig,$array);
?>