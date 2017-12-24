<?php
include "../Smart/Smarty.class.php";
include "Person.php";
//创建新的Smarty对象
$smarty=new Smarty();
//修改文件保存路径
$smarty->template_dir="./HomeView";
//修改文件界定符
/*$smarty->left_delimiter="{<";
$smarty->right_delimiter=">}";*/
$a=100;
$smarty->assign("a",$a);
$smarty->assign("full","Hello World");



$smarty->display("smart.tpl");
$smarty->display("userInfo.tpl");
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/21
 * Time: 20:06
 */