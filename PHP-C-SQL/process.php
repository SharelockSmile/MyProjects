<?php
//连接数据库
$link=mysqli_connect("localhost","root","root","studentinfo");

$uid=$_POST["user"];
$pwd=$_POST['pwd'];

mysqli_query($link,"set names utf8");
//$sql="SELECT *FROM myuser WHERE userId={$uid} AND userPwd=MD5('{$pwd}')";
$sql="SELECT *FROM myuser WHERE userId={$uid}";

//$sql="SELECT *FROM myuser WHERE userId=10000 AND userPwd=MD5('123')";

//存储数据查询的结果
$res=mysqli_query($link,$sql) or die("SQL语法错误");
//查询出来的结果数
$num=mysqli_num_rows($res);
if($num==1)
{
    echo "登陆成功";
    //header("Location:success.php?msg=1");
    //将结果变为数组存放起来
    $arr=mysqli_fetch_array($res);
    //var_dump($arr);
    //$arr=mysql_fetch_assoc($res);
    //$arr=mysql_fetch_row($res);
    if(md5($pwd)==$arr["userPwd"])
    {
        //验证通过，跳入主页面
        header("Location:success.php?msg=1");
    }
    else
    {
        //密码错误定位回首页
        header("Location:connect.php?user={$uid}&error=2");
    }
}
else if($num==0)
    {
        //echo "登录失败";用户名错误，返回登陆页面和错误信息
        header("Location:connect.php?error=1");
    }
?>