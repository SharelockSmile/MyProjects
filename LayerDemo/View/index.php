<?php
if (isset($_GET['success']))
{
    if($_GET['success']==2)
    {
        $uid=$_GET['uid'];
        echo "欢迎来到新世界,你的帐号是:".$uid."</br>";
        echo "<div>注册成功,立即登录,如果你的浏览器没有自动跳转,<a href='Login.php'>请点击这里</a></div>";
        echo "<script>setTimeout(function() {window.location.href='Login.php';},3000)
              </script>";
    }

}
else
{
    echo "你还没有帐号？<a href='Register.php'>立即注册</a>吧";
}
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/11
 * Time: 14:48
 */