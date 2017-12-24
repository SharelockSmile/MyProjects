<?php
	if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
	return array(
 /********************************数据库********************************/
    'DB_DRIVER'                     => 'Mysqli',    //数据库驱动
    'DB_CHARSET'                    => 'utf8',      //数据库字符集
    'DB_HOST'                       => '127.0.0.1', //数据库连接主机  如127.0.0.1
    'DB_PORT'                       => 3306,        //数据库连接端口
    'DB_USER'                       => 'root',      //数据库用户名
    'DB_PASSWORD'                   => 'root',          //数据库密码
    'DB_DATABASE'                   => 'answer',          //数据库名称
    'DB_PREFIX'                     => 'hd_',          //表前缀
    'DB_PCONNECT'                   => false,       //数据库持久链接
    //'CACHE_SELECT_TIME'             => -1,          //缓存时间 -1为不缓存 0为永久缓存
    'CACHE_SELECT_LENGTH'           => 30,          //缓存最大条数
);
?>