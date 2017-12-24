<?php
session_start();
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/24
 * Time: 18:13
 */?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Public/CSS/common.css">
    </head>
    <body>
        <div id="divHeader_1">
            <ul>
                <li>首页</li>
                <li>发帖</li>
            </ul>
        </div>
        <div id="divHeader_2">
            <div id="divHeader_2_1">
                <form action="../Process/ProcessLogin.php" method="post">
                    <?php
                    if(!isset($_SESSION["user"]))
                    {
                        echo '用户名：<input type="text"name="userName">
                             密码：<input type="password" name="userPwd">
                             <input type="submit" value="登录" name="btnLogin">
                             <a href="Register.php">用户注册</a>';
                    }else{
                        echo"欢迎【{$_SESSION["user"]}】！ <a href='../Process/loginOut.php'>退出</a>";
                    }
                    ?>
                </form>
            </div>
        </div>
