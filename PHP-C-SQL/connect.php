<?php
//header("Content-type:text/html;charset=utf-8");
$uid="";
if(isset($_GET["error"])&&$_GET["error"]=="1")
{
    echo "<script type='text/javascript'>
              alert('用户名不存在,请核对后重试!!!');
          </script>";
    /*$_GET['msg'];
    $_GET["error"];
    $uid=$_GET["user"];*/
}
else if(isset($_GET["error"])&&$_GET["error"]=="2")
{
    //说明是密码错误重新定向回来
    echo "<script type='text/javascript'>
              alert('密码错误!!!');
          </script>";
    $uid=$_GET["user"];
}

//mysqli_connect();
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/6
 * Time: 14:52
 */
?>
<html>
    <head>
        <style type="text/css">
            span
            {
                color: red;
            }
        </style>
        <script type="text/javascript">
            function check1() {
                var uid=document.myForm.user.value;
                if(uid=="")
                {
                    document.getElementById("sp1").innerHTML="账户不能不为空！"
                }
                else if(uid!=""&&isNaN(uid))
                {
                    document.getElementById("sp1").innerHTML="账户必须为纯数字！";
                }
                else if(uid!=""&&!isNaN(uid))
                {
                    document.getElementById("sp1").innerHTML="";
                }
            }
            function check2() {
                var pwd=document.myForm.pwd.value;
                if(pwd=="")
                {
                    document.getElementById("sp2").innerText="密码不能为空!";
                }
                else {
                    document.getElementById("sp2").innerText="";
                }
            }
        </script>
    </head>
    <body>
        <form action="process.php" method="post" name="myForm">
            <table>
                <tr><td colspan="2">帐号：<input type="text" name="user" onblur="check1()" value="<?php echo $uid; ?>"></td><td><span id="sp1"></span></td></tr>
                <tr><td colspan="2">密码：<input type="text" name="pwd" onblur="check2()"></td></td><td><span id="sp2"></span></tr>
                <tr>
                    <td><a href="register.php">立即注册</a></td>
                    <td><input type="submit" value="提交"></td></tr>
            </table>
        </form>
    </body>
</html>
