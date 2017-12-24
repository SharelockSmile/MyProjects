<?php
include '../Model/MyUser.php';
include '../DAL/CountryInfoServer.php';

$mu=new MyUser();
$mu->uname=$_POST['userName'];
$mu->upwd=$_POST['userPwd'];
$mu->uage=$_POST['userAge'];
$mu->usex=$_POST['userSex'];
$mu->nid=$_POST['selNation'];
$mu->hob=$_POST['chkBobbies'];

$mus=new CountryInfoServer();
$res=$mus->Register($mu);
if($res)
{
    header("Location:index.php?success=2&uid={$res}");
}
else
{
    header("Location:Register.php");
}
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/11
 * Time: 14:38
 */