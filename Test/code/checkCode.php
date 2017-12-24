<?php
header("Content-type:text/html;charset=utf-8");

session_start();
$yzm=$_POST["yzm"];
if($_SESSION["y"]==$yzm)
{
   header("Location:index.html");
}
else{
	echo "<script type='text/javascript'>alert('验证码错误！');history.back();</script>";
}
?>