<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
$arr= array(
);
return array_merge(include "./Conf/dbConfig.php",$arr);
?>