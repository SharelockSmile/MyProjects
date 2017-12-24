<?php
include '../Model/MyUser.class.php';
include '../DAL/CountryInfoServer.class.php';

$mu=new MyUser();
$mu->uname=$_POST['userName'];
$mu->upwd=$_POST['userPwd'];
$mu->uage=$_POST['userAge'];
$mu->usex=$_POST['userSex'];
$mu->nid=$_POST['selNation'];
$mu->hob=$_POST['chkBobbies'];

$mus=new CountryInfo();
$res=$mus->Register($mu);
if($res)
{
	echo "success";
}
else 
{
	header("Location:Register.php");
}