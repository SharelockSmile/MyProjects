<?php
header("Content-Type:text/xml;charset=utf-8");
$uid=$_POST["uid"];
$upwd=$_POST["upwd"];
$xml="<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
if ($uid==10000&&$upwd==1234)
{
    $xml.="<res><msg>1</msg></res>";
}else{
    $xml.="<res><msg>0</msg></res>";
}
echo $xml;
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/19
 * Time: 10:43
 */
?>