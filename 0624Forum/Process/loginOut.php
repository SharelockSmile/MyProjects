<?php
//清除SESSION
session_start();
$_SESSION['user']=null;
//重新定向回去
echo "<script type='text/javascript'>
      history.back();
</script>";
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/17
 * Time: 21:47
 */
