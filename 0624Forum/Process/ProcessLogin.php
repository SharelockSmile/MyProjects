<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/17
 * Time: 15:15
 */
session_start();
include "../DAL/UserService.php";
include "../Model/User.php";
if(isset($_POST))
{
    $uName=$_POST["userName"];
    $uPwd=$_POST["userPwd"];
}
$db=new DBHelper("localhost","root","root","forum");

$User=new User();
$User->uName=$uName;
$User->uPwd=$uPwd;

$us=new UserService();
$res=$us->login($User);
if ($res)
{
    //表示登陆成功
    $_SESSION["user"]=$res[0]['uname'];
    echo "<script type='text/javascript'>
          alert ('登陆成功');
          history.back();
</script>";
}else{
    echo "<script type='text/javascript'>
          alert ('登陆失败');
          history.back();
</script>";
}