<?php
//定义项目名称
define('APP_NAME', 'Admin');
define('APP_PATH','Admin');
define('THINK_PATH', './ThinkPHP/');
// 禁止生成Runtime
define('NO_CACHE_RUNTIME',true);
require THINK_PATH.'ThinkPHP.php';
APP::run();
?>