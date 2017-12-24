<?php
header("Content-Type:text/html;charset=utf-8");
var_dump($_GET["textCode"]);
session_start();
if($_GET["textCode"]==$_SESSION["code"])
{
    //header("showCode.php");
    echo "验证通过！";
}
else
    {
        echo "验证失败！";
    }
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/12
 * Time: 20:26
 */
echo "1111";