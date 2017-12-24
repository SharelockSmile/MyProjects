<?php
$link=mysqli_connect("localhost","root","root","studentinfo");

/*$uid=$_POST["userId"];
$pwd=$_POST['userPwd'];
$age=$_POST['age'];
$sex=$_POST['sex'];

mysqli_query($link,"set names utf8");

$sql="SELECT *FROM myuser WHERE userId={$uid}";

$res=mysqli_query($link,$sql) or die("SQL语法错误");

$num=mysqli_num_rows($res);
if($num==1)
{
    echo "<script type='text/javascript'>
        alert('账号已存在，是否找回密码');
    </script>";
}
else
    {
        $mysql="INSERT INTO Myuser VALUE ($uid,MD5('$pwd'),18,'女')";
        $result=mysqli_query($link,$mysql) or die("SQL语法错误");
        if ($result)
        {
            echo "注册成功，是否立即登录";
        }
    }*/
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/11
 * Time: 21:24
 */?>
<html>
<head></head>
<body>
    <form name="myForm" action="" method="post">
        <table>
            <tr>
                <td>帐号：</td>
                <td><input type="text" name="userId"></td>
            </tr>
            <tr>
                <td>密码：</td>
                <td><input type="text" name="userPwd"></td>
            </tr>
            <tr>
                <td>年龄：</td>
                <td><input type="text" name="userPwd"></td>
            </tr>
            <tr>
                <td>性别：</td>
                <td><input type="text" name="userPwd"></td>
            </tr>
            <tr>
                <td><input type="submit"></td>
                <td><input type="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
