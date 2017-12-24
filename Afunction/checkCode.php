<?php
header("Content-Type:text/html;charset=utf-8");
//开启会话，使变量可以跨页面使用
session_start();
if($_POST["textCode"]==$_SESSION["code"])
{
    //header("showCode.php");
    echo "验证通过！";
}
else
    {
        echo "<script>this.location='showCode.php';alert('验证失败！')</script>";
    }
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/4/12
 * Time: 14:25
 */