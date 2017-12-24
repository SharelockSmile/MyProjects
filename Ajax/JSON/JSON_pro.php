<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/18
 * Time: 12:05
 */
$name=$_POST["uid"];
$pwd=$_POST["upwd"];
if($name==10000&&$pwd==1234)
 {
     $json="{\"msg\":1}";
 }else{
     $json="{\"msg\":2’}";
}
echo $json;