<?php
include "../Smart/Smarty.class.php";
$smarty=new Smarty();
//$smarty->display("userInfo.tpl");
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/21
 * Time: 10:29
 */
$arr=array(2,4,6,9);
$smarty->assign("arr",$arr);
$array=array(
    array(1,3,5,8),
    array("Joy","Leo","Sun","Han")
);
$smarty->assign("array",$array);
$name=array("name"=>"Petter","age"=>16,"sex"=>"Boy");
$smarty->assign("stu",$name);


$null=array();
$smarty->assign("null",$null);

$num=array("1"=>3,"3"=>2,"5"=>7,"7"=>4);
$smarty->assign("num",$num);






$str="hello world!";
$smarty->assign("str",$str);

$str2=" SMILE TO LIFE";
$smarty->assign("str2",$str2);

$paragraphs ="War Dims Hope for Peace. Child's Death Ruins Couple's Holiday.
                 Man is Fatally Slain.\n 
                 Death Causes Loneliness, Feeling of Isolation.";
$smarty->assign("paragraphs",$paragraphs);

$sentence="Two Soviet Ships Collide - One Dies. Enraged Cow Inj\nures Farmer with Axe.";
$smarty->assign("sentence",$sentence);

$default="Dealers Will Hear Car Talk at Noon.";
$smarty->assign("default",$default);

$smarty->assign('articleTitle', "'Stiff Opposition Expected to Casketless Funeral Plan'");
$EmailAddress="15202429501@163.com";
$smarty->assign("EmailAddress",$EmailAddress);

$smarty->assign('number', 23.5787446);

$smarty->assign('sent', "Grandmother of\neight makes\t hole in one.");

$smarty->assign('article', "Blind Woman Gets <font face=\"helvetica\">New Kidney</font> from Dad she Hasn't Seen in <b>years</b>.");

$smarty->assign("string","像前世我们有过的模样；千年一梦尽长安");

$smarty->assign("add","http://www.jb51.net");

//$smarty->display("test.tpl");
$smarty->display("test.html");
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/21
 * Time: 10:29
 */