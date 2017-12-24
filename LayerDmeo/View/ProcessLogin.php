<?php
include '../DAL/CountryInfoServer.class.php';
include '../Model/MyUser.class.php';
/* $uid=$_POST["uId"];
$pwd=$_POST["uPwd"]; */
$myuser=new MyUser();
$myuser->uid=$_POST["uId"];
$myuser->upwd=$_POST["uPwd"];
$mus=new CountryInfo();
$res=$mus->UserLogin($myuser);
if($res)
{
	echo "success";
}
else 
{
	echo "fault";
}