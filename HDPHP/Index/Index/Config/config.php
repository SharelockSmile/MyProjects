<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
$arr = array(
 /********************************数据库********************************/
 
);
//引入自定义的数据库配置文件，并与现有的合并后返回
return array_merge(include "./Conf/dbConfig.php",$arr);
?>